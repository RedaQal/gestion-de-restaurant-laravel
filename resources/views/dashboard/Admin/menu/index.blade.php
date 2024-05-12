<x-Admin.master title="Liste des plats">
    @if (session()->has('success'))
        <x-alert>
            {!! session('success') !!}
        </x-alert>
    @endif
    <div class="d-flex gap-2 flex-wrap">
        @foreach ($produits as $produit)
            <div class="product-card">
                <div class="product-tumb">
                    @if (count($produit->images))
                        <img src="{{ asset('storage/' . $produit->images[0]->url) }}" alt="">
                    @endif
                </div>
                <div class="product-details">
                    <span class="product-catagory">{{ $produit->categorie->label }}</span>
                    <h4<a href="">{{ $produit->label }}</a></h4>
                        <p>{{ Str::limit($produit->description, 20) }}</p>
                        <div class="product-bottom-details">
                            <div class="product-price"><small></small>{{ $produit->prix }} MAD</div>
                            <div class="product-links">
                                <button title="Details" type="button" class="btn btn-secondary btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#produit{{ $produit->id }}"><i
                                        class="fa-solid fa-eye"></i></button>
                                <button title="update" type="button" class="btn btn-success btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#update{{ $produit->id }}"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button data-bs-toggle="modal" data-bs-target="#delete{{ $produit->id }}"
                                    title="Supprimer" type="button" class="btn btn-danger btn-sm"><i
                                        class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                </div>
            </div>
            {{-- details product --}}
            <x-modal :produit="$produit" />
            {{-- delete --}}
            <div class="modal fade" id="delete{{ $produit->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <div class="modal fade" id="update{{ $produit->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        value="{{ $produit->prix }}" placeholder="Prix">
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
        @endforeach
    </div>
    <div class="float-end">
        {{ $produits->links('pagination::bootstrap-4') }}
    </div>

</x-dashbordComponents.Admin.master>
