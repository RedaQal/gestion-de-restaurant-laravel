@props(['produit'])
<div class="col-md-4 mb-3 ">
    <div class="card" style="width: 14rem;height:18rem;">
        @if (count($produit->images) > 0)
            <img class="card-img-top shadow-sm" style="height:9rem;object-fit: cover;"
                src="{{ asset('storage/' . $produit->images[0]->url) }}" />
        @endif
        <div class="card-body">
            <h6 class="card-title">{{ $produit->label }}</h6>
            <p class="text-muted text-break" style="font-size: 0.8rem">{{ Str::limit($produit->description, 80) }}</p>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <small class="badge bg-warning">{{ $produit->prix }} MAD</small>
                <button class="btn btn-sm border"><i class="fa-solid fa-plus" style="color: #ff9500"></i></button>
            </div>
        </div>
    </div>
</div>
