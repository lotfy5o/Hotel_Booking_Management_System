<section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">

        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="room-wrap d-md-flex">
                    <a href="#" class="img"
                        style="background-image: url({{asset('assets-front')}}/images/room-1.jpg);"></a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 p-xl-5 text-center">
                            @forelse ($rooms as $room )

                            <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span></p>
                            <!-- <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p> -->
                            <h3 class="mb-3"><a href="rooms.html">{{ $room->name }}</a></h3>
                            <ul class="list-accomodation">
                                <li><span>Max:</span> 3000 Persons</li>
                                <li><span>Size:</span> 45 m2</li>
                                <li><span>View:</span> Sea View</li>
                                <li><span>Bed:</span> 1</li>
                            </ul>
                            <p class="pt-1"><a href="{{ route('front.roomDetail', ['room' => $room]) }}"
                                    class="btn-custom px-3 py-2">View
                                    Room
                                    Details <span class="icon-long-arrow-right"></span></a></p>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
