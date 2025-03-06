<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;

class LogVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $cacheKey = "visitor_" . $ip;


        if (!Cache::has($cacheKey)) {
            $agent = new Agent();
            $agent->setUserAgent($userAgent);
            $device = $agent->device();
            $platform = $agent->platform();
            $browser = $agent->browser();
            $isMobile = $agent->isMobile() ? '📱 Mobil' : '🖥 Kompyuter';


            $this->sendTelegramMessage($ip, $device, $platform, $browser, $isMobile);


            Cache::put($cacheKey, true, now()->addHour());
        }

        return $next($request);
    }

    private function sendTelegramMessage($ip, $device, $platform, $browser, $isMobile)
    {
        $token = '7533472580:AAG1dQM02hVUA7fE0jsWuzfrTPSmOnGG3xo';
        $chatId = 5601028714;

        $message = "🖥 *Saytga yangi tashrif:* \n\n" .
            "🌍 *IP Manzil:* `$ip`\n" .
            "📱 *Qurilma:* `$device`\n" .
            "💻 *Platforma:* `$platform`\n" .
            "🌐 *Brauzer:* `$browser`\n" .
            "📌 *Turi:* `$isMobile`\n" .
            "🕒 *Vaqt:* " . now();

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
    }
}
