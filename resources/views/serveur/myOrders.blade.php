<x-agent.serveur.serveurMaster title="Mes commandes">
    <div class="container">
        <h6 class="upcomming">Mes commandes</h6>
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
                            <td>{{ $commande->table_num }}</td>
                            <td>
                                @if (!$commande->name)
                                    Anonyme
                                @else
                                    {{ $commande->name }}
                                @endif
                            </td>
                            <td>{{ $commande->total }}</td>
                            <td><span class="badge bg-success fw-bold">{{ $commande->status }}</span></td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('serveur.show', $commande->id_commande) }}"
                                    class="btn btn-secondary btn-just-icon btn-sm" title='Détails'>
                                    <i class="fa-solid fa-eye"></i>
                                </a>
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
    </div>
</x-agent.serveur.serveurMaster>
