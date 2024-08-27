<div class="wrap">
    {{-- @dump($settings) --}}
    <div class="container">
        <div class="row justify-content-between">
            <div class="col d-flex align-items-center">
                <p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">{{ $settings->phone }}</a> or
                    <span class="mailus">email us:</span> <a href="#">{{ $settings->email }}</a>
                </p>
            </div>
            <div class="col d-flex justify-content-end">
                <div class="social-media">
                    <p class="mb-0 d-flex">

                        @if($settings->facebook)
                        <a href="{{ url($settings->facebook) }}"
                            class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i
                                    class="sr-only">Facebook</i></span></a>
                        @endif

                        @if($settings->twitter)
                        <a href="{{ url($settings->twitter) }}"
                            class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i
                                    class="sr-only">Twitter</i></span></a>
                        @endif

                        @if($settings->instagram)
                        <a href="{{ url($settings->instagram) }}"
                            class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i
                                    class="sr-only">Instagram</i></span></a>
                        @endif

                        @if($settings->dribbble)
                        <a href="{{ url($settings->dribbble) }}"
                            class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i
                                    class="sr-only">Dribbble</i></span></a>
                        @endif

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
