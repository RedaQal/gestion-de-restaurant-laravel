<x-dashbordComponents.Admin.master title="Liste des employes">
    <div class="w-75 m-auto mt-5">
        @if (session()->has('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
        @endif
        <table class="table table-hover table-bordered shadow text-center">
            <thead class="table-secondary">
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
                            <a href="{{ route('dashboard.employe.edit', $employe->id) }}" type="button"
                                class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
        <div class="float-end">
            {{ $employes->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <script>
        const agent = document.getElementById("agent");
        const role = document.getElementById('role');
        const post = document.getElementById('post');
        const close = document.getElementById('close');
        const alert = document.getElementById('alert');
        if (close) {
            close.addEventListener('click', () => {
                alert.remove();
            })
            setInterval(() => {
                alert.remove();
            }, 5000);
        }
    </script>

</x-dashbordComponents.Admin.master>
