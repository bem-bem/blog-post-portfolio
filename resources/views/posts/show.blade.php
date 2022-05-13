@extends('layouts.app')

@section('content')
     <!-- Page content-->
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-12">
            <!-- Post content-->
            <article>
              <!-- Post header-->
              <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                <!-- Post date-->
                <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at }}</div>
              </header>
              <!-- Preview image figure-->
              <figure class="mb-4">
                <img class="img-fluid rounded" src="{{ asset('storage/' . $post->image->path) }}" alt="thumbnail" />
                </figure>
              <!-- Post content-->
              <section class="mb-5">
                <p class="fs-5 mb-4">{{ $post->content }}</p>
              </section>
            </article>
            <!-- Comments section-->
            @auth
                <section class="mb-5">
                    <div class="card bg-light">
                      <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" action="{{ route('comments.store', [$post]) }}" method="post">
                          @csrf
                          <textarea name="content" class="form-control mb-3" rows="3"
                            placeholder="Join the discussion and leave a comment!"></textarea>
                          <button type="submit" class="btn btn-primary float-end">Comment</button>
                        </form>
                        <!-- Single comment-->
                        @forelse ($post->comment as $comment)
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                          </div>
                          <div class="ms-3">
                            <div class="fw-bold">{{ $comment->user->name }}</div>
                            <p>
                              {{ $comment->content }}
                            </p>
                          </div>
                        </div>
                        @empty
                        <p>No comments on this post</p>
                        @endforelse
                      </div>
                    </div>
                  </section>
            @endauth
          </div>
        </div>
      </div>
@endsection