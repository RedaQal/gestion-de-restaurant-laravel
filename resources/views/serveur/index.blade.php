<x-agent.master>
    <div class="container">
        <h6 class="upcomming">Tous les commandes</h6>
        <div class="table-responsive mt-3">
            <table class="table border">
                <thead>
                    <tr>
                        <th>Table</th>
                        <th>Prix Total (MAD)</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->table_num }}</td>
                        <td class="text-right">{{ $commande->total }}</td>
                        <td class="td-actions text-right">
                            <button type="button" class="btn btn-secondary btn-just-icon btn-sm">
                            <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-just-icon btn-sm">
                            <i class="fa-solid fa-check"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-just-icon btn-sm">
                            <i class="fa-solid fa-xmark"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-agent.master>
