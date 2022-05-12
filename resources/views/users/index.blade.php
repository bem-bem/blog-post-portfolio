@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="" alt="avatar" class="img-fluid">
        </div>
        <div class="col-md-6">
          <article>
            <h3>Name : {{ $user->name }}</h3>
            <p>Email : {{ $user->email }}</p>
          </article>
        </div>
      </div>
    </div>
@endsection