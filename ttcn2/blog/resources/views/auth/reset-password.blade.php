@extends('layouts.app')
@section('title', 'Đặt lại mật khẩu')
@section('content')
<div class="row justify-content-center"><div class="col-md-5">
    <div class="card shadow-sm"><div class="card-body">
        <h4 class="mb-3">Đặt lại mật khẩu</h4>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nhập lại mật khẩu mới</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button class="btn btn-primary w-100">Đổi mật khẩu</button>
        </form>
    </div></div>
</div></div>
@endsection
