<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form method="POST" wire:submit="simpan">
        <div class="card">
            <div class="card-header bg-primary text-white fw-bold">
                Publikasi Kegiatan {{ $activity->activity }}
            </div>
            <div class="card-body pt-2">
                <div class="mb-3">
                <label for="" class="form-label">Judul Posting</label>
                <input type="text" class="form-control" wire:model="title" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3" wire:ignore>
                    <label for="" class="form-label">Narasi</label>
                    <textarea class="form-control editor" id="editor" wire:model="content" rows="5"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if ($fotoSampul != null)
                            <img src="{{ asset('temp-dokumentasi/'.$activity->uuid.'/'.$fotoSampul->photo_url) }}" alt="Gambar Sampul" class="img-fluid img-thumbnail">
                        @endif
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked style="cursor: pointer;">
                            <label class="form-check-label" for="flexSwitchCheckChecked" style="cursor: pointer;">Izinkan Komentar</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary" role="button">Simpan & Posting</button>
            </div>
        </div>
    </form>
</div>
@push('styles')
<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 200px;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('content', editor.getData());
            })
        })
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
