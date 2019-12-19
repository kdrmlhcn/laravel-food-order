<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hamburger sipariş vermenin en hızlı adresi." >
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-red">
        <a class="navbar-brand" href="{{ route('frontend.home') }}">{{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->is('about-us') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.about') }}">About Us</a>
                </li>
                <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.menu') }}">Menu</a>
                </li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="row total-header-section">
                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                            </div>

                                            <?php $total = 0 ?>
                                            @foreach((array) session('cart') as $id => $details)
                                                <?php $total += $details['price'] * $details['quantity'] ?>
                                            @endforeach

                                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                                <p>Total: <span class="text-info">{{ $total }} ₺</span></p>
                                            </div>
                                        </div>

                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img src="{{ asset('uploads/products/'.$details['image']) }}" />
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <p>{{ $details['name'] }}</p>
                                                        <span class="price text-info">{{ $details['price'] }} ₺</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</header>

<main role="main">

    @if(Request::is('/'))
        @yield('slider')
    @endif

    <div class="container marketing">

        @yield('content')

    </div>


    <!-- FOOTER -->
    <footer class="container mt-4">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2019 - CADA FOOD Company, Inc.</p>
    </footer>
</main>

@yield('scripts')

</body>
</html>
