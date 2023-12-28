<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="table-responsive">
        <table class="table table-primary table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kegiatan</th>
                    <th class="text-center">Mulai</th>
                    <th class="text-center">Selesai</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $key => $agenda)
                <tr class="">
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $agenda->activity }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($agenda->start_date)->format("d/m/Y") }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($agenda->end_date)->format("d/m/Y") }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-info" href="#" role="button">
                            <i class="bx bx-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
