<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.layouts.head')
</head>

<body>
@include('frontend.layouts.nav')

@yield('content')
<!-- Vendor End -->

@include('frontend.layouts.footer')


@include('frontend.layouts.script')
</body>

</html>
