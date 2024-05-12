<x-agent.serveur.serveurMaster title="Mes commandes">
    @if (session()->has('success'))
    <x-alert>
        {!! session('success') !!}
    </x-alert>
    @endif
    <div class="container">
        <h6 class="upcomming">Mes commandes</h6>
        @if (count($commandes) == 0)
            <h6 class="text-center mt-5 border p-3">Aucune Commande</h6>
        @else
        <div class="table-responsive-md mt-3">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Table</th>
                        <th>Nom de client</th>
                        <th>Prix Total (MAD)</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{ $commande->commande->client->table_num }}</td>
                            <td>
                                @if (!$commande->commande->client->name)
                                    Anonyme
                                @else
                                    {{ $commande->commande->client->name }}
                                @endif
                            </td>
                            <td>{{ $commande->commande->total }}</td>
                            <td>
                                @if ($commande->status == 'valide')
                                <span class="badge bg-success fw-bold">{{ $commande->status }}</span>
                                @endif
                                @if ($commande->status == 'preparer')
                                <span class="badge bg-secondary fw-bold">{{ $commande->status }} ...</span>
                                @endif
                                @if ($commande->status == 'a servir')
                                <span class="badge bg-danger fw-bold">{{ $commande->status }} <i class="fa-solid fa-exclamation"></i></span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('serveur.show', $commande->id_commande) }}"
                                    class="btn btn-secondary btn-just-icon btn-sm" title='Détails'>
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                @if ($commande->status == 'a servir')
                                <form action="{{ route('serveur.serve', $commande->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"class="btn btn-primary btn-just-icon btn-sm" title='serve'>
                                    <i class="fa-solid fa-check"></i>
                                </form>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="commande{{ $commande->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Etes-vous sur de vouloir supprimer cette commande ?</p>
                                        <form method="POST" action="{{ route('serveur.destroy', $commande->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                Supprimer
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</x-agent.serveur.serveurMaster>
