<x-dashbordComponents.Admin.master title="Liste des plats">
    <div class="w-75 m-auto mt-5">
        <table class="table table-hover table-bordered shadow text-center">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">label</th>
                    <th scope="col">prix</th>
                    <th scope="col">description</th>
                    <th scope="col">categorie</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>tajin</td>
                    <td>50dh</td>
                    <td>tajin belbr9o9 w lmchmach dakchi bniin</td>
                    <td>ghda</td>
                    <td>
                        <a href="" type="button" class="btn btn-success"><i
                                class="fa-solid fa-pen-to-square"></i> </a>
                        <a href="" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
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
