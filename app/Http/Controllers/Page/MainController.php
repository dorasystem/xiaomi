<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Blog;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;use Illuminate\Support\Facades\DB;


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
//        dd($blogs);
        return view('pages.page-blog', compact('blogs'));
    }
    public function singleBlog($slug)
    {
        $locale = app()->getLocale();
        $blog = Blog::all()->filter(function ($blog) use ($locale, $slug) {
            return $blog->getSlugByLanguage($locale) === $slug;
        })->first();
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
        $articles = Article::all();
        return view('pages.page-news', compact('news', 'articles'));
    }

    public function singleNews($slug)
    {
        $locale = app()->getLocale();
        $column = 'slug_' . $locale; // Hozirgi tilga mos ustunni aniqlash
        $news = News::where($column, $slug)->firstOrFail();
        return view('pages.single-news', compact('news'));
    }
    public function singleArticle($slug)
    {
        $articles = Article::find('slug', $slug);
        return view('pages.single-article', compact('articles'));
    }
}
