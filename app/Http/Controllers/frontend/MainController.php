<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function blog()
    {
        $blogs = Blog::all();
        return view('pages.blog', compact('blogs'));
    }
    public function singleBlog($slug){
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.single-blog', compact('blog'));
    }

    public function products()
    {
        return view('pages.page-products');
    }

    public function singleProduct()
    {
        return view('pages.single-product');
    }
//    public function singleProduct($slug)
//    {
//        $product = Product::where('slug', $slug)->firstOrFail();
//        return view('pages.single-product', compact('product'));
//    }

    public function news()
    {
        $news = News::all();
        return view('pages.page-news', compact('news'));
    }

    public function singleNews()
    {
        $news = News::first();
        return view('pages.single-news', compact('news'));
    }
//    public function singleNews($slug)
//    {
//        $news = News::where('slug', $slug)->firstOrFail();
//        return view('pages.single-news', compact('news'));
//    }
}
