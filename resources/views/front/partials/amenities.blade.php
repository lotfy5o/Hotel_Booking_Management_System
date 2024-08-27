<div class="col-md-6 wrap-about ftco-animate">
    <div class="heading-section">
        <div class="pl-md-5">
            <h2 class="mb-2">What we offer</h2>
        </div>
    </div>
    <div class="pl-md-5">
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
            It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        <div class="row">
            {{-- ==================================================================================== --}}
            @forelse ($amenities as $amenity )
            <div class="services-2 col-lg-6 d-flex w-100">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-{{ $amenity->icon }}"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">{{ $amenity->name }}</h3>
                    <p>{{ $amenity->description }}</p>
                </div>
            </div>
            @empty

            @endforelse


        </div>
    </div>
</div>
