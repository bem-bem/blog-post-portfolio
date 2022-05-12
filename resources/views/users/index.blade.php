@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ $user->image ? asset('storage/' . $user->image->path) : '' }}" alt="avatar" class="img-fluid">
        </div>
        <div class="col-md-6">
          <article>
            <h3>Name : {{ $user->name }}</h3>
            <p>Email : {{ $user->email }}</p>
          </article>
        </div>
      </div>

@forelse ($posts as $post)
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $post->image ? asset('storage/' . $post->image->path) : '' }}" class="img-fluid rounded-start" alt="thumbnail">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title fw-bold">
          <a href="{{ route('posts.show', [$post]) }}">{{ $post->title }}</a>
        </h5>
        <p class="card-text">{{ $post->content }}</p>
        <p class="card-text">
          <span class="me-4">
            <x-icons.user /> {{ $post->user->name }}
          </span>
          <span class="me-4">
            <x-icons.created-at /> {{ $post->created_at->diffForHumans() }}
          </span>
          <span class="me-4">
            <x-icons.comment /> {{ $post->comment_count }}
          </span>
        </p>
      </div>
    </div>
  </div>
</div>
@empty

@endforelse

    </div>
@endsection