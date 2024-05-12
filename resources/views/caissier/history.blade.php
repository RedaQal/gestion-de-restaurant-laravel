<x-agent.caissier.caissierMaster title="Valider payement">
    <div class="w-75 m-auto mt-5">
        @if (session()->has('success'))
            <x-alert>
                {!! session('success') !!}
            </x-alert>
        @endif
        @if (count($commandes) == 0)
            <h6 class="text-center mt-5 border p-3">Aucune Commande</h6>
        @else
            <div class="table-responsive-lg">
                <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Table</th>
                            <th>Commande N</th>
                            <th>Total prix (MAD)</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandes as $commande)
                            <tr>
                                <td>{{ $commande->commande->client->table_num }}</td>
                                <td>{{ $commande->commande->id }}</td>
                                <td>{{ $commande->commande->total }}</td>
                                <td>{{ $commande->created_at->format("d/m/Y H:i") }}</td>
                                <td class="text-center">
                                    <a href="{{ route('caissier.show', $commande->commande->id) }}"
                                        class="btn btn-primary btn-sm" title="Facturer">
                                        <i class="fa-solid fa-receipt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.jqueryui.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                "oLanguage": {
                    "sLengthMenu": " _MENU_ Enregistrements par page",
                    "sZeroRecords": "Aucun commande compatible avec la recherche",
                    "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                    "sInfoEmpty": "Affichage de 0 à 0 sur 0 enregistrements",
                    "sInfoFiltered": "(filtré à partir de _MAX_ enregistrements totaux)"
                }
            });
        })
    </script>
</x-agent.caissier.caissierMaster>
