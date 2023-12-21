<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Detail Kegiatan
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Surat</label>
                        <input disabled type="text" class="form-control" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Surat</label>
                        <input disabled type="text" class="form-control" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Perihal</label>
                <input disabled type="text" class="form-control" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai Kegiatan</label>
                <input type="date"
                  class="form-control" name="tanggal_mulai" id="tanggal_mulai" aria-describedby="helpId" placeholder="Tanggal mulai kegiatan">
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Selesai Kegiatan</label>
                <input type="date"
                  class="form-control" name="tanggal_mulai" id="tanggal_mulai" aria-describedby="helpId" placeholder="Tanggal mulai kegiatan">
            </div>
        </div>
        <div class="card-footer text-end">
            <a name="" id="" class="btn btn-info" href="#" role="button">
                <i class="bx bx-plus"></i>
                Dokumentasi
            </a>
            <a name="" id="" class="btn btn-success" href="#" role="button">
                <i class="bx bx-plus"></i>
                Publikasi
            </a>
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
@push('scripts')
<script>
    document.addEventListener('surat-terpilih', event => {
        alert(event);
    });
</script>
@endpush
