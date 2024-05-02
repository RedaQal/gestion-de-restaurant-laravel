<x-dashbordComponents.Admin.master title="Profile">
    <div class="container-xl px-4 mt-4">
        {{-- Account page navigation --}}
        <x-profileNav />
        @if (session()->has('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
        @endif
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                {{-- Profile picture card --}}
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        {{-- Profile picture image --}}
                        <img class="img-account-profile  mb-2 imageEmp" src="{{ asset('images/user.png') }}"
                            alt="">
                        {{-- Profile picture help block --}}
                        <div class="small font-italic mb-4 mt-1">
                            <p class="h3">{{ $user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Account details card --}}
            <div class="card mb-4 col-xl-6">
                <div class="card-header">Compte details</div>
                <div class="card-body">
                    <form method="post" action="{{ route('dashboard.profile.update') }}" id="form">
                        @csrf
                        @method('PUT')
                        {{-- Form Group (username) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Nom compléte :</label>
                            <input class="form-control" name="name" id="inputUsername" type="text"
                                placeholder="Nom compléte" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Form Group (email address) --}}
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email :</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Email"
                                value="{{ $user->email }}" disabled>
                        </div>
                        {{-- Form Group (phone number) --}}
                        <div class="md-6">
                            <label class="small mb-1" for="inputPhone">Numéro de Téléphone :</label>
                            <input class="form-control" name="tel" id="inputPhone" type="tel"
                                placeholder="Numéro de Téléphone " value="{{ old('tel', $user->tel) }}">
                            @error('tel')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Form Group (Salaire) --}}
                        <div class="md-6 mt-2">
                            <label class="small mb-1" for="inputPhone">Salaire :</label>
                            <input class="form-control" id="inputPhone" type="tel" placeholder=""
                                value="{{ $user->salaire }} MAD" readonly disabled>
                        </div>
                        {{-- Form Group (Role) --}}
                        <div class="md-6 mt-2">
                            <label class="small mb-1" for="inputPhone">Role :</label>
                            <input class="form-control" id="inputPhone" type="tel" placeholder=""
                                value="{{ $user->role }} " readonly disabled>
                        </div>
                        {{-- date of create profile --}}
                        <div class="md-6 mt-2 float-end text-secondary h6">
                            Date de creation de compte :<span>
                                {{ date_create($user->created_at)->format('d/m/Y') }}</span>
                        </div>
                        {{-- Save changes button --}}
                        <button class="btn btn-primary mt-4" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
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