<!doctype html>
<html lang="en">

@include('back.partials.head')

<body class="vertical  light @if (LaravelLocalization::getCurrentLocale() == 'ar') rtl @endif  ">
    <div class="wrapper">
        @include('back.partials.navbar')

        @include('back.partials.sidebar')

        <main role="main" class="main-content">
            @yield('content')
        </main> <!-- main -->
    </div> <!-- .wrapper -->

    @include('back.partials.scripts')



</body>

</html>
