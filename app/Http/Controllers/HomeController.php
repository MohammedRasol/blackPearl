<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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

        $categories = Category::with(["sub_category" => function ($q) {
            $q->select("id", "name_en as name", "logo", "category_id")->with(["products" => function ($q) {
                $q->select("id", "name_en as name", "logo", "price", "sub_category_id");
            }]);
        }])->get(); //ADD MULTI LANGS



        $products = Product::select("id", "name_en as name", "logo")->with(["product_info"  => function ($q) {
            $q->select("discription_en", "color", "size",  "product_id");
        }])->get(); //ADD MULTI LANGS

        return view('home', compact("categories", "products"));
    }

    public function category(REQUEST $req)
    {
            $categories = Category::with(["sub_category" => function ($q) {
            $q->select("id", "name_en as name", "logo", "category_id");
        }])->find($req->id,["id","name_en as name","logo"]);

        return view('categories.category', compact("categories"));
    }


    public function subCategory(REQUEST $req)
    {
          $subCat = SubCategory::find($req->subcatid, ["id", "name_en", "logo"]);
          return view('categories.category', compact("subCat"));

    }
}
