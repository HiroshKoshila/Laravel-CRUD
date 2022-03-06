<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">LARAVEL CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dash') }}">Dashboard</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('banner') }}">Add Item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('course') }}">Courses</a>
          </li>
        </ul>
        @if (Auth::user())
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
              {{ __('Log Out') }}
          </button>
      </form>
        @else
        <h6 class="log"><a href="{{ route('login') }}">Login</a> </h6>
            <h6 class="reg mr-2 ml-2"><a href="{{ route('register') }}">Register</a> </h6>
        @endif       
      </div>
    </div>
  </nav>

