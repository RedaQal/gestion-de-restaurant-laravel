@props(['produit'])
{{-- card --}}
<div class="card">
    <div class="card-body">
        @if (count($produit->images) > 0)
            <swiper-container class="mySwiper" space-between="30" pagination="true" pagination-clickable="true">
                @foreach ($produit->images as $image)
                    <swiper-slide>
                        <img class="card-img-top shadow-sm"  style="height:9rem;object-fit: cover;"
                            src="{{ asset('storage/' . $image->url) }}"  loading="lazy"/>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        @endif
        <p class="name">{{ $produit->label }}</p>
        <p class="description">
            {{ Str::limit($produit->description, 80) }}
        </p>
    </div>
    <div class="cardFooter">
        <p class="price">{{ $produit->prix }} MAD</p>
        <button class="btn btn-sm border" data-produit-id="{{ $produit->id }}"
            data-produit-label="{{ $produit->label }}" data-produit-prix="{{ $produit->prix }}"
            data-produit-image="storage/{{ $produit->images->first()->url }}" onclick="addToCart(this)">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
</div>
