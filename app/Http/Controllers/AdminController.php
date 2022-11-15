<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
    public function addProduct()
    {
        $products = Product::with(["subCategory" => function ($q) {
            $q->select("id", "name_en as name");
        }, "product_info"])->select("name_en as name", "logo", "sub_category_id", "id")->paginate(10);
        // foreach ($products as $key => $value) {
        //     dd($value->product_info->discription_ar);
        // }

        return view("adminPanel.show-products", compact("products"));
    }
}
