@extends('frontend.layouts.master')


@section('content')
    <div class="row px-xl-5 pt-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <p class="nav-item nav-link"><span>Billing</span></p>
                <p class="nav-item nav-link "><span>Shipping</span></p>
                <p class="nav-item nav-link "><span>Payment</span></p>
                <p class="nav-item nav-link active"><span>Reviews</span></p>
                <p class="nav-item nav-link "><span>Complete</span></p>
            </div>
            <div class="container-fluid p-5">
                <h4 class="mb-4">Review your Order</h4>

                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                        <tr>

                            <td class="align-middle"><img src="{{ $item->model->photo }}" alt=""
                                                          style="width: 50px;">
                            </td>
                            <td class="align-middle"><a href="{{ route('product.detail', $item->model->slug) }}">{{ $item->name }}</a>
                            </td>
                            <td class="align-middle">$ {{ number_format($item->price,2) }}</td>
                            <td class="align-middle" style="width: 20px">
                                <div class="input-group-btn quantity" id="cart_counter">
                                    <input type="number" class="qty-text" data-id="{{ $item->rowId }}"
                                           id="qty-input-{{ $item->rowId }}"
                                           name="quantity" value="{{ $item->qty }}" disabled style="border: none;width: 60%">

                                </div>
                            </td>
                            <td class="align-middle">$ {{ $item->subtotal() }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row p-5">
                <div class="card border-secondary col-md-4 mt-2 p-5" id="data_total">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Totals</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$ {{ Cart::instance('shopping')->subtotal() }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">+ $ {{ number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Coupon</h6>
                            @if(session()->has('coupon'))
                                <h6 class="price">- $ {{ number_format(\Illuminate\Support\Facades\Session::get('coupon')['value'],2) }}</h6>
                            @else
                                <h6 class="price">- $ {{ number_format(0,2) }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            @if(\Illuminate\Support\Facades\Session::has('coupon') && \Illuminate\Support\Facades\Session::has('checkout'))
                                <h5 class="font-weight-bold">$ {{ number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'] - \Illuminate\Support\Facades\Session::get('coupon')['value'],2) }} </h5>
                            @elseif(\Illuminate\Support\Facades\Session::has('coupon'))
                                <h5 class="font-weight-bold">$ {{ number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'],2) }} </h5>
                            @elseif(\Illuminate\Support\Facades\Session::has('checkout'))
                                <h5 class="font-weight-bold">$ {{ number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2) }} </h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-2 p-5" ></div>
                <div class=" col-md-4 mt-2 p-5" >
                    <div class="">
                        <div class="mt-4" >
                            <a class="btn btn-secondary w-100 border-0 py-3" href="{{ route('checkout1') }}">Go Back</a>
                            <a href="{{ route('checkout.store') }}" class="btn w-100 btn-success border-0 mt-4 py-3">Confirm</a>
                        </div>
                    </div>

                </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

