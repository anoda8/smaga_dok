<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="mb-3">
        <livewire:components.form.tombol-sinkronisasi :level="$level"/>
    </div>
    <div class="card">
        <div class="card-body pt-3">
            <div class="table-responsive">
                {{ $users->links('livewire::bootstrap') }}
                <table class="table table-info table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="">
                                <td class="text-center">{{ ($users ->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td class="text-center">{{ $user->username }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    <a name="" id="" class="btn btn-info btn-sm" href="#" role="button">Reset</a>
                                </td>
                                <td class="text-center">
                                    <a wire:click="hapus('{{ $user->id }}')" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
