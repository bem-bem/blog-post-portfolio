@extends('layouts.app')

@section('content')
   <div class="container">
         @forelse ($users as $user)
             <div class="card mb-3 shadow-sm">
                  <div class="row g-0">
                     <div class="col-md-2">
                        <img src="{{ $user->image ? asset('storage/' . $user->image->path) : asset('images/avatar.png') }}" class="img-fluid rounded-start">
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title"><a href="{{ route('users.show', [$user]) }}">{{ $user->name }}</a></h5>
                           <p class="card-text"><small class="text-muted">Joined <x-icons.created-at /> {{ $user->created_at->diffForHumans() }}</small></p>
                        </div>
                     </div>
                  </div>
               </div>
         @empty
               <h4 class="display-4 fw-bold text-center">NO USER FOUND 😞</h4>
         @endforelse
         <hr>
         <div class="row">
            <div class="col-lg-12">
               {{ $users->links() }}
            </div>
         </div>
   </div>
@endsection