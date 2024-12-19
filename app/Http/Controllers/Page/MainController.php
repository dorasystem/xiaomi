<?php

namespace App\Http\Controllers\Page;

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
        $blogs = News::all();
//        dd($blogs);
        return view('pages.page-blog', compact('blogs'));
    }
    public function singleBlog($id){

        $blog = News::findOrFail($id);
        return view('pages.single-blog', compact('blog'));
    }

    public function products()
    {
        $products = Product::paginate(8);
        return view('pages.page-products',compact('products'));
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
