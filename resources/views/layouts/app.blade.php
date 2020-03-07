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
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    BLOG
                </a>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                  <li class="nav-item px-2">
                  <a href="{{route('home')}}" class="nav-link active">Dashboard</a>
                  </li>
                  <li class="nav-item px-2">
                    <a href="{{route('post.index')}}" class="nav-link">Posts</a>
                  </li>
                  <li class="nav-item px-2">
                    <a href="{{route('category.index')}}" class="nav-link">Categories</a>
                  </li>
                  <li class="nav-item px-2">
                    <a href="users.html" class="nav-link">Users</a>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                   <!-- Authentication Links -->
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
            </div>
        </nav>
        @yield('header')


        <section id="actions" class="py-4 my-4 bg-light">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  @yield('search')
                </div>
                <div class="col-md-3">
                  <a href="{{route('post.create')}}" class="btn btn-primary btn-block" >
                    <i class="fas fa-plus"></i> Add Post
                  </a>
                </div>
                <div class="col-md-3">
                <a href="{{route('category.create')}}" class="btn btn-success btn-block" >
                    <i class="fas fa-plus"></i> Add Category
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus"></i> Add User
                  </a>
                </div>
              </div>
            </div>
        </section>

        <section >

            <div class="container">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>

                @endif
                <div class="row">

                <div class="col-md-3">
                  <div class="card text-center bg-primary text-white mb-3">
                    <div class="card-body">
                      <h3>Posts</h3>
                      <h4 class="display-4">
                        <i class="fas fa-pencil-alt"></i> 6
                      </h4>
                    <a href="{{route('post.index')}}" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                  </div>

                  <div class="card text-center bg-success text-white mb-3">
                    <div class="card-body">
                      <h3>Categories</h3>
                      <h4 class="display-4">
                        <i class="fas fa-folder"></i> 4
                      </h4>
                      <a href="{{route('category.index')}}" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                  </div>

                  <div class="card text-center bg-warning text-white mb-3">
                    <div class="card-body">
                      <h3>Users</h3>
                      <h4 class="display-4">
                        <i class="fas fa-users"></i> 4
                      </h4>
                      <a href="users.html" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                  </div>
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
