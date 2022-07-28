@extends('frontend.layouts.master')


@section('content')
    <div class="row px-xl-5 pt-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <p class="nav-item nav-link"><span>Billing</span></p>
                <p class="nav-item nav-link "><span>Shipping</span></p>
                <p class="nav-item nav-link active"><span>Payment</span></p>
                <p class="nav-item nav-link"><span>Reviews</span></p>

            </div>
            <div class="container-fluid p-5" >
                <h4 class="mb-4">Payment Method</h4>
                <form action="{{ route('checkout3.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1"   name="payment_method" class="custom-control-input" >
                        <label class="custom-control-label" for="customRadio1"><i class="icon-wallet"></i></label> Cash on Delivery
                    </div>
                    </div>
                    <div class="mt-4" style="float: right">
                        <a class="btn btn-secondary border-0 py-3" href="">Back</a>
                        <button type="submit" class="btn btn-success border-0 py-3">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

