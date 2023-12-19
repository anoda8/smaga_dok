<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <a wire:click="sync" class="btn btn-{{ $color }}" wire:loading.class="disabled"  role="button">
        <i class="bx bx-sync"></i>
        Sinkronisasi Dapodik user {{ ucwords($level) }}
    </a>
</div>
