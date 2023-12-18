<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
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
                <select class="form-select" wire:model="jenis_surat">
                    <option value="masuk">Surat Masuk</option>
                    <option value="keluar">Surat Keluar</option>
                    <option value="tugas">Surat Tugas</option>
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun</label>
                        <input type="text" class="form-control" wire:model="tahun" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" wire:model="nomor_surat" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Perihal</label>
              <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="card-footer text-end {{ $searchForm ? "" : "d-none" }}">
            <a wire:click="search" class="btn btn-primary" role="button">Cari Surat</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai Kegiatan</label>
                <input type="date"
                  class="form-control" name="tanggal_mulai" id="tanggal_mulai" aria-describedby="helpId" placeholder="Tanggal mulai kegiatan">
            </div>
        </div>
    </div>

</div>
