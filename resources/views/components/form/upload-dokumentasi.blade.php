<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card" style="visibility: {{ $savedId == null ? "hidden" : "visible" }};">
        <div class="card-header bg-info fw-bold text-dark d-flex justify-content-between">
            <div>
                Unggah Foto
            </div>
            <a wire:click="$refresh" class="btn btn-primary" role="button">
                Refresh
            </a>
        </div>
        <div class="card-body pt-4">
            <div class="row">
                <div class="col">
                    <strong>Nama Kegiatan : </strong> <span>{{ $activity->activity }}</span>
                </div>
            </div>
            <hr>
            <form wire:ignore method="post" action="{{url('/admin/upload-dokumentasi')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                <input type="hidden" name="folder" id="folder" value="{{ $activity->uuid }}">
                @csrf
            </form>
        </div>
    </div>
    <div class="{{ $showPublikasi == true ? "" : "d-none" }}">
        {{-- <livewire:components.form.publikasi :uuid="$activity->uuid" /> --}}
        <livewire:components.form.atur-foto-dokumentasi :uuid="$activity->uuid" :activityId="$activity->id" />
    </div>
    <div class="card">
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" wire:click="togglePublikasi" role="button">Lanjut Publikasi <i class="bx bxs-plane-take-off"></i></a>
            <a class="btn btn-success" wire:click="simpanDokumentasi" role="button">Selesai <i class="bx bx-like"></i></a>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    Dropzone.options.dropzone =
    {
        dictDefaultMessage: "Tekan untuk mengunggah file, atau geser file disini.",
        maxFilesize: 12,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        // addRemoveLinks: true,
        timeout: 5000,
        success:function(file, response){
            // console.log(response.success);
            Livewire.dispatch('reload-file-list');
            file.previewElement.querySelector('[data-dz-name]').innerHTML = response.success;
        },
        removedfile:function(file){
            var filename = file.previewElement.querySelector('[data-dz-name]').innerHTML;
            Livewire.dispatch('hapus-foto', {namaFile: filename});
            file.previewElement.remove();
            this.element.querySelector('.dz-message > .dz-button').innerHTML = "Klik atau geser file kesini";
        },
    };


</script>
@endpush
