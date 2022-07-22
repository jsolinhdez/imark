@extends('frontend.layouts.master')


@section('content')

    <div class="px-4 my-4">
        <div class="row px-xl-5">
            <div class="col-md-8 p-1">
                <!-- Address Start -->
                <div class="px-xl-5 border p-2">
                    <h3 class="mb-3">The following address will be user on the checkout page by default</h3>
                    <div class="clearfix"></div>

                    <hr>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h6>Billing Address</h6>
                            <p>MD Naddruz ISLAM</p>
                            <p> ISLAM</p>
                            <p>1600</p>
                            <a href="#profileEditModal" data-toggle="modal" class="btn btn-success"><i
                                    class="fa fa-edit"></i> Edit Billing Address</a>
                        </div>
                        <div class="col-md-6">
                            <h6>Shipping Address</h6>
                            <p> ISLAM</p>
                            <p>1600</p>
                            <a href="#profileEditModal" data-toggle="modal" class="btn btn-success"><i
                                    class="fa fa-edit"></i> Edit Shipping Address</a>

                        </div>

                    </div>


                    <!-- Profile Edit Modal -->
                    <div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp" placeholder="Enter first name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp" placeholder="Enter last name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">About</label>
                                                    <textarea class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save
                                            Information
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- Address End -->

            </div>
            <div class="col-md-4 p-1">
                @include('frontend.user.sidebar')
            </div>
        </div>
    </div>


@endsection
