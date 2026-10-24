@extends('layouts.app')

@section('content')

{{-- Tin nổi bật --}}
<section class="row mb-4">
  <div class="col-lg-8 mb-3 mb-lg-0">
    <div class="card h-100">
      <div class="thumb hero">Ảnh tin nổi bật</div>
      <div class="card-body">
        <span class="cat">{{ $featured['category'] }}</span>
        <h2 class="h4 mt-1"><a href="#" class="text-dark">{{ $featured['title'] }}</a></h2>
        <p class="text-muted mb-0">{{ $featured['summary'] }}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 d-flex flex-column">
    @foreach ($subFeatured as $item)
      <div class="card {{ $loop->first ? 'mb-3' : '' }} flex-fill">
        <div class="thumb t{{ $loop->iteration + 1 }} hero-sm">Ảnh {{ $loop->iteration + 1 }}</div>
        <div class="card-body py-2">
          <span class="cat">{{ $item['category'] }}</span>
          <h3 class="h6 mb-0"><a href="#" class="text-dark">{{ $item['title'] }}</a></h3>
        </div>
      </div>
    @endforeach
  </div>
</section>

<div class="row">
  {{-- Cột chính --}}
  <div class="col-lg-8">
    <h2 class="h5 border-left border-primary pl-2 mb-3">TIN MỚI NHẤT</h2>
    @foreach ($posts as $post)
      <div class="card mb-3"><div class="card-body d-flex">
        <div class="thumb post-thumb mr-3">Ảnh</div>
        <div>
          <span class="cat">{{ $post['category'] }}</span>
          <h3 class="h6"><a href="#" class="text-dark">{{ $post['title'] }}</a></h3>
          <p class="small text-muted mb-1">{{ $post['summary'] }}</p>
          <small class="text-muted">{{ $post['date'] }} • {{ $post['author'] }}</small>
        </div>
      </div></div>
    @endforeach
  </div>

  {{-- Sidebar --}}
  <aside class="col-lg-4">
    <div class="card mb-3"><div class="card-body">
      <h3 class="h6 font-weight-bold">CHUYÊN MỤC</h3>
      <ul class="list-group list-group-flush">
        @foreach ($categories as $name => $count)
          <li class="list-group-item d-flex justify-content-between px-0">
            {{ $name }} <span class="badge badge-primary badge-pill">{{ $count }}</span>
          </li>
        @endforeach
      </ul>
    </div></div>

    <div class="card mb-3"><div class="card-body">
      <h3 class="h6 font-weight-bold">XEM NHIỀU</h3>
      <ol class="pl-3 mb-0 small">
        @foreach ($popular as $title)
          <li class="mb-2"><a href="#" class="text-dark">{{ $title }}</a></li>
        @endforeach
      </ol>
    </div></div>

    <div class="card"><div class="card-body">
      <h3 class="h6 font-weight-bold">TỪ KHÓA</h3>
      @foreach ($tags as $tag)
        <a href="#" class="badge badge-secondary p-2">{{ $tag }}</a>
      @endforeach
    </div></div>
  </aside>
</div>
@endsection