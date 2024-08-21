<section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">

        <div class="row no-gutters">
            @forelse ($rooms as $room )
            <div class="col-lg-6">
                <div class="room-wrap d-md-flex">
                    <a href="#" class="img"
                        style="background-image: url({{asset('assets-front')}}/images/room-1.jpg);"></a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 p-xl-5 text-center">

                            <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span></p>
                            <p class="mb-0"><span class="price mr-1">${{ $room->price }}</span> <span class="per">per
                                    night</span>
                            </p>
                            <h3 class="mb-3"><a href="rooms.html">{{ $room->name }}</a></h3>
                            <ul class="list-accomodation">
                                <li><span>Max:</span> {{ $room->num_persons }}</li>
                                <li><span>Size:</span> {{ $room->size }} m2</li>
                                <li><span>View:</span> {{ $room->view }}</li>
                                <li><span>Bed:</span> {{ $room->num_beds }}</li>
                            </ul>
                            <p class="pt-1"><a href="{{ route('front.roomDetail', ['room' => $room]) }}"
                                    class="btn-custom px-3 py-2">View
                                    Room
                                    Details <span class="icon-long-arrow-right"></span></a></p>

                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</section>
