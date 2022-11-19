<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Color;
use App\Models\MultiMedia;

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
            $q->select("element_id", "path")->where("logo", true);
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

    public function allProducts()
    {
        $products = Product::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name");
        }, "getProductQty", "multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true);
        }])->select("name_en as name",   "sub_category_id", "id", "price", "active")->orderBy("active", "desc")->orderBy("id", "desc")->paginate(5);

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
        $categories = Category::paginate(5);
        return view("adminPanel.all-categories", compact("categories"));
    }
    public function getCategory(Request $req)
    {
        $category = Category::with(["multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true);
        }])->find($req->id);

        $images = MultiMedia::where("element_id", $req->id)->where("element_type", Category::class)->get();

        return view("adminPanel.show-category", compact("category", "images"));
    }
    public function editCategory(Request $req)
    {
        $category = Category::find($req->id);
        $category->multiMedia()->update(["logo" => false]);
        $category->multiMedia()->where("id", $req->logo)->update(["logo" => true]);
        return redirect()->back()->withInput();
    }
}
