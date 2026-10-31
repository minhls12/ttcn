@extends('layouts.app')
@section('title', 'Quên mật khẩu')
@section('content')
<div class="row justify-content-center"><div class="col-md-5">
    <div class="card shadow-sm"><div class="card-body">
        <h4 class="mb-3">Quên mật khẩu</h4>
        <p class="text-muted">Nhập email, chúng tôi sẽ gửi liên kết đặt lại mật khẩu.</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button class="btn btn-primary w-100">Gửi liên kết</button>
        </form>
    </div></div>
</div></div>
@endsection
