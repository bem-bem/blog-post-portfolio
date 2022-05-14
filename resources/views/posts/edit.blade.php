@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <x-alert :status="'success'"></x-alert>
          <form action="{{ route('posts.update', [$post]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('posts._inputs')
            <div class="mb-3">
              <x-button class="float-end">Update</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection