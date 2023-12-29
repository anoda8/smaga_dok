<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <a class="btn btn-sm btn-primary" role="button" href="{{ route('admin.tambah-agenda-kegiatan') }}" wire:navigate>
        <i class="bx bx-plus"></i>&nbsp;
        Tambah Kegiatan
    </a>
    <hr>
    <div class="table-responsive">
        <table class="table table-primary table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kegiatan</th>
                    <th class="text-center d-none d-md-table-cell">Mulai</th>
                    <th class="text-center d-none d-md-table-cell">Selesai</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $key => $agenda)
                <tr class="">
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $agenda->activity }}</td>
                    <td class="text-center d-none d-md-table-cell">{{ \Carbon\Carbon::parse($agenda->start_date)->format("d/m/Y") }}</td>
                    <td class="text-center d-none d-md-table-cell">{{ \Carbon\Carbon::parse($agenda->end_date)->format("d/m/Y") }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-info" href="{{ route('admin.detail-agenda', $agenda->id) }}" role="button">
                            <i class="bx bx-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
