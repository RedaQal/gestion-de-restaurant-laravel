<x-dashbordComponents.Admin.admin-dashbord title="Ajouter des employes :">
    <div class="container mt-3 w-50">
        <form action="">
            @csrf
            <div class="mb-3">
                <label for="fullName" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="fullName" placeholder="Nom complete">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control"  id="Email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone</label>
                <input type="tel" name="tel" class="form-control" id="tel" placeholder="Téléphone">
            </div>
            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire</label>
                <input type="text"  class="form-control" name="salaire" id="salaire" placeholder="Salaire">
            </div>
            <button class="btn btn-info">Ajouter</button>
        </form>
    </div>
</x-dashbordComponents.Admin.admin-dashbord>
