@extends('frontend.layouts.master')

@section('content')


    <body>

    <div class="container mt-4 mb-4">
        <div class="text-center">
            <h1>404</h1>
            <h5><strong>Oops! Page nout found</strong></h5>

            <p>
                The site configured at this address does not
                contain the requested file.
            </p>


            <div id="suggestions">

                <a class="icon-home nav-link" href="{{ route('home') }}"><span> HOME - iMarK</span></a>
            </div>

                <img class="mt-4 w-25 h-25" width="32" height="32" title="" alt="" src="/frontend/img/img_error.png">

        </div>
    </div>

    </body>



@endsection
