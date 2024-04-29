<x-dashbordComponents.Admin.master title="Liste des plats">
    <div class="w-75 m-auto mt-5">
        <table class="table table-hover table-bordered shadow text-center">
            <thead class="table-secondary">
                <tr>
                    <th>#Id</th>
                    <th>Label</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td class='fw-bold'>{{ $produit->id }}</td>
                        <td>{{ $produit->label }}</td>
                        <td>{{ $produit->prix }} MAD</td>
                        <td>{{ $produit->categorie->label }}</td>
                        <td>
                            <button title="Details" type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#produit{{ $produit->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <a href="" title="Modifier" type="button" class="btn btn-success btn-sm"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>
                            <a href="" title="Supprimer" type="button" class="btn btn-danger btn-sm"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                        <x-modal :produit="$produit" />
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            {{ $produits->links('pagination::bootstrap-4') }}
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
