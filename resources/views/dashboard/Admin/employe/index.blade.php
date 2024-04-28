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
