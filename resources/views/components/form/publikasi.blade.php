<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-header bg-primary text-white fw-bold">
            Publikasi Kegiatan {{ $activity->activity }}
        </div>
        <div class="card-body pt-2">
            <div class="mb-3">
              <label for="" class="form-label">Judul Posting</label>
              <input type="text" class="form-control" wire:model="title" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Narasi</label>
              <textarea class="form-control" wire:model="content" rows="3"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">

                </div>
                <div class="col-md-6 col-sm-12"></div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/s5h0m76l17kvvailfjlgrjsp12uyipgnlht6j02lanm1lkdq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
    </script>
@endpush
