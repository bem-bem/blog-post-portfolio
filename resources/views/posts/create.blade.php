@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <x-alert :status="'success'"></x-alert>
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="exampleFormControlInput1">
                        @error('title')
                        {{ $message }}
                        @enderror
                      </div>
                    
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Thumbnail</label>
                        <input type="file" class="form-control" name="thumbnail" id="exampleFormControlInput1">
                      </div>
                    
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
                          rows="3">{{ old('content') }}</textarea>
                      </div>
                    
                      <div class="mb-3">
                        <x-button class="float-end">Submit</x-button>
                      </div>
                    </form>
              </div>
            </div>
        </div>
      </div>
    </div>
@endsection