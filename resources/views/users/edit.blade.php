@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('users.update', [$user]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                  <span class="fw-bold text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                  </span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Contact</label>
                  <input type="text" class="form-control" name="contact" value="{{ $user->contact }}">
                </div>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Image</label>
                  <input type="file" class="form-control" name="avatar" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                  <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3">{{ $user->bio }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary float-end">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection