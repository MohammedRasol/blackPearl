<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SpecialProduct;
use App\Models\ProductReviews;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(REQUEST $req)
    {
        $currentDate = Carbon::now()->toDateString();
          $specialProduct = SpecialProduct::with(["products" => function ($q) {
            $q->where("active", "=", 1)->select("name_en as name", "id", "price");
        }])->where("type", "=", "1")->where("fromDate", "<=", $currentDate)->where("endDate", ">=", $currentDate)->limit(6)->get();

        $categories = Category::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name",   "category_id")->with(["products" => function ($q) {
                $q->select("id", "name_en as name", "price", "sub_category_id")->limit(8);
            }]);
        }, "multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true);
        }])->get(["id", "name_en as name", "active"]); //ADD MULTI LANGS

        $topRatedProducts = Product::with(["multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true);
        }])->select(
            "id",
            "name_ar",
            "name_en as name",
            "price",

        )->where("active", "=", 1)->with("productRateAvg")->limit(6)->get();

        $lastesProducts = Product::orderBy("created_at", "desc")->select("name_en as name", "id", "price",)->limit(6)->get();

        $products = Product::select("id", "name_en as name",)->with(["productInfo"  => function ($q) {
            $q->select("color_id", "size",  "product_id");
        }, "multiMedia" => function ($q) {
            $q->select("element_id", "path")->where("logo", true);
        }])->get(); //ADD MULTI LANGS
        return view('home', compact("categories", "products", "specialProduct", "topRatedProducts", "lastesProducts"));
    }

    public function category(REQUEST $req)
    {
        $categories = Category::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name", "logo", "category_id");
        }])->find($req->id, ["id", "name_en as name", "logo"]);

        return view('categories.category', compact("categories"));
    }


    public function subCategory(REQUEST $req)
    {
        $subCat = SubCategory::find($req->subcatid, ["id", "name_en", "logo"]);
        return view('categories.category', compact("subCat"));
    }
}
