@extends('frontend.layouts.master')


@section('content')
    <div class="row px-xl-5 pt-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <p class="nav-item nav-link"><span>Billing</span></p>
                <p class="nav-item nav-link "><span>Shipping</span></p>
                <p class="nav-item nav-link "><span>Payment</span></p>
                <p class="nav-item nav-link "><span>Reviews</span></p>
                <p class="nav-item nav-link active"><span>Complete</span></p>
            </div>
                <div class="container-fluid p-5">
                    <h4 class="mb-4">Congratulations !!</h4>

                    <div class="card p-3 w-100">
                        <h5 class="card-title">Thank You For Your Order !</h5>
                        <p class="card-text">You will receive an email of your order details.</p>
                        <p class="card-text">You Order id is <strong>#{{ $order }}</strong>.</p>
                    </div>
                </div>
        </div>
    </div>

@endsection

