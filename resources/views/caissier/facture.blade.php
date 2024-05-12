<x-agent.caissier.caissierMaster title="Facture">
    @if (session()->has('success'))
        <x-alert>
            {!! session('success') !!}
        </x-alert>
    @endif
    <a href="{{ url()->previous() }}" title="Retour à l'accueil" class="d-block mb-3 fs-5 d-print-none">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    <i class="fa-solid fa-print float-end fs-4 d-print-none" style='cursor:pointer;' onclick="print()"></i>
    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block ">
                                                        <h2>Merci pour votre visite</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Commande N° :
                                                                        <strong>#{{ $commandeStatus->commande->id }}</strong>
                                                                        <br />
                                                                        Votre serveur :
                                                                        <strong>{{ $commandeStatus->serveur->employe->name }}</strong>
                                                                        <br>
                                                                        Date :
                                                                        <strong>{{ $commandeStatus->commande->created_at->format('d/m/Y H:i') }}</strong>
                                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                @foreach ($commandeStatus->commande->produit_commandes as $produit)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $produit->produit->label }}
                                                                            x
                                                                            {{ $produit->quantite }}
                                                                        </td>
                                                                        <td class="alignright">
                                                                            {{ $produit->produit->prix * $produit->quantite }}
                                                                            MAD
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr class="total">
                                                                    <td class="alignright" width="60%">Total</td>
                                                                    <td class="alignright">
                                                                        {{ $commandeStatus->commande->total }} MAD</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block fw-bold">
                                        Restaurant Gustaria "Group khaliha 3ala lah"
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    </td>
    <td></td>
    </tr>
    </tbody>
    </table>
</x-agent.caissier.caissierMaster>
