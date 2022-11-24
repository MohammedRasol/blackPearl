<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Color;
use App\Models\MultiMedia;
use App\Models\Country;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware("authAdmins")->except(["login", "loginMethod"]);
    }
    public function card()
    {
        return view("adminPanel.index");
    }
    public function index()
    {
        return view("adminPanel.index");
    }
    public function login()
    {
        return view("adminPanel.login");
    }
    public function loginMethod(Request $request)
    {
        $validator =   Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        if ($validator->fails()) {
            Session::flash('errors', $validator->messages());
            return redirect()->back()->withInput();
        }
        if (Auth::guard("admins")->attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect('admin/index');
        } else {
            return redirect()->back()->withInput()->with("error", __("auth.failed"));
        }
    }


    public function searchProducts(Request $req)
    {
        $word = $req->search;
        $products = Product::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name");
        }, "getProductQty", "multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true)->where("element_type", Product::class);
        }])->select("name_en as name",   "sub_category_id", "id", "price", "active")->where("name_en", "like", "%" . $word . "%")->orWhere("name_ar", "like", "%" . $word . "%")->orderBy("active", "desc")->orderBy("id", "desc")->paginate(5);
        $req->flash();
        return view("adminPanel.all-products", compact("products"));
    }

    public function editProduct(Request $req)
    {
        $colors = Color::get();
        $images = MultiMedia::where("element_id", $req->id)->where("element_type", Product::class)->get();
        $product = Product::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name", "category_id");
        }, "productInfo" => function ($q) {
            $q->with("color");
        }])->find($req->id);

        $subCategories = SubCategory::where("category_id", $product->subCategory->category_id)->get();
        $categories = Category::get();
        return view("adminPanel.show-product", compact("categories", "product", "images", "subCategories", "colors"));
    }
    public function getProductInfo(Request $req)
    {
        sleep(1);
        $productInfo["data"] = ProductInfo::with("color")->find($req->id);
        $productInfo["code"] = 200;
        return $productInfo;
    }

    public function allProducts(Request $req)
    {
        if (empty($req->subCatId)) {
            $products = Product::with(["subCategory" => function ($q) {
                $q->select("id", "name_en as name");
            }, "getProductQty", "multiMedia" => function ($q) {
                $q->select("element_id", "path")->where("logo", true)->where("element_type", Product::class);
            }])->select("name_en as name",   "sub_category_id", "id", "price", "active")->orderBy("active", "desc")->orderBy("id", "desc")->paginate(5);
        } else {
            $products = Product::with(["subCategory" => function ($q) {
                $q->select("id", "name_en as name");
            }, "getProductQty", "multiMedia" => function ($q) {
                $q->select("element_id", "path")->where("logo", true)->where("element_type", Product::class);
            }])->select("name_en as name",   "sub_category_id", "id", "price", "active")->where("sub_category_id", $req->subCatId)->orderBy("active", "desc")->orderBy("id", "desc")->paginate(5);
        }

        return view("adminPanel.all-products", compact("products"));
    }

    public function addProduct(Request $req)
    {
        $categories = Category::get();
        return view("adminPanel.add-product", compact("categories"));
    }

    public function addProductFunction(Request $req)
    {
        $validation =  Validator::make($req->all(), [
            "name_ar" => ["required", "max:20", "min:2"],
            "name_en" => ["required", "max:20", "min:2"],
            "price" => ["required"],
            "sub_category_id" => ["required"],
        ]);
        if ($validation->fails()) {
            Session::flash('errors', $validation->messages());
            return redirect()->back()->withInput();
        }

        $product = Product::create([
            "name_ar" => $req->name_ar,
            "name_en" => $req->name_en,
            "price" => $req->price,
            "sub_category_id" => $req->sub_category_id
        ]);
        return redirect("/admin/edit-product/" . $product->id);
        return $product->id;
    }
    public function editProductFunction(Request $req)
    {
        $pro = Product::find($req->id);
        $pro->update([
            "name_ar" => $req->name_ar,
            "name_en" => $req->name_en,
            "discription_ar" => $req->discription_ar,
            "discription_en" => $req->discription_en,
            "price" => $req->price,
        ]);
        $pro->multiMedia()->update(["logo" => false]);
        $pro->multiMedia()->where("id", $req->logo)->update(["logo" => true]);
        return redirect()->back();
    }

    public function allCategories()
    {
        $categories = Category::orderBy("active", "desc")->orderBy("id", "desc")->paginate(5);
        return view("adminPanel.all-categories", compact("categories"));
    }
    public function getCategory(Request $req)
    {
        $category = Category::with(["multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("element_type", Category::class)->where("logo", true);
        }])->find($req->id);

        $images = MultiMedia::where("element_id", $req->id)->where("element_type", Category::class)->get();

        return view("adminPanel.show-category", compact("category", "images"));
    }
    public function editCategory(Request $req)
    {
        $category = Category::find($req->id);
        $category->name_ar = $req->name_ar;
        $category->name_en = $req->name_en;
        $category->save();
        $category->multiMedia()->update(["logo" => false]);
        $category->multiMedia()->where("id", $req->logo)->update(["logo" => true]);
        return redirect()->back()->withInput();
    }
    public function addCategoryFunction(Request $req)
    {
        $category = Category::create($req->all());
        return redirect(route("getCategory", $category->id));
    }
    public function addCategory()
    {
        $category = [];
        $images = [];
        return view("adminPanel.show-category", compact("category", "images"));
    }

    public function allSubCategories(Request $req)
    {
        $categories = SubCategory::with(["multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true)->where("element_type", SubCategory::class);
        }])->where("category_id", $req->id)->paginate(5);
        $isSubCategory = true;
        $categoryId = $req->id;
        return view("adminPanel.all-categories", compact("categories", "isSubCategory", "categoryId"));
    }
    public function getSubCategory(Request $req)
    {
        $category = SubCategory::with(["multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true)->where("element_type", SubCategory::class);
        }])->find($req->id);
        $isSubCategory = true;
        $images = MultiMedia::where("element_id", $req->id)->where("element_type", SubCategory::class)->get();
        return view("adminPanel.show-category", compact("category", "images", "isSubCategory"));
    }
    public function editSubCategory(Request $req)
    {
        $subCategory = SubCategory::find($req->id);
        $subCategory->name_ar = $req->name_ar;
        $subCategory->name_en = $req->name_en;
        $subCategory->save();

        $subCategory->multiMedia()->update(["logo" => false]);
        $subCategory->multiMedia()->where("id", $req->logo)->update(["logo" => true]);
        return redirect()->back()->withInput();
    }
    public function allUsers()
    {
        $users = User::paginate(5);
        return view("adminPanel.all-users", compact("users"));
    }
    public function allUsersByName(Request $req)
    {
        $users = User::where("name", "like", "%" . $req->search . "%")->paginate(5);
        $req->flash();
        return view("adminPanel.all-users", compact("users"));
    }
    public function getUser(Request $req)
    {
        if (isset($req->id)) {
            $user = User::with(["multiMedia" => function ($q) {
                $q->select("element_id", "path", "id")->where("element_type", User::class);
            }])->find($req->id);
            $images[] =  $user->multiMedia;
        } else {
            $user = [];
            $images = [];
        }

        return view("adminPanel.show-user", compact("user", "images"));
    }

    public function saveUser(Request $req)
    {
        $user = User::find($req->id);
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->save();
        return redirect()->back()->withInput();
    }
    public function addUser(Request $req)
    {
        $user = User::create([
            "name" => $req->name,
            "phone" => $req->phone,
            "email" => $req->email,
            "password" => bcrypt($req->password),
        ]);

        return redirect("/admin/edit-user/" . $user->id);
    }

    public function addSubCategoryFunction(Request $req)
    {
        $category = SubCategory::create([
            "category_id" => $req->id,
            "name_ar" => $req->name_ar,
            "name_en" => $req->name_en
        ]);
        return redirect(route("getSubCategory", $category->id));
    }
    public function addSubCategory()
    {
        $category = [];
        $images = [];
        return view("adminPanel.show-sub-category", compact("category", "images"));
    }
    public function allCountries()
    {
        $countries = Country::paginate(5);
        return view("adminPanel.all-countries", compact("countries"));
    }

    public function getCountry(Request $req)
    {
        $country = Country::with(["multiMedia" => function ($q) {
            $q->select("element_id", "path", "id","logo")->where("element_type", Country::class);
        }])->find($req->id);
         $images = $country->multiMedia;

        return view("adminPanel.show-country", compact("country", "images"));
    }
    public function addCountryFunction(Request $req)
    {
        $country = Country::create([
            "name_ar" => $req->name_ar,
            "name_en" => $req->name_en,
            "code" => $req->code,
            "phone_key" => $req->phone_key,
        ]);


        return redirect("/admin/edit-country/" . $country->id);
    }
    public function addCountry()
    {
        $category = [];
        $images =  [];
        return view("adminPanel.show-country", compact("category", "images"));
    }
    public function editCountry(Request $req)
    {
        $country = Country::find($req->id);

        $country->name_ar = $req->name_ar;
        $country->name_en = $req->name_en;
        $country->code = $req->code;
        $country->phone_key = $req->phone_key;
        $country->save();

        $country->multiMedia()->update(["logo" => false]);
        $country->multiMedia()->where("id", $req->logo)->update(["logo" => true]);
        return redirect()->back()->withInput();
    }
}
