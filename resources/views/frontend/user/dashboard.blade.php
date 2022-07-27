@extends('frontend.layouts.master')


@section('content')

    <div class="px-4 my-4">
        <div class="row px-xl-5">
            <div class="col-md-8 p-1">
                <div class="profile-tab px-xl-5 border p-2">
                    <h3 class="float-left">Hello! <strong>{{$user->full_name}}</strong></h3>
                    <div class="float-right">
                        <a href="{{ route('user.account') }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div>
                        <p>
                            From your account dashboard you can view you recent orders, manage your shipping and billing address <br>and <strong>Edit your password and count details</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-1">
                @include('frontend.user.sidebar')
            </div>


        </div>
    </div>


@endsection
