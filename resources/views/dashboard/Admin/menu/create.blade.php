<x-dashbordComponents.Admin.master title="Ajouter Plat">

    <div class="container my-3 w-50">
        @if (session()->has('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
        @endif
        <form action="{{ route('dashboard.menu.store') }}" method="POST" class="border p-5 shadow rounded"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="label" class="form-label">Label :</label>
                <input type="text" id='label' name="label" class="form-control" placeholder="Nom de Produit"
                    value="{{ old('label') }}">
                @error('label')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                    placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix :</label>
                <input type="text" class="form-control" name="prix" id="prix" placeholder="prix de produit"
                    value="{{ old('prix') }}">
                @error('prix')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Categorie :</label>
                <select name="id_categorie" id="categorie" class="form-select">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" @selected(old('id_categorie') == $categorie->id)>{{ $categorie->label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input type="file" name="image[]" id="image" class="form-control" multiple>
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-space-evenly w-75 mx-auto">
                <button type="submit" class="btn btn-outline-primary w-25 d-block mx-auto">Ajouter</button>
                <button type="reset" class="btn btn-outline-secondary w-25 d-block mx-auto">Vider</button>
            </div>
        </form>
    </div>
</x-dashbordComponents.Admin.master>
