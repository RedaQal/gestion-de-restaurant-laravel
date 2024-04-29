<x-dashbordComponents.Admin.master title="Liste des plats">
    <div class="w-75 m-auto mt-5">
        @if (session()->has('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
        @endif
        <table class="table table-hover table-bordered shadow text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>{{ $produit->label }}</td>
                        <td>{{ $produit->prix }} MAD</td>
                        <td>{{ $produit->categorie->label }}</td>
                        <td>
                            <button title="Details" type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#produit{{ $produit->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button title="update" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#update{{ $produit->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#delete{{ $produit->id }}" title="Supprimer"
                                type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                        {{-- details product --}}
                        <x-modal :produit="$produit" />
                    </tr>
                    {{-- delete --}}
                    <div class="modal fade" id="delete{{ $produit->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Vous êtes sur de vouloir supprimer <strong>{{ $produit->label }} </strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('dashboard.menu.destroy', $produit->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- update modal --}}
                    <div class="modal fade" id="update{{ $produit->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Modifier le prix de : {{ $produit->label }}
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dashboard.menu.update', $produit->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="prix">Prix</label>
                                            <input type="text" name="prix" id="prix" class="form-control"
                                                value="{{ $produit->prix }}"
                                                placeholder="Prix">
                                        </div>
                                        <div class="float-end">
                                            <button type="submit" class="btn btn-warning">Modifier</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
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
