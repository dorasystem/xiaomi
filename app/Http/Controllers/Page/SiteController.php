<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\DescImage;
use App\Models\Faq;
use App\Models\History;
use App\Models\MainBanner;
use App\Models\Manual;
use App\Models\News;
use App\Models\Product;
use App\Models\StaticKeyword;
use App\Models\Store;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class SiteController extends Controller
{

    public function purchaseOnline()
    {
        return view('pages.site.purchase-online');
    }

    public function returnOfGoods()
    {
        return view('pages.site.return-of-goods');
    }

    public function payment()
    {
        return view('pages.site.payment');
    }

    public function delivery()
    {
        return view('pages.site.free-delivery');
    }

    public function warranty()
    {
        return view('pages.site.warranty');
    }

    public function manuals()
    {
        $lang = App::getLocale();
        $manuals = Manual::all();
        return view('pages.site.manuals',compact('manuals','lang'));
    }

    public function faq()
    {
        $lang = app()->getLocale();

        $faqs = Faq::all()->map(function ($faq) use ($lang) {
            return [
                'question' => $faq["question_$lang"],
                'answer' => $faq["answer_$lang"],
            ];
        });

        return view('pages.site.faq', compact('faqs'));
    }
}
