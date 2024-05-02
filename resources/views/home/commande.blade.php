<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/CommandeStyle.css') }}" />
    <link rel="icon" href="{{ asset('images/Gustaria.png') }}">
    <title>Commander</title>
</head>

<body>
    <div class="container">
        <div class="menu">
            <div class="header">
                <div class="logo">
                    <img src="{{ asset('images/Gustaria.png') }}" alt="logo" />
                </div>
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Rechercher un plat" />
                </div>
                <div class="info">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div class="backTo">
                    <a href="{{ route('index.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
            <div class="infoHover">
                <p>Nous somme à</p>
                <p>Oujda</p>
                <span>NOUS ATTENDONS VOTRE VISITE</span>
            </div>
            <div class="categories">
                @foreach ($categories as $category)
                    <a class="categorie" href="#{{ $category->label }}">
                        <img src="images/sandwich.png" alt="plat" />
                        <p>{{ Str::ucfirst($category->label) }}</p>
                    </a>
                @endforeach
            </div>
            <div class="alert">
                <i class="fa-solid fa-utensils"></i>
                <p>Nous proposons les meilleurs types de nourriture .</p>
            </div>
            <div class="food">
                @foreach ($categories as $categorie)
                    <h1 id="{{ $categorie->label }}">{{ Str::ucfirst($categorie->label) }}
                        ({{ count($produits->where('id_categorie', $categorie->id)) }})</h1>
                    <div class="categoriesFood">
                        @if (!count($produits->where('id_categorie', $categorie->id)))
                            <p class="aucunProduit"><i class="fa-solid fa-circle-exclamation"></i> Aucun produit pour
                                cette categorie pour l'instant</p>
                        @else
                            @foreach ($produits as $produit)
                                @if ($produit->id_categorie === $categorie->id)
                                    <x-commandeCard :produit="$produit" />
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="commandes">
            <div class="CommandeHeader">
                <i class="fa-solid fa-cart-shopping"></i>
                <h1>Votre Commande</h1>
            </div>
            <h3>List des commandes :</h3>
            <div class="listCommande" id="listCommande">
            </div>
            <div class="addCommande">
                <div class="total">
                    <span>TOTAL :</span>
                    <span id="total">0</span>
                </div>
                <button>PASSER LA COMMANDE</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        const infoHover = document.querySelector(".infoHover");
        const info = document.querySelector(".fa-location-dot");
        const listCommande = document.querySelector("#listCommande");
        const AfficherTotal = document.querySelector("#total");
        info.addEventListener("mouseover", () => {
            infoHover.style.display = "block";
        });
        info.addEventListener("mouseout", () => {
            infoHover.style.display = "none";
        });

        let products = localStorage.getItem('produit') ? JSON.parse(localStorage.getItem('produit')) : [];

        const totalHandler = () => {
            let total = 0;
            products.forEach((p) => {
                total += p.prix * p.quantity;
            });
            total = total.toFixed(2);
            AfficherTotal.textContent = total + " MAD";
            return total;
        }
        function addToCart(produit) {
            let item = {
                id: +produit.getAttribute('data-produit-id'),
                label: produit.getAttribute('data-produit-label'),
                prix: +produit.getAttribute('data-produit-prix'),
                image: produit.getAttribute('data-produit-image'),
                quantity: 1,
            }
            if (products.find(p => p.id === item.id)) {
                products = products.map((p) => {
                    if (p.id === item.id) {
                        +p.quantity++;
                    }
                    return p;
                });

            } else {
                products.push(item);
            };
            renderListCommande();
        }
        function renderListCommande() {
            listCommande.innerHTML = products.map((p) => renderCartCard(p.image, p.label, p.quantity, p.id)).join('');
            totalHandler();
            localStorage.setItem('produit', JSON.stringify(products));
        }
        const renderCartCard = (img, label, quantity, id) => {
            let itemCard = `
         <div class="commande">
                <img src="${img}" alt="" loading="lazy" />
                <p>${label}</p>
                <div class="Quantity">
                    <button onclick="decrementQuantity(${id})">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <span id="quantity-value">${quantity}</span>
                    <button onclick="incrementQuantity(${id})">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <button onclick="deleteCommande(${id})" class="deleteCommande">
                    <i class="fa-solid fa-trash deleteCommande"></i>
                </button>
            </div>`;
            return itemCard;
        }
        const incrementQuantity = (id) => {
            products = products.map((p) => {
                if (p.id === id) {
                    p.quantity++;
                }
                return p;
            });
            renderListCommande();
        }

        const decrementQuantity = (id) => {
            products = products.map((p) => {
                if (p.id === id && p.quantity > 1) {
                    p.quantity--;
                }
                return p;
            });
            renderListCommande();
        }
        const deleteCommande = (id) => {
            products = products.filter((p) => p.id !== id);
            renderListCommande();
        }
        renderListCommande();
    </script>
</body>

</html>
