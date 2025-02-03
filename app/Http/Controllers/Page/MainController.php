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
    public function error()
    {
        return view('pages.errors-404');
    }
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
        $news1 = News::orderBy('date', 'desc')->skip(1)->take(4)->get();
        $news2 = News::orderBy('date', 'desc')->skip(4)->take(4)->get();
        $categories = Category::latest()->get();
        $category1 = $categories->firstWhere('id', 1);
        $category37 = $categories->firstWhere('id', 37);
        $category2 = $categories->firstWhere('id', 2);
        $category3 = $categories->skip(2)->first();
        $category4 = $categories->skip(3)->first();
        $category5 = $categories->skip(4)->first();
        $category6 = $categories->skip(5)->first();
        $category7 = $categories->skip(6)->first();
        return view('pages.home', compact('new', 'news1', 'news2', 'products', 'locations', 'banner', 'categories', 'category1', 'category2', 'category3', 'category4', 'category5', 'category6', 'category7', 'translations', 'newProducts', 'randomProducts', 'products', 'productsWithoutRandom', 'category37'));
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
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $blog = Blog::orderBy('created_at', 'desc')->first();

        $lang = app()->getLocale();
        return view('pages.page-blog', compact('blogs', 'blog', 'lang'));
    }
    public function singleBlog($slug)
    {
        $lang = app()->getLocale();

        // Blogni topish
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.single-blog', compact('blog', 'lang'));
    }
    public function products()
    {
        $categories = Category::all();
        $products = Product::paginate(9);
        $lang = app()->getLocale();
        return view('pages.page-products', compact('products', 'lang', 'categories'));
    }

    public function singleProduct($slug)
    {
        $products = Product::latest()->take(6)->get();
        $product = Product::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('product_id', $product->id)->latest()->get();
        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;

        $descImages = DescImage::where('product_id', $product->id)->get();
        $lang = App::getLocale();
        $variants = $product->variants;

        return view('pages.single-product', compact('product', 'images', 'lang', 'variants', 'comments', 'products', 'descImages'));
    }

    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $articles = Article::orderBy('created_at', 'desc')->get();
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
        $locale = app()->getLocale();
        $products = Product::latest()->take(6)->get();
        $news = News::where('slug', $slug)->firstOrFail();

        $otherNews = News::latest()->skip(1)->take(4)->get();

        return view('pages.single-news', compact('news', 'otherNews', 'locale', 'products'));
    }

    public function singleArticle($slug)
    {
        $locale = app()->getLocale();
        $articles = Article::where('slug', $slug)->firstOrFail();
        $otherNews = News::latest()->skip(1)->take(4)->get();

        return view('pages.single-article', compact('articles', 'locale', 'otherNews'));
    }

    public function  productSearch(Request $request)
    {
        $lang = app()->getLocale();
        $search = $request->input('search');
        $products = Product::where('name_' . $lang, 'like', '%' . $search . '%')
            ->orWhere('description_' . $lang, 'like', '%' . $search . '%')
            ->paginate(9);

        return view('pages.search-products', compact('products', 'lang', 'search'));
    }
    public function filterProducts(Request $request)
    {
        $minPrice = $request->input('min_price', 1);
        $maxPrice = $request->input('max_price', 40000000);
        $selectedCategories = $request->input('categories', []);

        // Ota kategoriyalarning barcha bolalarini qo‘shish
        $categoriesToFilter = [];
        if (!empty($selectedCategories)) {
            $categoriesToFilter = Category::whereIn('id', $selectedCategories)
                ->orWhereIn('parent_id', $selectedCategories) // Ota kategoriyaning barcha bolalarini olish
                ->pluck('id')
                ->toArray();
        }

        $products = Product::query();

        if (!empty($categoriesToFilter)) {
            $products->whereIn('category_id', $categoriesToFilter);
        }

        $filteredProducts = $products->whereHas('variants', function ($query) use ($minPrice, $maxPrice) {
            $query->whereNotNull('price')
                ->where('price', '>=', $minPrice)
                ->where('price', '<=', $maxPrice);
        })->paginate(9);

        if ($filteredProducts->isEmpty() && !empty($categoriesToFilter)) {
            $products = $products->paginate(9);
        } else {
            $products = $filteredProducts;
        }

        $categories = Category::all();
        $search = $request->input('search');

        return view('pages.search-products', compact('products', 'categories', 'search'));
    }




    public function checkout()
    {
        return view('pages.checkout');
    }


    public function categorySort($slug, Request $request)
    {
        $locale = app()->getLocale();

        // 1️⃣ Avval hozirgi til bo‘yicha tekshirish
        $category = Category::whereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, '$.\"$locale\"')) = ?", [$slug])->first();

        // 2️⃣ Agar topilmasa boshqa tillarda qidirish
        if (!$category) {
            $locales = ['uz', 'ru', 'en'];
            foreach ($locales as $lang) {
                if ($lang !== $locale) {
                    $category = Category::whereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, '$.\"$lang\"')) = ?", [$slug])->first();
                    if ($category) {
                        // Topilgach, to‘g‘ri URL ga redirect qilish
                        return redirect()->route('category.sort', ['slug' => $category->getSlugByLanguage($locale)]);
                    }
                }
            }
        }

        // 3️⃣ Hali ham topilmasa - 404
        if (!$category) {
            abort(404);
        }

        $childCategoryIds = Category::where('parent_id', $category->id)->pluck('id')->toArray();
        $products = Product::whereIn('category_id', array_merge([$category->id], $childCategoryIds))->paginate(9);

        $search = $request->input('search');

        return view('pages.search-products', compact('products', 'category', 'search'));
    }
}
