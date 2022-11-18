<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\MultiMedia;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\SubCategory;

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
    public function allProduct()
    {
        $products = Product::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name");
        }, "productInfo"])->select("name_en as name", "logo", "sub_category_id", "id", "price", "active")->paginate(5);

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
        // return view("adminPanel.offcanvas", compact("categories", "product", "images", "subCategories", "colors"));
    }
    public function getProductInfo(Request $req)
    {
        sleep(1);
        $productInfo["data"] = ProductInfo::with("color")->find($req->id);
        $productInfo["code"] = 200;
        return $productInfo;
    }

    public function addProductInfo(Request $req)
    {
        $data = json_decode($req->data, true);
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[array_keys($value)[0]] = $value[array_keys($value)[0]];
        }
        $newData["product_id"] = $req->proId;
        $productInfo =  Product::find($req->proId);
        $productInfo->productInfo()->insert($newData);
        $insertedId = ProductInfo::latest("id")->where("product_id", $req->proId)->first();
        $response["insertedId"] = $insertedId->id;
        $response["color"] = Color::find($newData["color_id"]);
        $response["data"] = $response;
        $response["code"] = 200;
        return $response;
    }

    public function saveProductInfo(Request $req)
    {
        $data = json_decode($req->data, true);
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[array_keys($value)[0]] = $value[array_keys($value)[0]];
        }
        $productInfo =  ProductInfo::find($req->id);
        $response["data"] = $productInfo->update($newData);
        $response["code"] = 200;
        return $response;
    }

    public function deleteProductInfo(Request $req)
    {
        $productInfo =  ProductInfo::find($req->id);
        $response["data"] = $productInfo->delete();
        $response["code"] = 200;
        return $response;
    }
    public function deleteProductImg(Request $req)
    {
        $multiMedia = MultiMedia::find($req->id);
        $response["data"] = $multiMedia->delete();
        $response["code"] = 200;
        return $response;
    }
    public function addProduct(Request $req)
    {
        $categories = Category::get();
        return view("adminPanel.add-product", compact("categories"));
    }
    public function getSubCategory(Request $req)
    {
        $data["data"] = SubCategory::where("category_id", $req->catId)->get();
        $data["code"] = 200;
        return $data;
    }

    public function addProductFunction(Request $req)
    {
        $id = $req->catId;
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

    public function addProductLogo(Request $req)
    {

        $file = $req->file('logo');
        $imageName = $file->getClientOriginalName();
        $imageName = explode(".", $imageName);
        $path = 'img/product/';
        $fileName = $imageName[0] . time() . "." . $imageName[1];
        $file->move($path, $fileName);
        $file =  $_FILES["logo"];
        $media = MultiMedia::create([
            "element_type" => Product::class,
            "element_id" => $req->proId,
            "path" => $path . $fileName,
        ]);
        $data["data"]["id"] =  $media->id;
        $data["data"]["path"] = public_path($path . $fileName);
        $data["code"] = 200;
        return   $data;
    }

    public function editProductFunction(Request $req)
    {
        $pro = Product::find($req->id);
        $pro->update([
            "name_ar" => $req->name_ar,
            "name_en" => $req->name_en,
            "discription_ar" => $req->discription_ar,
            "discription_en" => $req->discription_en,
            "logo" => $req->logo,
            "price" => $req->price,
        ]);
        return redirect()->back();
    }
}
