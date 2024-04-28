<x-dashbordComponents.Admin.master title="Liste des employes">
    <div class="w-75 m-auto mt-5">
        <table class="table table-hover table-bordered shadow text-center">
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
                        <td>{{ $employe->name }}</td>
                        <td>{{ $employe->role }}</td>
                        <td>{{ $employe->email }}</td>
                        <td>{{ $employe->tel }}</td>
                        <td>{{ $employe->salaire }}</td>
                        <td>
                            <a href="" type="button" class="btn btn-success"><i
                                    class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            {{ $employes->links('pagination::bootstrap-4') }}
        </div>
    </div>

</x-dashbordComponents.Admin.master>
