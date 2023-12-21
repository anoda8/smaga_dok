<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <form wire:submit.prevent="simpan"></form>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Detail Kegiatan
        </div>
        <div class="card-body p-4">
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
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Mulai Kegiatan</label>
                <input type="date" wire:model="startDate" class="form-control" name="tanggal_mulai" id="tanggal_mulai" aria-describedby="helpId" placeholder="Tanggal mulai kegiatan">
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Selesai Kegiatan</label>
                <input type="date" wire:model="endDate" class="form-control" name="tanggal_mulai" id="tanggal_mulai" aria-describedby="helpId" placeholder="Tanggal mulai kegiatan">
            </div>
        </div>
        <div class="card-footer text-end">
            @if ($savedId != null)
                <a name="" id="" class="btn btn-info" href="#" role="button">
                    <i class="bx bx-plus"></i>
                    Dokumentasi
                </a>
                <a name="" id="" class="btn btn-success" href="#" role="button">
                    <i class="bx bx-plus"></i>
                    Publikasi
                </a>
            @else
                <a name="" id="" class="btn btn-primary" href="#" role="button">
                    <i class="bx bx-save"></i>
                    Simpan
                </a>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-info text-dark">
            Dokumentasi
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-success text-white">
            Publikasi
        </div>
    </div>
</div>
