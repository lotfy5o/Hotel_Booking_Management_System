<section class="ftco-section bg-light">
    <div class="container">
        <div class="row no-gutters">
            {{-- Hero 02 --}}
            <div class="col-md-6 wrap-about">
                <div class="img img-2 mb-4"
                    style="background-image: url({{asset('assets-front')}}/images/image_2.jpg);">
                </div>
                <h2>The most recommended vacation rental</h2>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                    is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the
                    all-powerful Pointing has no control about the blind texts it is an almost unorthographic life
                    One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the
                    far World of Grammar.</p>
            </div>

            {{-- Services --}}
            @include('front.partials.amenities')
        </div>
    </div>
</section>
