@extends('frontend.layouts.master')


@section('content')
    <div class="row px-xl-5 pt-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <p class="nav-item nav-link active"><span>Billing</span></p>
                <p class="nav-item nav-link " ><span>Shipping</span></p>
                <p class="nav-item nav-link" ><span>Payment</span></p>
                <p class="nav-item nav-link" ><span>Reviews</span></p>

            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <div class="container-fluid pt-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-12">
                                <form action="{{ route('checkout1.store') }}" method="POST">
                                    @csrf

                                <div class="mb-4">
                                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                                        <div class="row">
                                            @php
                                                $name = explode(' ',$user->full_name)
                                            @endphp
                                            <div class="col-md-6 form-group">
                                                <label>First Name</label>
                                                <input class="form-control" name="first_name" type="text"
                                                       value="{{ $name[0] }}" id="first_name" placeholder="eg. John"
                                                       required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" name="last_name"
                                                       value="{{ $name[1] }}" id="last_name" placeholder="eg. Doe"
                                                       required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>E-mail</label>
                                                <input class="form-control" type="email" name="email"
                                                       value="{{ $user->email }}" id="email"
                                                       placeholder="eg. example@email.com"
                                                       readonly>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Mobile No</label>
                                                <input class="form-control" name="phone" type="text"
                                                       value="{{ $user->phone }}" id="phone" placeholder="eg. +1566652">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Address</label>
                                                <input class="form-control" type="text" name="address"
                                                       value="{{ $user->address }}" id="address"
                                                       placeholder="eg. Street Cumbis Ave 12">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Country</label>
                                                <input class="form-control" type="text" name="country"
                                                       value="{{ $user->country }}" id="country"
                                                       placeholder="eg. United States">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>City</label>
                                                <input class="form-control" type="text" name="city"
                                                       value="{{ $user->city }}" id="city" placeholder="eg Tampa">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>State</label>
                                                <input class="form-control" type="text" name="state"
                                                       value="{{ $user->state }}" id="state" placeholder="eg. Florida">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>ZIP Code</label>
                                                <input class="form-control" type="text" name="postcode"
                                                       value="{{ $user->postcode }}" id="postcode"
                                                       placeholder="eg. 45111">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Order Notes</label>
                                                <textarea class="form-control" type="text" rows="3" name="note"
                                                          id="note"
                                                          placeholder="eg. Here you can write some note"></textarea>
                                            </div>
                                        </div>

                                </div>
                                <div class="col-md-12 form-group mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"><strong>Ship to same
                                                address </strong>( You can keep your shipping address | <span
                                                class="text-danger">Uncheck</span> to Modify | or <span
                                                class="text-info">Check</span> to use your billing address to shipping )</label>
                                    </div>
                                </div>
                                <div class="mb-4" id="shipping_form">
                                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                                    <div class="row">
                                        @php
                                            $name = explode(' ',$user->full_name)
                                        @endphp
                                        <div class="col-md-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="sfirst_name" type="text"
                                                   value="{{ $name[0] }}" placeholder="eg. John" id="sfirst_name"
                                                   required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="slast_name"
                                                   value="{{ $name[1] }}" placeholder="eg. Doe" id="slast_name"
                                                   required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="semail"
                                                   value="{{ $user->email }}" id="semail"
                                                   placeholder="eg. example@email.com">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Mobile No</label>
                                            <input class="form-control" name="sphone" type="text"
                                                   value="{{ $user->phone }}" id="sphone" placeholder="eg. +1566652">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="saddress"
                                                   value="{{ $user->saddress }}" id="saddress"
                                                   placeholder="eg. Street Cumbis Ave 12">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Country</label>
                                            <input class="form-control" type="text" name="scountry"
                                                   value="{{ $user->scountry }}" id="scountry"
                                                   placeholder="eg. United States">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" name="scity"
                                                   value="{{ $user->scity }}" id="scity" placeholder="eg Tampa">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>State</label>
                                            <input class="form-control" type="text" name="sstate"
                                                   value="{{ $user->sstate }}" id="sstate" placeholder="eg. Florida">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>ZIP Code</label>
                                            <input class="form-control" type="text" name="spostcode"
                                                   value="{{ $user->spostcode }}" id="spostcode"
                                                   placeholder="eg. 45111">
                                        </div>
                                    </div>
                                </div>
                                    <div class="" style="float: right">
                                        <a class="btn btn-secondary border-0 py-3" href="{{ route('cart') }}">Back</a>
                                        <button type="submit" class="btn btn-success border-0 py-3">Continue</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#customCheck1').on('change', function (e) {
            e.preventDefault();

            if (this.checked) {
                $('#sfirst_name').val($('#first_name').val());
                $('#slast_name').val($('#last_name').val());
                $('#semail').val($('#email').val());
                $('#sphone').val($('#phone').val());
                $('#saddress').val($('#address').val());
                $('#scity').val($('#city').val());
                $('#scountry').val($('#country').val());
                $('#sstate').val($('#state').val());
                $('#spostcode').val($('#postcode').val());
                $('#shipping_form').addClass('d-none');
            } else {
                $('#sfirst_name').val("");
                $('#slast_name').val("");
                $('#semail').val("");
                $('#sphone').val("");
                $('#saddress').val("");
                $('#scity').val("");
                $('#scountry').val("");
                $('#sstate').val("");
                $('#spostcode').val("");
                $('#shipping_form').removeClass('d-none');

            }

        });


    </script>
@endsection
