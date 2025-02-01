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


class SiteController extends Controller
{

    public function purchaseOnline()
    {
        return view('pages.site.purchase-online');
    }

}
