<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;

/**
 * Ghi log hoạt động tài khoản vào storage/logs/auth.log
 */
class AuthLog
{
    public static function write(string $event, ?string $email = null, ?int $userId = null): void
    {
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/auth.log'),
        ])->info($event, [
            'time' => now()->format('Y-m-d H:i:s'),
            'user_id' => $userId,
            'email' => $email,
            'ip' => request()->ip(),
        ]);
    }
}
