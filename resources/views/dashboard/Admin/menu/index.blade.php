<x-Admin.master title="Liste des plats">
    @if (session()->has('success'))
        <x-alert>
            {!! session('success') !!}
        </x-alert>
    @endif
    <h6 class="upcomming">Liste des Plats</h6>
    <div class="d-flex gap-2 flex-wrap">
        @foreach ($produits as $produit)
            <div class="product-card">
                <div class="product-tumb">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($produit->images as $image)
                                @if (count($produit->images))
                                    <div class="swiper-slide"><img src="{{ asset('storage/' . $image->url) }}" /></div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="product-details">
                    <span class="product-catagory">{{ $produit->categorie->label }}</span>
                    <h4>{{ Str::ucfirst($produit->label) }} </h4>
                    <p>{{ Str::limit($produit->description, 30) }}</p>
                    <div class="product-bottom-details">
                        <div class="product-price">{{ $produit->prix }} MAD</div>
                        <div class="product-links">
                            <button title="update" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#update{{ $produit->id }}"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button data-bs-toggle="modal" data-bs-target="#delete{{ $produit->id }}" title="Supprimer"
                                type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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
                                    <label for="label" class="form-label">Label :</label>
                                    <input type="text" id='label' name="label" class="form-control"
                                        placeholder="Nom de Produit" value="{{ $produit->label }}" placeholder="Label">
                                </div>
                                <div class="mb-3">
                                    <label for="prix">Prix</label>
                                    <input type="text" name="prix" id="prix" class="form-control"
                                        value="{{ $produit->prix }}" placeholder="Prix">
                                </div>
                                <div class="float-end">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-warning">Modifier</button>

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
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        const swiper = new Swiper('.swiper', {
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            grabCursor: true,
            slidesPerView: 1,
        })

        const myModal = document.getElementById('myModal');
        if (myModal) {

            myModal.addEventListener('shown.bs.modal', () => {
                myModal.handleUpdate()
            })
        }
    </script>
    </x-dashbordComponents.Admin.master>
