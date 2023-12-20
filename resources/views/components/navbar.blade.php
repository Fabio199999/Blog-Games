
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="text-white navbar-brand" href="#">BLOG GAMES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="text-white nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="text-white nav-link active" aria-current="page" href="{{route('articles.index')}}">Tutti gli articoli</a>
        </li>
        
        @auth 
        <li class="nav-item">
          <a class="text-white nav-link active" aria-current="page" href="{{route('articles.create')}}">Inserisci un'articolo</a>
        </li>

        <li class="nav-item">
        <a class="text-white nav-link active" aria-current="page" href="#">{{Auth::user()->name}}</a>
        </li>

        <li class="nav-item">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="text-white nav-link" type="submit">Logout</button>
          </form>
        </li>

        @endauth

        @guest 
        <li class="nav-item">
          <a class="text-white nav-link" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="text-white nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>