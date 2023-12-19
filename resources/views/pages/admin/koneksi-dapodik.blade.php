<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Koneksi Dapodik</h4>
                    <div class="mb-3">
                        <input type="text" class="form-control" wire:model="ip_app" aria-describedby="helpId" placeholder="Alamat IP Aplikasi">
                        <small class="text-danger">@error('ip_app') {{ $message }} @enderror</small>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" wire:model="ip_dapodik" aria-describedby="helpId" placeholder="Alamat IP Dapodik">
                        <small class="text-danger">@error('ip_app') {{ $message }} @enderror</small>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" wire:model="key" aria-describedby="helpId" placeholder="Key Dapodik">
                        <small class="text-danger">@error('key') {{ $message }} @enderror</small>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" wire:model="npsn" aria-describedby="helpId" placeholder="NPSN">
                        <small class="text-danger">@error('npsn') {{ $message }} @enderror</small>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a class="btn btn-primary btn-sm" role="button" wire:click="simpan">Simpan</a>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
