<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Telegram Notification Trait
 *
 * Sends notifications to Telegram channel.
 */
trait SendsTelegramNotification
{
    /**
     * Send message to Telegram.
     */
    protected function sendTelegramNotification(string $message): bool
    {
        try {
            $botToken = config('services.telegram.bot_token');
            $chatId = config('services.telegram.chat_id');

            if (! $botToken || ! $chatId) {
                Log::warning('Telegram credentials not configured');

                return false;
            }

            $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
            ]);

            if ($response->successful()) {
                Log::info('Telegram notification sent successfully');

                return true;
            }

            Log::error('Telegram notification failed', [
                'status' => $response->status(),
                'response' => $response->json(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Telegram notification exception', [
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
