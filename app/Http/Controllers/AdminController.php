<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware("authAdmins")->except("login");
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
}
