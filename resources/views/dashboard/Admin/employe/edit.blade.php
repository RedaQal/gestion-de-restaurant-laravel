<x-dashbordComponents.Admin.master title="Modifier employe">
    <div class="container my-3 w-50">
        <form action="{{ route('dashboard.employe.update', $employe->id) }}" method="POST"
            class="border p-5 shadow rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fullName" class="form-label">Nom :</label>
                <input type="text" name="name" class="form-control" id="fullName" placeholder="Nom complete"
                    value="{{ old('name', $employe->name) }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email :</label>
                <input type="text" name="email" class="form-control" id="Email" placeholder="example@gmail.com"
                    value="{{ old('email', $employe->email) }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone :</label>
                <input type="tel" name="tel" class="form-control" id="tel" placeholder="+212 XXXXXXXXX"
                    value="{{ old('tel', $employe->tel) }}">
                @error('tel')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire :</label>
                <input type="text" class="form-control" name="salaire" id="salaire" placeholder="Salaire"
                    value="{{ old('salaire', $employe->salaire) }}">
                @error('salaire')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-space-evenly w-75 mx-auto">
                <button class="btn btn-outline-primary w-25 d-block mx-auto">Modifier</button>
                <a href="{{ route('dashboard.employe.index') }}" type="reset"
                    class="btn btn-outline-secondary w-25 d-block mx-auto">Annuler</a>
            </div>
        </form>
    </div>
</x-dashbordComponents.Admin.master>
