@extends('frontend.layouts.master')


@section('content')

    <div class="px-4 my-4">
        <div class="row px-xl-5">
            <div class="col-md-8 p-1">
                <div class="profile-tab px-xl-5 border p-2">
                    <h3 class="float-left">Hello! <strong>{{$user->full_name}}</strong></h3>

                    <div class="clearfix"></div>
                    <hr>
                    <form action="{{ route('update.account',$user->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name<span
                                            class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                           value="{{ $user->full_name }}" placeholder="eg. Julio Alejandro">
                                    @error('full_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           value="{{ $user->username }}" placeholder="eg. julio.97">
                                    @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ $user->email }}" placeholder="eg. ejemplo@asd.com" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           value="{{ $user->phone }}" placeholder="eg. 994521556">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Current Password (Leave blank to unchanged)</label>
                                    <input type="password" class="form-control" name="oldpassword" id="currentpassword">
                                    @error('oldpassword')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">New Password (Leave blank to unchanged)</label>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword">
                                    @error('newpassword')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Information
                        </button>
                    </form>

                </div>
            </div>
            <div class="col-md-4 p-1">
                @include('frontend.user.sidebar')
            </div>


        </div>
    </div>


@endsection
