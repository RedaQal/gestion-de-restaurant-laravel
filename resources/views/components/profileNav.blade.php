<style>
    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
<nav class="nav nav-borders">
    <a class="nav-link  {{ request()->routeIs('dashboard.profile.index') ? 'active' : '' }} ms-0"
        href="{{ route('dashboard.profile.index') }}">Compte</a>
    <a class="nav-link {{ request()->routeIs('dashboard.profile.security') ? 'active' : '' }}"
        href="{{ route('dashboard.profile.security') }}">Sécurité</a>
</nav>
