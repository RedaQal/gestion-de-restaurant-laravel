<nav class="nav nav-borders">
    <a class="nav-link {{ request()->routeIs('dashboard.profile.index') ? 'active' : '' }} ms-0"
        href="{{ route('dashboard.profile.index') }}">Compte</a>
    <a class="nav-link {{ request()->routeIs('dashboard.profile.security') ? 'active' : '' }}"
        href="{{ route('dashboard.profile.security') }}">Sécurité</a>
</nav>
