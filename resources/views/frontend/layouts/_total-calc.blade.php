<div class="card border-secondary mb-5" id="data_total">
    <div class="card-header bg-secondary border-0">
        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 class="font-weight-medium">{{ Cart::instance('shopping')->subtotal() }}</h6>
        </div>
        <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Coupon</h6>
            <h6 class="font-weight-medium">- $10</h6>
        </div>
    </div>
    <div class="card-footer border-secondary bg-transparent">
        <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 class="font-weight-bold">{{ Cart::instance('shopping')->total() }}</h5>
        </div>
    </div>
</div>
