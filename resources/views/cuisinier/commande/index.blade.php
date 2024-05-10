<x-agent.cuisinier.cuisinierMaster title="Commandes">
    @if (session()->has('success'))
        <x-alert>
            {!! session('success') !!}
        </x-alert>
    @endif
    <h6 class="upcomming">Commandes</h6>
    @if (count($commandes) == 0)
        <h6 class="text-center mt-5 border p-3">Aucune Commande</h6>
    @endif
    @foreach ($commandes as $com)
        <div class="container mt-3 mx-auto">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 content-card">
                    <div class="card-big-shadow w-75 mx-auto">
                        <div class="card card-just-text">
                            <form action="{{ route('cuisinier.preparer', $com->id) }}" method="POST"
                                class="position-absolute end-0  mt-3 me-3">
                                @csrf
                                @method('POST')
                                <button class="btn btn-success btn-just-icon" title='Validé'>
                                    <i class="fa-solid fa-play"></i>
                                </button>
                            </form>
                            <div class="content">
                                <h4 class="category mb-3 fw-bold">
                                    Commande N°: {{ $com->commande->id }} / Table:
                                    {{ $com->commande->client->table_num }}
                                </h4>
                                <ul class="list-group">
                                    @foreach ($com->commande->produit_commandes as $comProduit)
                                        <li class="list-group-item">
                                            <span>{{ Str::ucfirst($comProduit->produit->label) }}</span>
                                            <span class="badge" style="background-color: #0e2238;">
                                                X {{ $comProduit->quantite }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-agent.cuisinier.cuisinierMaster>
