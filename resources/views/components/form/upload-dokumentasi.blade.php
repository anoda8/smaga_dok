<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card" style="visibility: {{ $savedId == null ? "hidden" : "visible" }};">
        <div class="card-header bg-info fw-bold text-dark">
            Unggah Foto
            <input type="hidden" name="folder_s" id="folder_s" value="{{ $savedId }}">
        </div>
        <div class="card-body pt-4">
            <form wire:ignore method="post" action="{{url('/admin/upload-dokumentasi')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                <input type="hidden" name="folder" id="folder" value="{{ $savedId }}">
                @csrf
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    console.log(document.getElementById('folder_s').value);
    Dropzone.options.dropzone =
    {
        dictDefaultMessage: "Klik atau geser file kesini",
        maxFilesize: 12,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 5000,
        success:function(file, response){
            console.log(response.success);
            file.previewElement.querySelector('[data-dz-name]').innerHTML = response.success;
        },

        removedfile:function(file){
            var filename = file.previewElement.querySelector('[data-dz-name]').innerHTML;
            Livewire.dispatch('hapus-foto', {namaFile: filename});
            file.previewElement.remove();
            this.element.querySelector('.dz-message > .dz-button').innerHTML = "Klik atau geser file kesini";
        }
    };
</script>
@endpush
