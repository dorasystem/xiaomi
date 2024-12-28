<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\DescImage;
use App\Models\History;
use App\Models\MainBanner;
use App\Models\News;
use App\Models\Product;
use App\Models\StaticKeyword;
use App\Models\Store;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function index()
    {

        $newProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        $products = Product::orderBy('created_at', 'desc')->limit(PHP_INT_MAX)->offset(5)->get();

        $randomProducts = $products->random(5);


        $productsWithoutRandom = $products->reject(function ($product) use ($randomProducts) {
            return $randomProducts->contains('id', $product->id);
        });






        // Bir nechta kalit so'zlarni olish
        $keywords = StaticKeyword::all(); // yoki filterlab olish

        // Har bir kalit so'zni tilga qarab olish      <h1>{{ $translations['welcome_message'] }}</h1> shunday chaqiriladi
        $language = app()->getLocale();
        $translations = [];

        foreach ($keywords as $keyword) {
            $translations[$keyword->key] = $keyword->{$language};
        }

        $locations = Store::all();
        $banner = MainBanner::first();
        $products = Product::latest()->take(6)->get();
        $new = News::latest()->first();
        $news1 = News::latest()->skip(1)->take(4)->get();
        $news2 = News::latest()->skip(4)->take(4)->get();
        $categories = Category::all();
        $category1 = collect($categories)->firstWhere('id', 1);
        $category2 = collect($categories)->firstWhere('id', 2);
        $category3 = collect($categories)->firstWhere('id', 3);
        $category4 = collect($categories)->firstWhere('id', 4);
        $category5 = collect($categories)->firstWhere('id', 5);
        $category6 = collect($categories)->firstWhere('id', 6);
        $category7 = collect($categories)->firstWhere('id', 7);
        return view('pages.home', compact('new', 'news1', 'news2', 'products', 'locations', 'banner', 'categories','category1', 'category2', 'category3', 'category4', 'category5', 'category6', 'category7','translations', 'newProducts','randomProducts','products','productsWithoutRandom'));
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
        $lang = app()->getLocale();
        $locations = Store::all();
        // return view('components.page.contact',compact('locations','lang'));
        return view('pages.contact', compact('locations', 'lang'));
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
        $categories = Category::all();
        $products = Product::paginate(8);
        $lang = app()->getLocale();
        return view('pages.page-products', compact('products', 'lang', 'categories'));
    }

    public function singleProduct($slug)
    {
        $products = Product::latest()->take(6)->get();
        $product = Product::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('product_id', $product->id)->latest()->get();
        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;

        $descImages = DescImage::all();
        $lang = App::getLocale();
        $variants = $product->variants;

        return view('pages.single-product', compact('product', 'images', 'lang', 'variants', 'comments', 'products', 'descImages'));
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
        return view('pages.single-news', compact('news', 'otherNews', 'locale', 'products'));
    }
    public function singleArticle($slug)
    {
        $locale = app()->getLocale();
        $articles = Blog::all()->filter(function ($articles) use ($locale, $slug) {
            return $articles->getSlugByLanguage($locale) === $slug;
        })->first();
        return view('pages.single-article', compact('articles', 'locale'));
    }

    public function  productSearch(Request $request)
    {
        $lang = app()->getLocale();
        $search = $request->input('search');
        $products = Product::where('name_' . $lang, 'like', '%' . $search . '%')
            ->orWhere('description_' . $lang, 'like', '%' . $search . '%')
            ->get();

        return view('pages.search-products', compact('products', 'lang'));
    }
    public function filterProducts(Request $request)
    {
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 1000);
        $categories = $request->input('categories', []);

        // Kategoriyalar bo‘yicha mahsulotlarni olish
        $products = Product::query();

        if (!empty($categories)) {
            $products->whereIn('category_id', $categories);
        }

        // Narxga mos keladigan mahsulotlarni tekshirish
        $filteredProducts = $products->whereHas('variants', function ($query) use ($minPrice, $maxPrice) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        })->get();

        // Agar narxga mos keladigan mahsulotlar bo‘lmasa, faqat kategoriyaga tegishli mahsulotlarni qaytaramiz
        if ($filteredProducts->isEmpty() && !empty($categories)) {
            $products = $products->get();
        } else {
            $products = $filteredProducts;
        }

        $categories = Category::all();

        return view('pages.search-products', compact('products', 'categories'));
    }


    public function checkout()
    {
        return view('pages.checkout');
    }

    public function categorySort($slug)
    {
        // Get the locale (e.g., from the request or session)
        $locale = app()->getLocale(); // Or $request->get('locale') if you're passing it in the URL

        // Find the category by its language-specific slug
        $category = Category::all()->filter(function ($category) use ($locale, $slug) {
            return $category->getSlugByLanguage($locale) === $slug;
        })->firstOrFail();

        // Get the products associated with this category
        $products = $category->products()->get();

        return view('pages.search-products', compact('products', 'category'));
    }




}
