<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-header bg-warning text-dark fw-bold">
            Foto Terupload
        </div>
        <div class="card-body">
            @if ($fileList != null)
            <div class="row align-items-start">
                @foreach ($fileList as $file)
                    @if (strlen($file) > 5)
                    <div class="p-2 mt-2 me-md-2 {{ $file == $fotoSampul ? "bg-warning" : "bg-secondary" }} text-center col-md-2 col-sm-6" style="cursor: pointer;" wire:click="previewFoto('{{ $file }}')" data-bs-toggle="modal" data-bs-target="#modalMenu">
                        <img src="{{ asset('temp-dokumentasi/'.$uuid.'/'.$file) }}" style="max-height: 150px;max-width:150px;" alt="">
                        {{-- <img src="{{ asset('temp-dokumentasi/'.$uuid.'/'.$file) }}" class="img-fluid img-thumbnail" alt=""> --}}
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div wire:ignore.self class="modal fade" id="modalMenu" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalMenu" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    @if ($fotoTerpilih != null)
                    <img src="{{ asset('temp-dokumentasi/'.$uuid.'/'.$fotoTerpilih) }}" class="img-fluid" alt="">
                    @endif
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-sm btn-primary" wire:click="$dispatch('foto-sampul-dipilih', {fotoFile: '{{ $fotoTerpilih }}'})">Foto Sampul</button>
                    <div>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-window-close"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger">
                            <i class="bx bx-trash" wire:click="hapusFoto"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('foto-terhapus', () => {
            const closeButton = document.getElementById("modalMenu").querySelector('[data-bs-dismiss="modal"]');
            if (closeButton) {
                closeButton.click();
            }
        });
    </script>
@endpush
