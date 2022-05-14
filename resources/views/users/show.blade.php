@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
              @can('update', $user)
                  <div class="card-header">
                    <a href="{{ route('users.edit', [$user]) }}" class="btn btn-primary float-end">Update profile</a>
                  </div>
              @endcan
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <img src="{{ $user->image ? asset('storage/' . $user->image->path) : asset('images/avatar.png') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title text-center">{{ $user->name }}</h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                          role="tab" aria-controls="pills-home" aria-selected="true">Bio</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                          role="tab" aria-controls="pills-profile" aria-selected="false">Address</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button"
                          role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">{{ $user->bio }}</div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">{{ $user->address }}</div>
                      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">{{ $user->contact }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

      {{-- recent posts --}}
@forelse ($posts as $post)
<div class="card mb-3">
  @can('update', $post)
      <div class="card-header">
          <div class="btn-group dropstart  float-end">
            <button type="button" class="btn btn-link btn-sm " data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-gear fs-3"></i>
            </button>
            <ul class="dropdown-menu">
              <!-- Dropdown menu links -->
              <li>
                <a class="dropdown-item" href="{{ route('posts.edit', [$post]) }}">Update <i class="bi bi-pencil"></i></a>
              </li>
              <li>
                <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete <i class="bi bi-trash"></i></a>
              </li>
            </ul>
          </div>
        </div>
  @endcan

  @can('delete', $post)
      {{-- delete modal --}}
      <x-modal route="{{ route('posts.destroy', [$post]) }}"></x-modal>
  @endcan
 
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $post->image ? asset('storage/' . $post->image->path) : asset('images/thumbnail.png') }}" class="img-fluid  rounded-start" alt="thumbnail">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title fw-bold">
          <a href="{{ route('public_users.show', [$post]) }}">{{ $post->title }}</a>
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
<hr>
  <div class="row">
    <div class="col">
      {{ $posts->links() }}
    </div>
  </div>
    </div>
@endsection