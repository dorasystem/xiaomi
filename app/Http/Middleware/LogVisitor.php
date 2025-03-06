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

            $device = $agent->device() ?: 'Noma’lum qurilma';
            $platform = $agent->platform() ?: 'Noma’lum OS';
            $platformVersion = $agent->version($platform) ?: 'Noma’lum versiya';
            $browser = $agent->browser() ?: 'Noma’lum brauzer';
            $browserVersion = $agent->version($browser) ?: 'Noma’lum versiya';
            $isMobile = $agent->isMobile() ? '📱 Mobil' : '🖥 Kompyuter';

            // Foydalanuvchi agentni qo'lda tahlil qilish (Redmi, iPhone, Samsung va h.k)
            $deviceModel = $this->extractDeviceModel($userAgent);

            $this->sendTelegramMessage($ip, $device, $deviceModel, $platform, $platformVersion, $browser, $browserVersion, $isMobile, $userAgent);

            Cache::put($cacheKey, true, now()->addHour());
        }

        return $next($request);
    }

    private function sendTelegramMessage($ip, $device, $deviceModel, $platform, $platformVersion, $browser, $browserVersion, $isMobile, $userAgent)
    {
        $token = '7533472580:AAG1dQM02hVUA7fE0jsWuzfrTPSmOnGG3xo';  // Tokenni env faylda saqlang!
        $chatId = 5601028714;   // Chat ID ham env faylda bo‘lsin!

        $message = "🖥 *Saytga yangi tashrif:* \n\n" .
            "🌍 *IP Manzil:* `$ip`\n" .
            "📱 *Qurilma:* `$deviceModel` (`$device`)\n" .
            "💻 *Platforma:* `$platform` ($platformVersion)\n" .
            "🌐 *Brauzer:* `$browser` ($browserVersion)\n" .
            "📌 *Turi:* `$isMobile`\n" .
            "🕒 *Vaqt:* `" . now() . "`\n\n" .
            "🔍 *User-Agent:* `$userAgent`";

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
    }

    private function extractDeviceModel($userAgent)
    {
        if (preg_match('/Redmi [^\s]+/', $userAgent, $matches)) {
            return $matches[0];  // Masalan: "Redmi Note 14"
        } elseif (preg_match('/Samsung [^\s]+/', $userAgent, $matches)) {
            return $matches[0];  // Masalan: "Samsung Galaxy S22"
        } elseif (preg_match('/iPhone [^\s]+/', $userAgent, $matches)) {
            return $matches[0];  // Masalan: "iPhone 13 Pro Max"
        } elseif (preg_match('/Pixel [^\s]+/', $userAgent, $matches)) {
            return $matches[0];  // Masalan: "Pixel 6 Pro"
        } else {
            return 'Noma’lum model';
        }
    }
}

