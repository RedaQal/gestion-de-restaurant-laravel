{{-- SCROLL TOP --}}
<a href="#" class="scrolltop" id="scroll-top">
    <i class='bx bx-chevron-up scrolltop__icon'></i>
</a>

{{-- HEADER --}}

<header class="l-header" id="header">
    <nav class="nav bd-container navbar navbar-expand-lg mt-3">
        <a href="{{ route('index.index') }}">
            <img src="{{ asset('images/Gustaria.png') }}" alt="" class="img__brand">
        </a>
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link active-link">Acceuil</a></li>
                <li class="nav__item"><a href="#about" class="nav__link">A propos de nous</a></li>
                <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="#menu" class="nav__link">Menu</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contactez-nous</a></li>
                <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
            </ul>
        </div>
        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>
