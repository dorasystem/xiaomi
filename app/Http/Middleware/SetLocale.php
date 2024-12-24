<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->get('lang') ?? Session::get('locale', 'uz');
        Session::put('locale', $locale);
        App::setLocale($locale);
        return $next($request);
    }
}
