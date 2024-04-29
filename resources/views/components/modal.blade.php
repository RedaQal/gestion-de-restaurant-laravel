<div class="modal fade" id="produit{{ $produit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Détail Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($produit->images as $image)
                            <div class="swiper-slide"><img src="{{ asset('storage/' . $image->url) }}" /></div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <hr>
                <div class=" m-auto">
                    <p class="text-capitalize fw-bold text-center h3"> {{ $produit->label }}</p>
                    <p class="mt-3">{{ $produit->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span><span class="fw-bold">Prix:</span> {{ $produit->prix }} MAD</span>
                        <span> <span class="fw-bold">categorie :</span> {{ $produit->categorie->label }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    myModal.addEventListener('shown.bs.modal', () => {
        myModal.handleUpdate()
    })
</script>
