<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('frontend/img/favicon.ico" type="image/x-icon') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/timelines.css') }}" />
    <title>@yield('title')</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light shadow-sm" id="topNav">
        <div class="container">
            <!-- Navbar Logo -->
            <a class="navbar-brand mx-auto mx-lg-0" data-scroll href="/">
                <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo" width="120" />
            </a>
            <!-- Navbar Menu  -->
            <div class="d-none d-lg-block" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="{{route('karya')}}">Upload Karya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="#timelines">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('track')}}">Tracking</a>
                    </li>
                    <a class="btn btn-rounded my-sm-0 ml-auto primary-color" data-scroll href="{{route('daftar')}}">
                        <span class="fas fa-user" style="margin-right: 10px"></span>Register
                    </a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Bottom Navbar -->
    <nav class="navbar navbar-light navbar-expand p-0 d-md-none d-lg-none d-xl-none fixed-bottom top-shadow" id="bottomNav">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="#" class="nav-link active"><i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('track')}}" class="nav-link"><i class="fas fa-info"></i>
                    <p>Tracking</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('daftar')}}" class="nav-link"><i class="fas fa-user"></i>
                    <p>Register</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End of Bottom Navbar -->

   @yield('content')

    <!-- Footer -->
    <footer class="footer bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer_logo">
                        <img src="{{asset('frontend/img/logo.png')}}" alt="logo" class="img-fluid d-block" width="120" />
                        <p class="text-muted mt-4">2021 © IT TEAM INVFEST.</p>
                        <h5 class="fw-bold mt-4">Follow Us</h5>
                        <ul class="list-inline fot_social mt-4">
                            <li class="list-inline-item">
                                <a href="" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="social-icon"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="social-icon"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_menu">
                        <h5 class="fw-bold">Navigation</h5>
                        <ul class="list-unstyled footer_menu_list mb-0 mt-4">
                            <li><a href="#">Home</a></li>
                            <li><a href="{{route('track')}}">Tracking</a></li>
                            <li><a href="#">Details</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_menu">
                        <h5 class="fw-bold">More</h5>
                        <ul class="list-unstyled footer_menu_list mb-0 mt-4">
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Rulebook</a></li>
                            <li><a href="#">Template</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    @yield('js-tambahan')
</body>

</html>
