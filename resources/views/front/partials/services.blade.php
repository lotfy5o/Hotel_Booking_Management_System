<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @forelse ($services as $service )
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img"
                        style="background-image: url({{ asset('storage') }}/services/{{ $service->image }});">
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            @empty

            @endforelse


        </div>
    </div>
</section>
