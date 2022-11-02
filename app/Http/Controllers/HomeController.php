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
    public function index()
    {
        $categories = Category::all(["name_en"]); //ADD MULTI LANGS
        $subCategory = SubCategory::all(["name_en"]); //ADD MULTI LANGS
        return $products = Product::with(["product_info"  => function ($q) {
            $q->select("discription_en", "color", "size", "product_id");
        }]); //ADD MULTI LANGS

        return view('home', compact("categories", "products", "subCategory"));
    }
}
