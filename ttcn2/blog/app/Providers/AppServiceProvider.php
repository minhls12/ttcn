<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Mail đặt lại mật khẩu bằng tiếng Việt
        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ]);

            return (new MailMessage)
                ->subject('Cấp lại mật khẩu - ' . config('app.name'))
                ->greeting('Xin chào ' . $notifiable->name . '!')
                ->line('Bạn nhận được email này vì chúng tôi nhận được yêu cầu cấp lại mật khẩu cho tài khoản của bạn.')
                ->action('Đặt lại mật khẩu', $url)
                ->line('Liên kết sẽ hết hạn sau ' . config('auth.passwords.users.expire') . ' phút.')
                ->line('Nếu bạn không yêu cầu, hãy bỏ qua email này.')
                ->salutation('Trân trọng, ' . config('app.name'));
        });
    }
}
