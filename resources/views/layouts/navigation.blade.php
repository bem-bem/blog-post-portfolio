<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
        </li>
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li>
                   <a class="dropdown-item" href="{{ route('users.show', [Auth::user()->id]) }}">
                    {{ __('Profile') }}
                  </a>
                 </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
          @else
              @if (Route::has('login') and Route::has('register'))
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Authintication
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                      <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    </ul>
                  </li>
              @endif
        @endauth
      </ul>
      <form class="d-flex" action="{{ route('users.index') }}" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
        <x-button color="btn-outline-success">{{ __('Search') }}</x-button>
      </form>
    </div>
  </div>
</nav>