<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="card">
        <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between">
            <div wire:click="toggleSearch" style="cursor: pointer;">Dasar Kegiatan [Pencarian]</div>
            <a class="btn btn-warning btn-sm" wire:click="toggleSearch" role="button">
                <i class="bi bi-arrow-down"></i>
            </a>
        </div>
        <div class="card-body p-4 {{ $searchForm ? "" : "d-none" }}">
            <div class="mb-3">
                <label for="" class="form-label">Pilih Jenis Surat
                    <i class="text-danger">*</i>
                </label>
                <select class="form-select" wire:model="jenisSurat">
                    <option value="masuk">Surat Masuk</option>
                    <option value="keluar">Surat Keluar</option>
                    <option value="tugas">Surat Tugas</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun</label>
                        <input type="text" class="form-control" wire:model="tahun" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" wire:model="nomor_surat" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Perihal</label>
              <input type="text" class="form-control" wire:model="perihal" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="card-footer text-end {{ $searchForm ? "" : "d-none" }}">
            <a wire:click="search" class="btn btn-primary" role="button">Cari Surat</a>
        </div>
    </div>
    @if ($suratMasukFound != null)
        <div class="card">
            <div class="card-body p-2">
                <ul class="list-group">
                    @foreach ($suratMasukFound as $suratMasuk)
                        <li wire:click="konfirmasiPilih('{{ $suratMasuk->id }}')" class="list-group-item list-group-item-action" style="cursor: pointer;">[{{ $suratMasuk->tahun }}][{{ $suratMasuk->nomor_agenda }}]&nbsp;{{ $suratMasuk->perihal }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@push('scripts')
    <script>
        window.addEventListener('konfirmasi-pilih', event => {
            Swal.fire({
                title: 'Konfirmasi Pilih',
                icon: 'info',
                html: event.detail.object,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan !',
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // alert(JSON.stringify());
                    Livewire.dispatch('surat-terpilih', {suratId: event.detail[0].id});
                }
            })
        });
    </script>
@endpush
