<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Gustaria.png') }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/agentDashboard.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.jqueryui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>

<body>
<div class='dashboard'>
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i>
                </a>
                <a href="{{ route('dashboard.index') }}"class="brand-logo"><span>Admin</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <a href="{{ route('dashboard.index') }}"
                    class="dashboard-nav-item {{ Route::currentRouteNamed('dashboard.index') ? 'activee' : '' }}"><i class="fa-solid fa-house"></i>Acceuil</a>
                <div class='dashboard-nav-dropdown'><a href="#"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle {{ Route::currentRouteNamed('dashboard.employe.index') || Route::currentRouteNamed('dashboard.employe.create') ? 'activee' : '' }}"><i class="fa-solid fa-users"></i>
                        Employes </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{ route('dashboard.employe.index') }}" class="dashboard-nav-dropdown-item {{ Route::currentRouteNamed('dashboard.employe.index') ? 'activee' : '' }}">List employe</a>
                        <a href="{{ route('dashboard.employe.create') }}" class="dashboard-nav-dropdown-item {{ Route::currentRouteNamed('dashboard.employe.create') ? 'activee' : '' }}">Ajouter employe</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle {{ Route::currentRouteNamed('dashboard.menu.index') || Route::currentRouteNamed('dashboard.menu.create') ? 'activee' : '' }}"><i class="fa-solid fa-utensils"></i>
                        Menu </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{ route('dashboard.menu.index') }}" class="dashboard-nav-dropdown-item {{ Route::currentRouteNamed('dashboard.menu.index') ? 'activee' : '' }}">List plat</a>
                        <a href="{{ route('dashboard.menu.create') }}" class="dashboard-nav-dropdown-item {{ Route::currentRouteNamed('dashboard.menu.create') ? 'activee' : '' }}">Ajouter plat</a>
                    </div>
                </div>
                <a href="{{ route('dashboard.profile.index') }}"
                    class="dashboard-nav-item {{ Route::currentRouteNamed('dashboard.profile.index') || Route::currentRouteNamed('dashboard.profile.security') ? 'activee' : '' }}"><i
                        class="fas fa-user"></i>
                    Profile
                </a>
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
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.jqueryui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
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
