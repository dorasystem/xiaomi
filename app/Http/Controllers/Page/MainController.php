<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Check if images is a string before calling json_decode
        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;

        $lang = App::getLocale();
        $variants = $product->variants;

        return view('pages.single-product', compact('product', 'images', 'lang', 'variants'));
    }


    public function news()
    {
        return view('pages.page-news');
    }

    public function singleNews()
    {
        return view('pages.single-news');
    }
//    public function singleNews($slug)
//    {
//        $news = News::where('slug', $slug)->firstOrFail();
//        return view('frontend.single-news', compact('news'));
//    }
}
