<x-dashbordComponents.Admin.admin-dashbord title="Ajouter Plat :">
    <div class="container mt-3 w-50">
        <form action="">
            @csrf
            <div class="mb-3">
                <label for="label" class="form-label">Label :</label>
                <input type="text" id='label' class="form-control"  placeholder="Nom de Produit">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix :</label>
                <input type="number" class="form-control" id="prix" placeholder="le prix de produit">
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Categorie :</label>
                <select name="categorie" id="categorie" class="form-select">
                    <option value="1">ghda</option>
                    <option value="0">3cha</option>
                </select>
            </div>
            <button class="btn btn-info">Ajouter</button>
        </form>
    </div>
</x-dashbordComponents.Admin.admin-dashbord>
