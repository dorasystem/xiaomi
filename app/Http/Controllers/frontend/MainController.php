<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function products()
    {
        return view('frontend.page-products');
    }

    public function singleProduct()
    {
        return view('frontend.single-products');
    }
//    public function singleProduct($slug)
//    {
//        return view('frontend.single-products');
//    }

    public function news()
    {
        return view('frontend.page-news');
    }

    public function singleNews()
    {
        return view('frontend.single-news');
    }
//    public function singleNews($slug)
//    {
//        return view('frontend.single-news');
//    }
}
