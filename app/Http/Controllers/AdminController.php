<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            Session::flash('errors', $validator->messages());
            return redirect()->back()->withInput();
        }
        if (Auth::guard("admins")->attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect('admin/index');
        } else
            return  view('adminPanel.login');
    }
}
