<x-agent.serveur.master title="Commande details">
    <div class="container">
        <a href="{{ url()->previous() }}" title="Retour à l'accueil" class="d-block mb-3 fs-5">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="mb-5 mt-4">
            <h1 class="mb-1">Commande Nombre: #{{ $commande->id }} / Table {{ $commande->client->table_num }}</h1>
            <p class="text-muted" style="font-size: 18px;">Placee le: {{ $commande->created_at->format('d/m/Y H:i') }}
            </p>
        </div>

        <div class="d-flex mb-3" style="font-size: 22px">
            <p>Prix Total</p>
            <span class="ms-auto fw-bold" style="color: #e69500">{{ $commande->total }} MAD</span>
        </div>

        @foreach ($commande->produit_commandes as $produits)
            <div class="mb-5">
                <div class="card-sl">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="card-image-commande" style="height:180px; overflow:hidden">
                                @if (count($produits->produit->images))
                                    <img src="{{ asset('storage/' . $produits->produit->images[0]->url) }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-8 px-5 py-4 d-flex flex-column">
                            <div class="card-heading align-items-baseline">
                                <h2 class="text-capitalize mb-1" style="color:#0e2238">
                                    {{ $produits->produit->label }}</h2>
                                <span class="text-secondary">
                                    {{ $produits->produit->prix }} MAD</span>
                            </div>
                            <p class="text-muted">
                                Quantite: ({{ $produits->quantite }})
                            </p>
                            <div class="d-flex border-top border-2 pt-3 mt-auto">
                                <span class="text-muted">Prix Totale:</span>
                                <span
                                    class="card-text-price ms-auto fw-bold">{{ $produits->produit->prix * $produits->quantite }}
                                    MAD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-agent.serveur.master>
