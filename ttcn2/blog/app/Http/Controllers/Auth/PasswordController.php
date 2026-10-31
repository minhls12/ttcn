<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\AuthLog;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function showForgot()
    {
        return view('auth.forgot-password');
    }

    public function sendLink(Request $request)
    {
        $request->validate(
            ['email' => ['required', 'email']],
            ['email.required' => 'Vui lòng nhập email.', 'email.email' => 'Email không hợp lệ.']
        );

        $status = Password::sendResetLink($request->only('email'));

        AuthLog::write('FORGOT_PASSWORD - yêu cầu cấp lại mật khẩu (' . $status . ')', $request->email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Chúng tôi đã gửi liên kết đặt lại mật khẩu vào email của bạn.')
            : back()->withErrors(['email' => 'Không tìm thấy tài khoản với email này hoặc bạn yêu cầu quá nhanh, hãy thử lại sau.'])->onlyInput('email');
    }

    public function showReset(Request $request, string $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->query('email')]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
                AuthLog::write('RESET_PASSWORD - đổi mật khẩu thành công', $user->email, $user->id);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Đổi mật khẩu thành công, hãy đăng nhập.')
            : back()->withErrors(['email' => 'Liên kết không hợp lệ hoặc đã hết hạn.'])->onlyInput('email');
    }
}
