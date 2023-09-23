<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@100;200;300;400;600;700;800;900&family=Inclusive+Sans&family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- CSS padrao -->
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js"></script>

    </head>
    <body>
      <header>
        <nav class="nav-bar navbar-expand-lg navbar-light">
         <div class="collapse navbar-collapse" id='navbar'>
           <a href="/" class="navbar-brand">
            <img src="/img/filme.avif" alt="Logo">
           </a> 
            <ul class='navbar-nav'>
                <li class='nav-item'>
                  <a href="/movies" class='nav-link'>Filmes</a>
                </li>
                <li class='nav-item'>
                  <a href="/events/create" class='nav-link'>Adicionar Filmes</a>
                @auth
                <li class='nav-item'>
                  <a href="/dashboard" class='nav-link'>Meus Adicionados</a>
                </li>
                <li clas='nav-item'>
                  <form action="/logout" method='POST'>
                    @csrf
                    <a href="/logout" class='nav-link' onclick='event.preventDefault();
                    this.closest("form").submit();'
                    >Sair</a>
                  </form>
                </li>
                @endauth
                @guest
                <li class='nav-item'>
                  <a href="/login" class='nav-link'>Entrar</a>
                </li>
                <li class='nav-item'>
                  <a href="/register" class='nav-link'>Cadastrar</a>
                </li>
               @endguest
            </ul>
         </div>
        </nav>
      </header>
        <main>
          <div class="container-fluid">
            <div>
              @if(session('msg'))
              <p class="msg">{{ session('msg')}}</p>
              @endif
              @yield('content')
            </div>
          </div>
        </main>
      <footer>
        <p>Movies THG &copy; 2023</p>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
