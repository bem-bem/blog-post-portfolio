@extends('layouts.app')

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    @forelse ($posts as $post)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $post->image ? asset('storage/' . $post->image->path) : asset('images/thumbnail.png') }}" class="img-fluid rounded-start" alt="thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">
                                            <a href="{{ route('public_users.show', [$post]) }}">{{ $post->title }}</a>
                                        </h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                        <p class="card-text">
                                            <span class="me-4">
                                                <a href="{{ route('users.show', [$post->user]) }}"><x-icons.user /> {{ $post->user->name }}</a>
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
                    <hr>
                    <!-- Pagination-->
                        {{ $posts->links() }}
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Create a new post</div>
                        <div class="card-body">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary w-100">Post</a>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    {{-- <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Side widget-->
                    {{-- <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                            use, and feature the Bootstrap 5 card component!</div>
                    </div> --}}
                </div>
            </div>
        </div>
@endsection