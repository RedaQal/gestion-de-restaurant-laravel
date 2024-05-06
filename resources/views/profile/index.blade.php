<x-agent.master title="Profile">
    <div class="container-xl px-4 ">
        {{-- Account page navigation --}}
        <nav class="nav nav-borders">
            <a class="nav-link text-decoration-none  {{ request()->routeIs('profile.index') ? 'active' : '' }} ms-0"
                href="{{ route('profile.index') }}">Compte</a>
            <a class="nav-link text-decoration-none  {{ request()->routeIs('profile.security') ? 'active' : '' }}"
                href="{{ route('profile.security') }}">Sécurité</a>
        </nav>
        @if (session()->has('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
        @endif
        <hr class="mt-0">
        <div class="row">
            <div class="col-xl-4">
                {{-- Profile picture card --}}
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Image de profile</div>
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
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">Compte details</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" id="form">
                            @csrf
                            @method('PUT')
                            {{-- Form Group (username) --}}
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nom compléte :</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    name="name" id="inputUsername" type="text" placeholder="Nom compléte"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- Form Group (email address) --}}
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email :</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    name="email" value="{{ old('email', $user->email) }}" id="inputEmailAddress"
                                    type="email" placeholder="Email" value="{{ $user->email }}" disabled>
                            </div>
                            {{-- Form Group (phone number) --}}
                            <div class="md-6">
                                <label class="small mb-1" for="inputPhone">Numéro de Téléphone :</label>
                                <input class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }}"
                                    name="tel" id="inputPhone" type="tel" placeholder="Numéro de Téléphone "
                                    value="{{ old('tel', $user->tel) }}">
                                @error('tel')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- Form Group (Salaire) --}}
                            <div class="md-6 mt-2">
                                <label class="small mb-1" for="inputPhone">Salaire :</label>
                                <input class="form-control {{ $errors->has('salaire') ? 'is-invalid' : '' }}"
                                    name="salaire" value="{{ old('salaire', $user->salaire) }}" id="inputPhone"
                                    type="tel" placeholder="" value="{{ $user->salaire }} MAD" readonly disabled>
                            </div>
                            {{-- Form Group (Role) --}}
                            <div class="md-6 mt-2">
                                <label class="small mb-1" for="inputPhone">Role :</label>
                                <input class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}"
                                    name="role" value="{{ old('role', $user->role) }}" id="inputPhone"
                                    type="tel" placeholder="" value="{{ $user->role }} " readonly disabled>
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
    </div>
</x-agent.master>
