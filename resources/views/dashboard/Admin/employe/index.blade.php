<x-Admin.master title="Liste des employes">
    <h6 class="upcomming">Liste des Employes</h6>
    <div class="w-75 m-auto mt-5">
        @if (session()->has('success'))
            <x-alert>
                {!! session('success') !!}
            </x-alert>
        @endif
        <div class="table-responsive-lg">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Salaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                        <tr>
                            <td>{{ Str::ucfirst($employe->name) }}</td>
                            <td>{{ Str::ucfirst($employe->role) }}</td>
                            <td>{{ $employe->email }}</td>
                            <td>{{ $employe->tel }}</td>
                            <td>{{ $employe->salaire }}</td>
                            <td>
                                <a href="{{ route('dashboard.employe.edit', $employe->id) }}" type="button"
                                    class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $employe->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal{{ $employe->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        vous êtes sur de vouloir supprimer <strong>{{ $employe->name }} </strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('dashboard.employe.destroy', $employe->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                "oLanguage": {
                    "sLengthMenu": " _MENU_ Enregistrements par page",
                    "sZeroRecords": "Aucun personnel compatible avec la recherche",
                    "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                    "sInfoEmpty": "Affichage de 0 à 0 sur 0 enregistrements",
                    "sInfoFiltered": "(filtré à partir de _MAX_ enregistrements totaux)"
                }
            });
        })
    </script>
</x-Admin.master>
