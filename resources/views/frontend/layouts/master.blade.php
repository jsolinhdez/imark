<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.layouts.head')

</head>

<body>
@include('frontend.layouts.nav')

<div class="row">
    <div class="col-md-12 text-center">
        @include('backend.layouts.notifications')
    </div>
</div>

@yield('content')
<!-- Vendor End -->

@include('frontend.layouts.footer')


@include('frontend.layouts.script')
</body>

</html>
