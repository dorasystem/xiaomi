<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\History;
use App\Models\News;
use App\Models\Product;
use App\Models\Store;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function index()
    {
        $locations = Store::all();
        $products = Product::latest()->take(6)->get();
        $new = News::latest()->first();
        $news1 = News::latest()->skip(1)->take(4)->get();
        $news2 = News::latest()->skip(4)->take(4)->get();
        return view('pages.home', compact('new', 'news1', 'news2', 'products','locations'));
    }
    public function about()
    {
        $lang = app()->getLocale();
        $about = About::first();
        $histories = History::take(4)->get();
        $careers = Vacancy::latest()->take(4)->get();
        return view('pages.about', compact('about', 'lang', 'histories', 'careers'));
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

    public function singleProduct($slug)
    {
        $products = Product::latest()->take(6)->get();
        $product = Product::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('product_id', $product->id)->latest()->get();
        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;

        $lang = App::getLocale();
        $variants = $product->variants;

        return view('pages.single-product', compact('product', 'images', 'lang', 'variants','comments','products'));
    }


    public function news()
    {
        $news = News::all();
        $articles = Article::all();
        return view('pages.page-news', compact('news', 'articles'));
    }
    public function career()
    {
        $careers = Vacancy::all();
        $lang = app()->getLocale();
        return view('pages.career', compact('careers', 'lang'));
    }

    public function singleNews($slug)
    {
        $products = Product::latest()->take(6)->get();
        $locale = app()->getLocale();
        $news = News::all()->filter(function ($news) use ($locale, $slug) {
            return $news->getSlugByLanguage($locale) === $slug;
        })->first();
        $otherNews = News::latest()->skip(1)->take(4)->get();
        return view('pages.single-news', compact('news', 'otherNews', 'locale','products'));
    }
    public function singleArticle($slug)
    {
        $locale = app()->getLocale();
        $articles = Blog::all()->filter(function ($articles) use ($locale, $slug) {
            return $articles->getSlugByLanguage($locale) === $slug;
        })->first();
        return view('pages.single-article', compact('articles', 'locale'));
    }
}
