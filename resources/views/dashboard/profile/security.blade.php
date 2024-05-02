<x-dashbordComponents.Admin.master title="Profile">
    <div class="container-xl px-4 mt-4">
        {{-- Account page navigation --}}
        <x-profileNav />
        <hr class="mt-0 mb-4">
        <div class="col-lg-8 w-50 m-auto">
            @if (session()->has('success'))
                <x-alert type="success">
                    {!! session('success') !!}
                </x-alert>
            @endif
            {{-- Change password card --}}
            <div class="card mb-4">
                <div class="card-header">Modifier Mot de passe</div>
                <div class="card-body">
                    <form method="post" action="{{ route('dashboard.profile.security.update') }}">
                        @csrf
                        @method('PUT')
                        {{-- Form Group (current password) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="currentPassword">Mot de passe actuel</label>
                            <input class="form-control" id="currentPassword" type="password" name="old_password"
                                placeholder="Enter mot de passe actuel">
                            @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Form Group (new password) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="newPassword">Nouveau mot de passe</label>
                            <input class="form-control" id="newPassword" type="password" name="password"
                                placeholder="Nouveau mot de passe">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Form Group (confirm password) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="confirmPassword">Confirmer mot de passe</label>
                            <input class="form-control" id="confirmPassword" type="password"
                                name="password_confirmation" placeholder="Confirm new password">
                        </div>
                        @if (session()->has('error'))
                        <small class="text-danger d-block text-center mt-3">{!! session('error') !!}</small>
                        @endif
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
            {{-- Security preferences card --}}
        </div>
    </div>
    <script>
        const close = document.getElementById('close');
        const alert = document.getElementById('alert');
        if (close) {
            close.addEventListener('click', () => {
                alert.remove();
            })
            setInterval(() => {
                alert.remove();
            }, 5000);
        }
    </script>
</x-dashbordComponents.Admin.master>