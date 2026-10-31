@extends('layouts.app')
@section('title', 'Viết bài')
@section('content')
<h3 class="mb-3">Tạo bài viết</h3>
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    @include('posts._form')
    <button class="btn btn-primary">Đăng bài</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
