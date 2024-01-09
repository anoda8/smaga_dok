<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="card">
        <div class="card-header">
            Manajemen Gambar {{ $activityId }}
        </div>
        <div class="card-body">
            @foreach ($activity->galleries->split(3) as $photos)
                <div class="row mt-3 mb-3">
                    @foreach ($photos as $photo)
                    <div class="col-sm-12 col-md-3">
                        <div class="img-thumbnail" style="min-height:200px;">
                            <img src="/temp-dokumentasi/{{ $activity->uuid }}/{{ $photo->photo_url }}" class="img-fluid">
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

</div>

