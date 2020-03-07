
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Z-BLOG</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    @yield('styles')
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light mb-5">
        <div class="container">
          <a class="navbar-brand " href="{{ url('/') }}">Z-BLOG</a>
          <button
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                    @endif
                @else
                <li class="nav-item px-2">
                    <a href="{{route('home')}}" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
                    </div>
                </li>
            @endguest
            </ul>
          </div>
          <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-2" placeholder="Search" />
            <button class="btn btn-outline-primary">Search</button>
          </form>
        </div>
    </nav>




        <section class="mb-5" >

            <div class="container">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>

                @endif
                <div class="row">

                <div class="col-md-3">

                </div>

                <div class="col-md-9">
                    @yield('content')
                </div>

                </div>
            </div>
        </section>


        <footer id="sticky-footer" class="fixed-bottom py-2 bg-dark text-white-50">
            <div class="text-right">
                <p class="mb-0 mr-3">Copyright
                    <script>
                        var CurrentYear = new Date().getFullYear()
                        document.write(CurrentYear)
                    </script>
                © <a href="">Harsha De Pinto</a></p>
            </div>
        </footer>

        @yield('scripts')

</body>
</html>
