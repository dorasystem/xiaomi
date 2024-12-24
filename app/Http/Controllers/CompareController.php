<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compare()
    {
        return view('pages.compare');
    }
}
