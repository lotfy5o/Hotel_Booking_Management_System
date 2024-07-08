<!DOCTYPE html>
<html lang="en">


@include('front.partials.head')


<body>

    {{-- linkes start --}}
    @include('front.partials.linkes')
    {{-- linkes end --}}

    {{-- navbar start --}}
    @include('front.partials.navbar')
    {{-- navbar end --}}


    @yield('content')



    @include('front.partials.footer')




    {{-- Scripts --}}
    @include('front.partials.scripts')




</body>

</html>
