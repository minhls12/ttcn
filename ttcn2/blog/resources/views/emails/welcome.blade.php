<!DOCTYPE html>
<html lang="vi">
<body style="font-family: Arial, sans-serif;">
    <h2>Xin chào {{ $user->name }}!</h2>
    <p>Chúc mừng bạn đã đăng ký thành công tài khoản tại <strong>{{ config('app.name') }}</strong>.</p>
    <p>Bây giờ bạn có thể đăng nhập và bắt đầu viết bài của riêng mình.</p>
    <p><a href="{{ route('login') }}">Đăng nhập ngay</a></p>
    <p>Trân trọng,<br>{{ config('app.name') }}</p>
</body>
</html>
