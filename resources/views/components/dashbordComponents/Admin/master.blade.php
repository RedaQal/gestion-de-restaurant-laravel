<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/StyleDashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-chart-line"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Acceuil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#employe" aria-expanded="false" aria-controls="employe">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Employé</span>
                    </a>
                    <ul id="employe" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('dashboard.employe.index') }}" class="sidebar-link"><small
                                    class="text-small">List employes</small></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('dashboard.employe.create') }}" class="sidebar-link"><small
                                    class="text-small">Ajouter employé</small></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#menu" aria-expanded="false" aria-controls="menu">
                        <i class="fa-solid fa-utensils"></i>
                        <span>Menu</span>
                    </a>
                    <ul id="menu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('dashboard.menu.index') }}" class="sidebar-link">
                                <small class="text-small">List Plats</small></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('dashboard.menu.create') }}" class="sidebar-link">
                                <small class="text-small">Ajouter Plats</small></a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="{{ route('login.logout') }}" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Decconnexion</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3 bg-secondary ">
                <div class="navbar-collapse collapse">
                    <h4 class="text-white">{{ $title }} :</h4>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0 text-white me-5">
                                <i class="fa-solid fa-user me-2"></i>
                                {{ Str::upper(Auth::user()->name) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                                <a href="{{ route('dashboard.profile.index') }}" class="dropdown-item">
                                    <i class="fa-solid fa-user me-2"></i>
                                    <span class="text">Profile</span>
                                </a>
                                <a href="{{ route('login.logout') }}" class="dropdown-item">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    <span class="text">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main>
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
</body>

</html>
