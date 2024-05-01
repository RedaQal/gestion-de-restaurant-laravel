<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/Gustaria.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Commander</title>
</head>

<body>
    <div class="container mt-4">
        <div class="bg__restaurant"></div>
        <div class="row d-flex flex-wrap mt-2">
            <div class="col-8">
                <div class="bg-white rounded p-4">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index.index') }}" class="btn btn-sm border"><i class="fa-solid fa-arrow-left"
                                style="color:#ff9500;"></i></a>
                        <h3 class="text-center ms-5">Menu</h3>
                    </div>

                    <hr>
                    <div class="overflow-y-scroll overflow-x-hidden" style="height: 34rem;">
                        <div class="row">
                            @foreach ($produits as $produit)
                                <x-commandeCard :produit="$produit" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="m-0">Votre commande</h2>
                    </div>
                    <div class="card-body">
                        <ul id="orderSummary" class="list-group mb-3">
                            <li class="list-group-item">Vous n'avez pas encore sélectionné d'articles.</li>
                        </ul>
                        <div class="mb-3">
                            <h4 class="m-0">Total: <span id="totalPrice">MAD</span></h4>
                        </div>
                        <button class="btn btn-primary btn-block">Passer la commande</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
