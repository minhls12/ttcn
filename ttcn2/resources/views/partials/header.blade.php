<div class="bg-dark text-white-50 small py-1">
  <div class="container d-flex justify-content-between">
    <span>{{ now()->format('d/m/Y') }}</span>
    <span>Hotline: 0123 456 789 | Đăng nhập</span>
  </div>
</div>

<header class="bg-white border-bottom">
  <div class="container text-center py-3">
    <h1 class="h2 font-weight-bold text-primary mb-0">TIN TỨC HÔM NAY</h1>
    <small class="text-muted">Cập nhật nhanh – Chính xác – Đa chiều</small>
  </div>
  <nav class="navbar navbar-expand-md navbar-light bg-white border-top">
    <div class="container">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Thời sự</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Công nghệ</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Thể thao</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Giải trí</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>