<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/agentDashboard.css') }}">
    <link rel="icon" href="{{ asset('images/Gustaria.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ $title }}</title>
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i>
                </a>
                <a href="{{ route('serveur.index') }}"class="brand-logo"> <span>Serveur</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <a href="{{ route('serveur.index') }}"
                    class="dashboard-nav-item {{ Route::currentRouteNamed('serveur.index') ? 'active' : '' }}"><i
                        class="fa-solid fa-clipboard-list"></i>Tous les commandes </a>
                <a href="{{ route('serveur.myOrders') }}"
                    class="dashboard-nav-item {{ Route::currentRouteNamed('serveur.myOrders') ? 'active' : '' }}"><i
                        class="fa-solid fa-list-check"></i> Mes commandes </a>
                <a href="#" class="dashboard-nav-item"><i class="fa-solid fa-cart-plus"></i>Passer
                    commande </a>
                <a href="{{ route('profile.index') }}"
                    class="dashboard-nav-item {{ Route::currentRouteNamed('profile.index') || Route::currentRouteNamed('profile.security') ? 'active' : '' }}"><i
                        class="fas fa-user"></i> Profile </a>
                <div class="nav-item-divider"></div>
                <a href="{{ route('login.logout') }}" class="dashboard-nav-item "><i class="fas fa-sign-out-alt"></i>
                    Déconnexion </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar d-flex justify-content-between'>
                <a href="#" class="menu-toggle text-decoration-none "><i class="fa-solid fa-bars"></i></a>
                <div class="fw-bold text-uppercase me-5">{{ Auth::user()->name }}</div>
            </header>
            <div class='dashboard-content'>
                <div class=''>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
        $(document).ready(function() {
            $(".dashboard-nav-dropdown-toggle").click(function() {
                $(this).closest(".dashboard-nav-dropdown")
                    .toggleClass("show")
                    .find(".dashboard-nav-dropdown")
                    .removeClass("show");
                $(this).parent()
                    .siblings()
                    .removeClass("show");
            });
            $(".menu-toggle").click(function() {
                if (mobileScreen.matches) {
                    $(".dashboard-nav").toggleClass("mobile-show");
                } else {
                    $(".dashboard").toggleClass("dashboard-compact");
                }
            });
        });
    </script>
</body>

</html>
