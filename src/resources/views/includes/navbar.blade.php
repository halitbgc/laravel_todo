<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('todos.index') }}">Todos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
      </ul>
      <form class="d-flex" method="GET" action="{{ route('todos.index') }}">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request('search')}}">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      @auth
        <form class="d-flex" method="POST" action="{{ route('login.logout') }}">
            @csrf
            <button class="btn btn-danger ms-2" type="submit">Logout</button>
        </form>
      @endauth
    </div>
  </div>
</nav>