@extends('frontend.layouts.master')


@section('content')

    <div class="px-4 my-4">
        <div class="row px-xl-5">
            <div class="col-md-8 p-1">
                <!-- Address Start -->
                <div class="px-xl-5 border p-2">
                    <h2 class="mb-3">The following address will be user on the checkout page by default</h2>
                    <div class="clearfix"></div>

                    <hr>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h4>Billing Address</h4>
                            <p>Address: <span>{{ $user->address }}</span></p>
                            <p>Country: <span>{{ $user->country }}</span></p>
                            <p>State: <span>{{ $user->state }}</span></p>
                            <p>City: <span>{{ $user->city }}</span></p>
                            <p>Postcode: <span>{{ $user->postcode }}</span></p>
                            <div class="clearfix"></div>

                            <a href="#editaddress" data-toggle="modal" class="btn btn-success"><i
                                    class="fa fa-edit"></i> Edit Billing Address</a>


                            {{--Modal edit billing address--}}
                            <div class="modal fade" id="editaddress" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Your <strong>Billing
                                                    Address</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('billing.address',$user->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <textarea name="address" class="form-control" id=""
                                                              placeholder="eg. La habana">{{ $user->address }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Country</label>
                                                    <input type="text" class="form-control" name="country"
                                                           placeholder="eg. Qatar" value="{{ $user->country }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Postcode</label>
                                                    <input type="number" name="postcode" class="form-control"
                                                           placeholder="eg. 45122" value="{{ $user->postcode }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <input type="text" name="state"  class="form-control"
                                                           placeholder="eg. state1" value="{{ $user->state }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">City</label>
                                                    <input type="text" name="city" class="form-control"
                                                           placeholder="eg. Vedado" value="{{ $user->city }}">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit"  class="btn btn-success"><i
                                                        class="fa fa-check"></i> Save Information
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--END Modal edit billing address--}}


                        </div>
                        <div class="col-md-6">
                            <h4>Shipping Address</h4>
                            <p>Shipping Address: <span>{{ $user->saddress }}</span></p>
                            <p>Shipping Country: <span>{{ $user->scountry }}</span></p>
                            <p>Shipping State: <span>{{ $user->sstate }}</span></p>
                            <p>Shipping City: <span>{{ $user->scity }}</span></p>
                            <p>Shipping Postcode: <span>{{ $user->spostcode }}</span></p>
                            <div class="clearfix"></div>
                            <a href="#editsaddress" data-toggle="modal" class="btn btn-success"><i
                                    class="fa fa-edit"></i> Edit Shipping Address</a>

                            <!--  Edit Shipping address Modal -->
                            <div class="modal fade" id="editsaddress" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Your <strong>Shipping
                                                    Address</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('shipping.address',$user->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="">Shipping Address</label>
                                                    <textarea name="saddress" class="form-control" id=""
                                                              placeholder="eg. La habana">{{ $user->saddress }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping Country</label>
                                                    <input type="text" class="form-control" name="scountry"
                                                           placeholder="eg. Qatar" value="{{ $user->scountry }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping Postcode</label>
                                                    <input type="number" name="spostcode" class="form-control"
                                                           placeholder="eg. 45122" value="{{ $user->spostcode }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping State</label>
                                                    <input type="text" name="sstate"  class="form-control"
                                                           placeholder="eg. state1" value="{{ $user->sstate }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping City</label>
                                                    <input type="text" name="scity" class="form-control"
                                                           placeholder="eg. Vedado" value="{{ $user->scity }}">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit"  class="btn btn-success"><i
                                                        class="fa fa-check"></i> Save Information
                                                </button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <!-- END Edit Shipping address Modal -->


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
