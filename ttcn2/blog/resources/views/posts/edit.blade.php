@extends('layouts.app')
@section('title', 'Sửa bài viết')
@section('content')
<h3 class="mb-3">Sửa bài viết</h3>
<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('posts._form')
    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
