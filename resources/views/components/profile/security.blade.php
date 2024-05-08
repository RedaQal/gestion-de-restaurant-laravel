<div class="container-xl px-4">
        {{-- Account page navigation --}}
        <nav class="nav nav-borders">
            <a class="nav-link text-decoration-none  {{ request()->routeIs('profile.index') ? 'active' : '' }} ms-0"
                href="{{ route('profile.index') }}">Compte</a>
            <a class="nav-link text-decoration-none  {{ request()->routeIs('profile.security') ? 'active' : '' }}"
                href="{{ route('profile.security') }}">Sécurité</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="col-lg-8 m-auto">
            @if (session()->has('success'))
                <x-alert>
                    {!! session('success') !!}
                </x-alert>
            @endif
            {{-- Change password card --}}
            <div class="card">
                <div class="card-header " style="background-color: #0e2238;color:white;">Modifier Mot de passe</div>
                <div class="card-body">
                    <form method="post" action="{{ route('profile.security.update') }}">
                        @csrf
                        @method('PUT')
                        {{-- Form Group (current password) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="currentPassword">Mot de passe actuel</label>
                            <input class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}"
                                id="currentPassword" type="password" name="old_password"
                                placeholder="Enter mot de passe actuel">
                            @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Form Group (new password) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="newPassword">Nouveau mot de passe</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                id="newPassword" type="password" name="password" placeholder="Nouveau mot de passe">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Form Group (confirm password) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="confirmPassword">Confirmer mot de passe</label>
                            <input class="form-control" id="confirmPassword" type="password"
                                name="password_confirmation" placeholder="Confirmer le nouveau mot de passe">
                        </div>
                        @if (session()->has('error'))
                            <small class="text-danger d-block text-center mt-3">{!! session('error') !!}</small>
                        @endif
                        <button class="btn" style="background-color: #0e2238;color:white;" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
