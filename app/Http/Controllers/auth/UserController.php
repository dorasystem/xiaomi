<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function orders()
    {
        return view('user.orders');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }
}
