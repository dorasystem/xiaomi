<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
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
}
