<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>@yield('title', 'Marcela Lašová')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://kit.fontawesome.com/yourcode.js"
      crossorigin="anonymous"
    ></script>
    <!-- Import jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="icon" type="image/x-icon" href="res/favicon/favicon.png" />
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-light fixed-top" id="topNav">
      <div class="container" style="max-width: 85%">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          id="navbarCollapse"
          class="collapse navbar-collapse justify-content-between"
        >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link active" style="color: white"
                >Domov</a
              >
            </li>
            <li class="nav-item">
              <a href="{{ route('torty.index') }}" class="nav-link" style="color: white"
                >Ponuka</a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                style="color: white"
              >
                Udalosti
              </a>
              <div class="dropdown-menu">
                <a href="svadba.html" class="dropdown-item">Svadba</a>
                <a href="oslava.html" class="dropdown-item">Oslava</a>
                <a href="kar.html" class="dropdown-item">Kar</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">Ostatné</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="fotog.html" class="nav-link" style="color: white"
                >Fotogaléria</a
              >
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
        @if(Auth::check())
        
          <li class="nav-item">
            <a href="{{ route('shopping-cart.index') }}" class="nav-link" style="color: white">
              <i class="fas fa-shopping-basket"></i> Košík
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('profile.show') }}" class="nav-link" style="color: white">
              <i class="fas fa-user"></i> Profil
            </a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
              <button type="submit" class="nav-link" style="color: white; background: none; border: none;">
                <i class="fas fa-sign-out-alt"></i> Odhlásit
              </button>
            </form>
          </li>
        @else
          <!-- Pokud uživatel není přihlášený -->
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link" style="color: white">
              <i class="fas fa-sign-in-alt"></i> Přihlásit
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link" style="color: white">
              <i class="fas fa-user-plus"></i> Registrovat
            </a>
          </li>
        @endif
          </ul>
        </div>
      </div>
    </nav>
    <div class="jumbotron text-center">
    <h1>Vítajte v cukrárskej výrobe Marcely Lašovej</h1>
    <p>Ponúkame najlepšie a najlahodnejšie torty pre vaše oslavy a události.</p>
    <a class="btn btn-primary btn-lg " href="#objednat" role="button">Objednať</a>
</div>






    <div class="container mt-4">
        @yield('content')
    </div>





    <!-- Script pre hover navmenu -->
    <script>
      const navLinks = document.querySelectorAll(".nav-link");

      navLinks.forEach((link) => {
        link.addEventListener("mouseenter", () => {
          link.classList.add("custom-hover"); // Pridá triedu pre vlastný hover effect
        });

        link.addEventListener("mouseleave", () => {
          link.classList.remove("custom-hover"); // Odobere triedu
        });
      });
    </script>

    <!-- Script pre objavenie navigácie na vrchu -->
    <script>
      window.onscroll = function () {
        var navBar = document.getElementById("topNav");
        if (window.scrollY === 0) {
          navBar.style.top = "0";
        } else {
          navBar.style.top = "-100px";
        }
      };
    </script>

    <footer class="footer mt-auto py-3 bg-light">
      <div class="container justify-content-center text-muted">
        <p>&copy; 2023 Marcela Lašová | Juraj Krišťak</p>
      </div>
    </footer>
    <!-- skript pre prechod v galérií -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>