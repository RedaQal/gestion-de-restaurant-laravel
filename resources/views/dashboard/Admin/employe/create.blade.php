<x-dashbordComponents.Admin.master title="Ajouter employe">
    <div class="container my-3 w-50">
        @if (session()->has('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
        @endif
        <form action="{{ route('dashboard.employe.store') }}" method="POST" class="border p-5 shadow rounded">
            @csrf
            <div class="mb-3">
                <label for="fullName" class="form-label">Nom :</label>
                <input type="text" name="name" class="form-control" id="fullName" placeholder="Nom complete"
                    value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role :</label>
                <select class="form-select" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                </select>
            </div>
            <div class="mb-3 d-none" id="agent">
                <label for="post" class="form-label">Post :</label>
                <select class="form-select" id="post">
                    <option value="serveur">serveur</option>
                    <option value="caissier">caissier</option>
                    <option value="cuisinier">cuisinier</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email :</label>
                <input type="text" name="email" class="form-control" id="Email" placeholder="example@gmail.com"
                    value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone :</label>
                <input type="tel" name="tel" class="form-control" id="tel" placeholder="+212 XXXXXXXXX"
                    value="{{ old('tel') }}">
                @error('tel')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire :</label>
                <input type="text" class="form-control" name="salaire" id="salaire" placeholder="Salaire"
                    value="{{ old('salaire') }}">
                @error('salaire')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-space-evenly w-75 mx-auto">
                <button class="btn btn-outline-primary w-25 d-block mx-auto">Ajouter</button>
                <button type="reset" class="btn btn-outline-secondary w-25 d-block mx-auto">Vider</button>
            </div>
        </form>
    </div>
    <script>
        const agent = document.getElementById("agent");
        const role = document.getElementById('role');
        const post = document.getElementById('post');
        role.addEventListener("click", function() {
            if (this.value === 'agent') {
                agent.classList.remove('d-none');
                post.name = "post";
            } else {
                agent.classList.add('d-none');
                post.removeAttribute('name');
            }
        });
    </script>
</x-dashbordComponents.Admin.master>
