@extends('frontend.layouts.master')

@section('content')


    <body>

    <div class="container mt-4 mb-4">
        <div class="text-center">
            <h1>500</h1>
            <h5><strong>Internal Server Error</strong></h5>

            <p>
                Sorry!. It's me, not you.
            </p>


            <div id="suggestions">

                <a class="icon-home nav-link" href="{{ route('home') }}"><span> HOME - iMarK</span></a>
            </div>

                <img class="mt-4 w-25 h-25" width="32" height="32" title="" alt="" src="/frontend/img/img_error.png"\>

        </div>
    </div>

    </body>



@endsection
