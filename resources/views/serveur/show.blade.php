<x-agent.master>
    {{-- @dd($commande->produit_commandes[0]->produit->images); --}}
    <div class="container">
        <a href="{{ route('serveur.index') }}" title="Retour à l'accueil" class="d-block mb-3">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="shadow p-3 rounded text-center fw-bold mb-4" style="background-color: #0e2238;color:rgb(255, 255, 255);">
            <div class="row">
                <div class="col-md-3  border-end">
                    <span>Commmande N° : {{ $commande->id }}</span>
                </div>
                <div class="col-md-3 border-end">
                    <span>Total : {{ $commande->total }} MAD</span>
                </div>
                <div class="col-md-3 border-end">
                    <span>Table N° : {{ $commande->client->table_num }}</span>
                </div>
                <div class="col-md-3">
                    <span>Date : {{ $commande->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($commande->produit_commandes as $produits)
                <div class="col-lg-3 col-md-6 col-sm-4 mb-3">
                    <div class="card-sl">
                        <div class="card-image-commande">
                            @if (count($produits->produit->images))
                                <img src="{{ asset('storage/' . $produits->produit->images[0]->url) }}">
                            @endif
                        </div>
                        <div class="card-heading">
                            <span>{{ $produits->produit->label }}</span>
                            <span>Quantite ({{ $produits->quantite }})</span>
                        </div>
                        <div class="card-text">
                            {{ $produits->produit->description }}
                        </div>
                        <div class="card-text-price">
                            Prix :{{ $produits->produit->prix * $produits->quantite }} MAD
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-agent.master>
