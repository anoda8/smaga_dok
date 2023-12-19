<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="mb-3">
        <livewire:components.form.tombol-sinkronisasi :level="$level"/>
    </div>
    <div class="table-responsive">
        <table class="table table-info table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr class="">
                        <td scope="row">R1C1</td>
                        <td>{{ $user->name }}</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
