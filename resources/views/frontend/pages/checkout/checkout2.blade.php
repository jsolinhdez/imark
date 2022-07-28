@extends('frontend.layouts.master')


@section('content')
    <div class="row px-xl-5 pt-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <p class="nav-item nav-link"><span>Billing</span></p>
                <p class="nav-item nav-link active"><span>Shipping</span></p>
                <p class="nav-item nav-link"><span>Payment</span></p>
                <p class="nav-item nav-link"><span>Reviews</span></p>
                <p class="nav-item nav-link "><span>Complete</span></p>


            </div>
            <div class="container-fluid pt-5">
                <h4 class="mb-4">Shipping Method</h4>
                <form action="{{ route('checkout2.store') }}" method="POST">
                    @csrf
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Method</th>
                            <th>Delivery Time</th>
                            <th>Delivery Charge</th>
                            <th>Method</th>
                        </tr>
                        </thead>
                        <tbody class="align-middle">
                        @if(count($shippings)>0)
                            @foreach($shippings as $key => $item)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $item->shipping_address }}</th>
                                    <td class="align-middle"> {{ $item->delivery_time }} </td>
                                    <td class="align-middle"> $ {{ number_format( $item->delivery_charge,2) }} </td>
                                    <td class="align-middle">
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" id="customRadio{{$key}}" name="delivery_charge"
                                                   value="{{ $item->delivery_charge }}" class="custom-control-input"
                                                   name="payment">
                                            <label class="custom-control-label" for="customRadio{{$key}}"></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><h4>no Shippings Methods found !!</h4></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="mt-4" style="float: right">
                        <a class="btn btn-secondary border-0 py-3" href="{{ route('checkout1') }}">Go Back</a>
                        <button type="submit" class="btn btn-success border-0 py-3">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

