@extends('frontend.layouts.master')


@section('content')
    <div class="row px-xl-5 pt-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1"><h4>Billing</h4></a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2"><h4>Shipping</h4></a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3"><h4>Payment</h4></a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-4"><h4>Reviews</h4></a>

            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <div class="container-fluid pt-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                                    <div class="row">
                                        @php
                                            $name = explode(' ',$user->full_name)
                                        @endphp
                                        <div class="col-md-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="first_name" type="text"
                                                   value="{{ $name[0] }}" id="first_name" placeholder="eg. John" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="last_name"
                                                   value="{{ $name[1] }}" id="last_name" placeholder="eg. Doe" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="email"
                                                   value="{{ $user->email }}" id="email" placeholder="eg. example@email.com"
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
                                                   value="{{ $user->address }}" id="address" placeholder="eg. Street Cumbis Ave 12">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Country</label>
                                            <input class="form-control" type="text" name="country"
                                                   value="{{ $user->country }}" id="country" placeholder="eg. United States">
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
                                                   value="{{ $user->postcode }}" id="postcode" placeholder="eg. 45111">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>Order Notes</label>
                                            <textarea class="form-control" type="text" rows="3" name="note"
                                                      id="note" placeholder="eg. Here you can write some note"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 form-group mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Ship to same
                                            address</label>
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
                                                   value="{{ $name[0] }}" placeholder="eg. John" id="sfirst_name" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="slast_name"
                                                   value="{{ $name[1] }}" placeholder="eg. Doe" id="slast_name" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="semail"
                                                   value="{{ $user->email }}" id="semail" placeholder="eg. example@email.com">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Mobile No</label>
                                            <input class="form-control" name="sphone" type="text"
                                                   value="{{ $user->phone }}" id="sphone" placeholder="eg. +1566652">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="saddress"
                                                   value="{{ $user->saddress }}" id="saddress" placeholder="eg. Street Cumbis Ave 12">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Country</label>
                                            <input class="form-control" type="text" name="scountry"
                                                   value="{{ $user->scountry }}" id="scountry" placeholder="eg. United States">
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
                                                   value="{{ $user->spostcode }}"  id="spostcode" placeholder="eg. 45111">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <div class="container-fluid pt-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                                    <div class="row">
                                        @php
                                            $name = explode(' ',auth()->user()->full_name)
                                        @endphp
                                        <div class="col-md-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="sfirst_name" type="text"
                                                   value="{{ $name[0] }}" placeholder="eg. John" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="slast_name"
                                                   value="{{ $name[1] }}" placeholder="eg. Doe" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="semail"
                                                   value="{{ $user->email }}" placeholder="eg. example@email.com">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Mobile No</label>
                                            <input class="form-control" name="sphone" type="text"
                                                   value="{{ $user->phone }}" placeholder="eg. +1566652">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="saddress"
                                                   value="{{ $user->saddress }}" placeholder="eg. Street Cumbis Ave 12">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Country</label>
                                            <input class="form-control" type="text" name="scountry"
                                                   value="{{ $user->scountry }}" placeholder="eg. United States">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" name="scity"
                                                   value="{{ $user->scity }}" placeholder="eg Tampa">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>State</label>
                                            <input class="form-control" type="text" name="sstate"
                                                   value="{{ $user->sstate }}" placeholder="eg. Florida">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>ZIP Code</label>
                                            <input class="form-control" type="text" name="spostcode"
                                                   value="{{ $user->spostcode }}" placeholder="eg. 45111">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                        at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                        at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#customCheck1').on('change',function (e){
           e.preventDefault();

           if (this.checked){
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
           }
           else {
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
