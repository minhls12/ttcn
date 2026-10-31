@extends('layouts.app')
@section('title', $post->title)
@section('content')
<article class="card shadow-sm"><div class="card-body">
    <h2>{{ $post->title }}</h2>
    <p class="text-muted">Đăng bởi {{ $post->user->name }} · {{ $post->created_at->format('d/m/Y H:i') }}</p>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3" alt="{{ $post->title }}">
    @endif
    <div style="white-space: pre-line">{{ $post->content }}</div>

    @can('update', $post)
        <hr>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Sửa</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Xóa bài viết này?')">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    @endcan
</div></article>
<a href="{{ route('posts.index') }}" class="btn btn-link mt-3">&larr; Quay lại</a>
@endsection
