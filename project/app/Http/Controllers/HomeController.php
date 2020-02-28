<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show layouts 
    public function page_home(){
        return view('home');
    }
    public function page_product(){
        return view('product');
    }
    public function page_about(){
        return view('about');
    }
    public function page_contact(){
        return view('contact');
    }
    public function page_login(){
        return view('login');
    }
    public function page_register(){
        return view('register');
    }

    // Show layouts admin
    public function page_product_ad(){
        return view('admin.product');
    }
}
