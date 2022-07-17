<!doctype html>
<html lang="en">
<head>

    @include('frontend.layouts.head')

</head>
<body>

@include('frontend.layouts.header')

@include('frontend.layouts.nav')


@yield('content')



@include('frontend.layouts.footer')

@include('frontend.layouts.script')

</body>
</html>
