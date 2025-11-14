<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuthCustom
{
    public function handle(Request $request, Closure $next)
    {
        // Agar foydalanuvchi login qilmagan bo'lsa, Basic Auth challenge yuboriladi
        if (auth()->guard('web')->onceBasic('email')) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }

        // Agar login to'g'ri bo'lsa, request davom etadi
        return $next($request);
    }
}
