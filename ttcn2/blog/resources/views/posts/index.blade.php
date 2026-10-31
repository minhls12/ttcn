@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
<h3 class="mb-4">Bài viết mới nhất</h3>
<div class="row g-4">
    @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('posts.show', $post) }}" class="text-decoration-none">{{ $post->title }}</a></h5>
                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                </div>
                <div class="card-footer small text-muted">{{ $post->user->name }} · {{ $post->created_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>
    @empty
        <p>Chưa có bài viết nào.</p>
    @endforelse
</div>
<div class="mt-4">{{ $posts->links() }}</div>
@endsection
