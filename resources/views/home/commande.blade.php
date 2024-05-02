<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/CommandeStyle.css') }}" />
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
                <a class="categorie" href="#sandwiches">
                    <img src="images/sandwich.png" alt="plat" />
                    <p>Sandwich</p>
                </a>
                <a class="categorie" href="#plats">
                    <img src="images/plat.png" alt="plat" />
                    <p>PLats</p>
                </a>
                <a class="categorie" href="#deserts">
                    <img src="images/desert.png" alt="plat" />
                    <p>Desert</p>
                </a>
                <a class="categorie" href="#boissons">
                    <img src="images/boisson.png" alt="plat" />
                    <p>Boissons</p>
                </a>
                <a class="categorie" href="#soups">
                    <img src="images/soupe.png" alt="plat" />
                    <p>Soups</p>
                </a>
                <a class="categorie" href="#salads">
                    <img src="images/salade.png" alt="plat" />
                    <p>Salads</p>
                </a>
            </div>
            <div class="alert">
                <i class="fa-solid fa-utensils"></i>
                <p>Nous proposons les meilleurs types de nourriture .</p>
            </div>
            <div class="food">
                <h1 id="sandwiches">Sandwiches</h1>
                <div class="categoriesFood">

                </div>
                <h1 id="plats">Plats</h1>
                <div class="categoriesFood">

                </div>
                <h1 id="deserts">Deserts</h1>
                <div class="categoriesFood">

                </div>
                <h1 id="boissons">Boissons</h1>
                <div class="categoriesFood">

                </div>
                <h1 id="soups">Soups</h1>
                <div class="categoriesFood">

                </div>
                <h1 id="salads">Salads</h1>
                <div class="categoriesFood">

                </div>
            </div>
        </div>

        <div class="commandes">
            <div class="CommandeHeader">
                <i class="fa-solid fa-cart-shopping"></i>
                <h1>Votre Commande</h1>
            </div>
            <h3>List des commandes :</h3>
            <div class="listCommande">
            </div>
            <div class="addCommande">
                <div class="total">
                    <span>TOTAL :</span>
                    <span>200 dh</span>
                </div>
                <button>PASSER LA COMMANDE</button>
            </div>
        </div>
    </div>

    <script>
        const infoHover = document.querySelector(".infoHover");
        const info = document.querySelector(".fa-location-dot");
        info.addEventListener("mouseover", () => {
            infoHover.style.display = "block";
        });
        info.addEventListener("mouseout", () => {
            infoHover.style.display = "none";
        });
    </script>
</body>

</html>
