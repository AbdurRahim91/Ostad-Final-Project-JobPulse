<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <title>Job Pulse</title>
</head>

<body>
    <header id="header" class="text-white py-1 bg-primary">
        <!-- Navigation Section -->
        <section id="topbar">
            <nav class="navbar navbar-expand-lg shadow-sm bg-white">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="images/sitelogo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{route('about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{route('all-jobs')}}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="btn btn-primary text-uppercase">Dashboard</a>
                                    @else
                                    <a href="{{ route('login') }}"><button class="btn btn-primary text-uppercase ">SIGN IN</button></a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="signup">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </section>
    </header>

    <main>

        @yield('frontend_content')


    </main>
    {{-- footer section  --}}
    @include('frontend.components.footer')
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Axios JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>
    <!-- Custom JS -->
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
</body>

</html>
