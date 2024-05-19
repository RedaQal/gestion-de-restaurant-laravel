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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Commander</title>
</head>

<body>
    <div class="containerCo">
        <div class="menuCo">
            <div class="header">
                <div class="logo">
                    <img src="{{ asset('images/Gustaria.png') }}" alt="logo" />
                </div>
                <div class="search">
                    <form action="{{ route('commande.index') }}" method="get">
                        <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        @csrf
                        @method('get')
                        <input type="text" name="search" placeholder="Rechercher un plat"
                            value="{{ $search }}" />
                    </form>
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
                <p class="m-0">Nous somme à</p>
                <p class="m-0 text-center">Oujda</p>
                <span>NOUS ATTENDONS VOTRE VISITE</span>
            </div>
            <div class="categories">
                @foreach ($categories as $category)
                    <a class="categorie" href="#{{ $category->label }}">
                        <img src="{{ asset($category->img->url) }}" alt="plat" />
                        <p>{{ Str::ucfirst($category->label) }}</p>
                    </a>
                @endforeach
            </div>
            <div class="alert__commande">
                <i class="fa-solid fa-utensils"></i>
                <p class="m-0">Nous proposons les meilleurs types de nourriture .</p>
            </div>
            <div class="food">
                @if (count($produits) == 0)
                    <h6 class="text-center mt-5 border p-3">Aucun Produit</h6>
                @else
                    @foreach ($categories_search as $categorie)
                        <h1 id="{{ $categorie->label }}">{{ Str::ucfirst($categorie->label) }}
                        </h1>
                        <div class="categoriesFood">
                            @if (!count($produits->where('id_categorie', $categorie->id)))
                                <p class="aucunProduit"><i class="fa-solid fa-circle-exclamation"></i> Aucun produit
                                    pour
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
                @endif
            </div>
        </div>

        <div class="commandes">
            <div class="CommandeHeader">
                <i class="fa-solid fa-cart-shopping"></i>
                <h1>Votre Commande</h1>
            </div>
            <h5>Liste des commandes :</h5>
            <div class="listCommande" id="listCommande">
            </div>
            <div class="addCommande">
                <div class="total">
                    <span>TOTAL :</span>
                    <span id="total">0</span>
                </div>
                <button id="passerCommande" onclick="passerCommande()" data-bs-toggle="modal">PASSER LA
                    COMMANDE</button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="client" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" ">Infomation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="client-form">
                        <small class="text-secondary">(champ Nom et Téléphone est facultatif)</small>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nom et prénom :</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom" />
                            </div>
                            <div class="col-6">
                                <label for="tel" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" name="tel" placeholder="+212 XXXXXXXXX"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Numéro table</label>
                            <input type="text" class="form-control" name="table_num" id="n_table" placeholder="Entrer le numéro de la table" />
                        </div>
                        <button type="submit" class="btn btn-success">Commande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
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
            listCommande.innerHTML = products.map((p) => renderCartcard(p.image, p.label, p.quantity, p.id)).join('');
            totalHandler();
            localStorage.setItem('produit', JSON.stringify(products));
        }
        const renderCartcard = (img, label, quantity, id) => {
            let itemcard = `
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
            return itemcard;
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

        function passerCommande() {
            if (!products.length) {
                Swal.fire({
                    icon: "error",
                    title: "Veuillez ajouter au moins un produit",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            } else {
                $('#client').modal('show');
            }
        }

        function getClient() {
            const client = {};
            const form = document.getElementById('client-form');
            const inputs = form.querySelectorAll('input');
            inputs.forEach((input) => {
                client[input.name] = input.value;
            });
            form.reset();
            return client;
        }

        function sendCommande(e) {
            e.preventDefault();
            const n_table = document.getElementById('n_table');
            if (/\d+/.test(n_table.value)) {
                n_table.classList.remove('is-invalid')
                fetch("{{ route('commande.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        products,
                        client: getClient()
                    })
                }).then(res => res.json()).then(total => {
                    console.log(total)
                    products = [];
                    localStorage.clear();
                    renderListCommande();
                    $('#client').modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: "Votre commande est passé avec succés",
                        showConfirmButton: false,
                        showCloseButton: true,
                    });
                });
            } else {
                n_table.classList.add('is-invalid')
            }
        }
        document.getElementById('client-form').addEventListener('submit', sendCommande)
    </script>
</body>

</html>
