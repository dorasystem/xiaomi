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
        return view('frontend.page-products');
    }

    public function singleProduct()
    {
        return view('frontend.single-products');
    }
//    public function singleProduct($slug)
//    {
//        $product = Product::where('slug', $slug)->firstOrFail();
//        return view('frontend.single-products', compact('product'));
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
//        $news = News::where('slug', $slug)->firstOrFail();
//        return view('frontend.single-news', compact('news'));
//    }
}
