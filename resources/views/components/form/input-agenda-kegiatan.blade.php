<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <form wire:submit="simpan">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex justify-content-between">
                <div class="fw-bold" wire:click="toggleDetailKegiatan" style="cursor: pointer;">Detail Kegiatan</div>
                <a class="btn btn-warning btn-sm" wire:click="toggleDetailKegiatan" role="button">
                    <i class="bi bi-arrow-down"></i>
                </a>
            </div>
            <div class="card-body p-4 {{ $showDetailKegiatanForm ? "" : "d-none" }}">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Jenis Surat</label>
                            <input disabled type="text" wire:model="jenisSurat" class="form-control" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Tahun - Nomor Surat</label>
                            <input disabled type="text" wire:model="nomorSurat" class="form-control" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Perihal</label>
                    <div class="input-group">
                        <input disabled type="text" wire:model="perihal" class="form-control" aria-describedby="helpId" placeholder="">
                        <a class="btn btn-info" role="button" onclick="window.open('{{ $hyperlink }}', 'popUpWindow', 'height = 600, width = 500, left = 100, top = 100, scrollbars = yes, resizable = yes, menubar = no, toolbar = yes, location = no, directories = no, status = yes')">
                            <i class="bx bx-envelope"></i>
                            Surat
                        </a>
                        <a class="btn btn-warning" role="button">
                            <i class="bx bx-file"></i>&nbsp;
                            Disposisi
                        </a>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nama Kegiatan</label>
                    <input type="text" class="form-control" wire:model="namaKegiatan" aria-describedby="helpId" placeholder="">
                    @error('namaKegiatan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Mulai Kegiatan</label>
                    <input type="date" wire:model.live="startDate" class="form-control" aria-describedby="helpId" placeholder="">
                    @error('startDate') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Selesai Kegiatan</label>
                    <input type="date" wire:model="endDate" class="form-control" aria-describedby="helpId" placeholder="">
                    @error('endDate') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label fw-bold">Kontributor</label>
                    <input type="text" class="form-control" aria-describedby="helpId" placeholder="">
                    @error('endDate') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="card-footer text-end {{ $showDetailKegiatanForm ? "" : "d-none" }}">
                @if ($savedId != null)
                    <a wire:click='toggleDokumentasi' class="btn btn-info" role="button">
                        <i class="bx bx-plus"></i>
                        Dokumentasi
                    </a>
                    <a name="" id="" class="btn btn-success" href="#" role="button">
                        <i class="bx bx-plus"></i>
                        Publikasi
                    </a>
                @endif
            </div>
            <div class="card-footer text-end {{ $showDetailKegiatanForm ? "" : "d-none" }}">
                @if ($savedId != null)
                    <button class="btn btn-danger" type="button" role="button" @click="$dispatch('confirm-delete')">
                        <i class="bx bx-trash"></i>
                        Hapus
                    </button>
                @endif
                <button class="btn btn-primary" type="submit" role="button">
                    <i class="bx bx-save"></i>
                    Simpan
                </button>
            </div>
        </div>
    </form>
    @if ($showDokumentasiForm)
        <livewire:components.form.upload-dokumentasi :savedId="$savedId"/>
    @endif

    {{-- <div class="card">
        <div class="card-header bg-success text-white">
            Publikasi
        </div>
    </div> --}}
</div>
@push('scripts')
<script>
    window.addEventListener('confirm-delete', event => {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: "Apakah anda yakin akan menghapus agenda kegiatan ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus !',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('hapus-agenda-kegiatan');
            }
        })
    });
</script>
@endpush
