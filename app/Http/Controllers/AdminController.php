<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\MultiMedia;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


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


        // MultiMedia::create([
        //     "element_id" => 2,
        //     "element_type" => Product::class,
        //     "path" => "test/test1.png",
        //     "color" => "RED",
        // ]);
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
        $productInfo["data"] = ProductInfo::find($req->id);
        $productInfo["code"] = 200;
        return $productInfo;
    }
}
