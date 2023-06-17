<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div id="app" class="main d-flex">
        <div class="sidebar">
            <div class="head">
                <h1 class="fs-4">
                    <a class="navbar-brand" href="{{ url('/') }}">BND Employee Portal</a>
                </h1>

                <div class="dropdown">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Document Request
                    </div>
                    <ul class="dropdown-menu list-unstyled">
                      <li><a class="dropdown-item text-decoration-none" type="button">Document Request</a></li>
                      <li><a class="dropdown-item text-decoration-none" type="button">Document Request</a></li>
                      <li><a class="dropdown-item text-decoration-none" type="button">Document Request</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Leave Request
                    </div>
                    <ul class="dropdown-menu list-unstyled">
                      <li><a class="dropdown-item text-decoration-none" type="button">Pending</a></li>
                      <li><a class="dropdown-item text-decoration-none" type="button">Approved</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Loan Request
                    </div>
                    <div class="dropdown-menu list-unstyled">
                      <li><a class="dropdown-item text-decoration-none" type="button">Loan Request</a></li>
                      <li><a class="dropdown-item text-decoration-none" type="button">Loan Request</a></li>
                    </div>
                </div>

                <div class="dropdown">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Other Request
                    </div>
                    <ul class="dropdown-menu list-unstyled">
                      <li><a class="dropdown-item text-decoration-none" type="button">Other Request</a></li>
                      <li><a class="dropdown-item text-decoration-none" type="button">Other Request</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #0079FF;">
                <i class="fa-solid fa-bars" style="color: #f5f5f5;"></i> <div class="container">
     
                  
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                         <span class="navbar-toggler-icon"></span>
                     </button>
     
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <!-- Left Side Of Navbar -->
                         <ul class="navbar-nav me-auto">
     
                         </ul>
     
                         <!-- Right Side Of Navbar -->
                         <ul class="navbar-nav ms-auto">
                             <!-- Authentication Links -->
                             @guest
                                 <!-- @if (Route::has('login'))
         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                         </li>
         @endif
     
                                     @if (Route::has('register'))
         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                         </li>
         @endif -->
                             @else
                                 <li class="nav-item dropdown">
                                     <a id="navbarDropdown" class="nav-link dropdown-toggle  text-white" href="#"
                                         role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                         v-pre><i class="fa-solid fa-user" style="color: #dedede;"></i>
     
                                     </a>
     
                                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="">{{ Auth::user()->name }}</a>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
     
                                             {{ __('Logout') }}
                                         </a>
     
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                             @csrf
                                         </form>
                                     </div>
                                 </li>
                             @endguest
                         </ul>
                     </div>
                 </div>
             </nav>
             
                 <main class="py-4">
                     @yield('content')
                 </main>
        </div>
        
      
    </div>
    
    </div>
</body>
</html>
