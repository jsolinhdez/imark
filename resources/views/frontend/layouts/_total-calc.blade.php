<div class="card border-secondary mb-5" id="data_total">
    <div class="card-header bg-secondary border-0">
        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 class="font-weight-medium">$ {{ Cart::instance('shopping')->subtotal() }}</h6>
        </div>
        <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Coupon</h6>
            @if(session()->has('coupon'))
                <h6 class="price">- $ {{ session('coupon')['value'] }}</h6>
            @else
                <h6 class="price">- 0</h6>
            @endif
        </div>
    </div>
    @php
        $calc = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
    @endphp
    <div class="card-footer border-secondary bg-transparent">
        <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            @if(session()->has('coupon'))
                <h5 class="font-weight-bold">
                    $ {{ number_format(floatval(preg_replace("/[^-0-9\.]/","",$calc)) - session('coupon')['value'],2)  }}</h5>
            @else
                <h5 class="font-weight-bold">
                    $ {{ number_format(floatval(preg_replace("/[^-0-9\.]/","",$calc)),2) }}</h5>
            @endif
        </div>
    </div>
</div>
