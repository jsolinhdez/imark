@extends('frontend.layouts.master')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove <i class="icon-trash"></i></th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                        <tr>
                            <td class="align-middle"><img src="{{ $item->model->photo }}" alt=""
                                                          style="width: 50px;"> {{ $item->model->title }}
                            </td>
                            <td class="align-middle">$ {{ number_format($item->price,2) }}</td>
                            <td class="align-middle" style="width: 20px">
                                <div class="input-group-btn quantity" >
                                    <input type="number" class="qty-text" data-id="{{ $item->rowId }}" id="quantity-item-{{ $item->rowId }}" step="1" min="1" max="99" name="quantity" value="{{ $item->qty }}" style="border: none;width: 60%">
                                    <input type="hidden" data-id="{{ $item->rowId }}" data-product-quantity="{{ $item->model->stock }}" id="update-cart-{{ $item->rowId }}">
                                </div>
                            </td>
                            <td class="align-middle">$ {{ number_format($item->subtotal(),2) }}</td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-primary cart_delete" data-id="{{ $item->rowId }}"><i
                                        class="fa fa-times"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection

@section('scripts')
<script>

    $(document).on('click', '.cart_delete', function (e) {
        e.preventDefault();
        var cart_id = $(this).data('id');

        var token = "{{ csrf_token() }}";
        var path = "{{ route('cart.delete') }}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                cart_id: cart_id,
                _token: token,
            },
            success: function (data) {
                $('body #nav-ajax').html(data['nav']);
                if (data['status']) {
                    swal.fire({
                        title: "Good job",
                        text: data['message'],
                        icon: "success",
                        button: "Aww yiss!",
                    });
                }
            },
            error: function (err) {
                console.log(err);
            }
        });

    });


</script>
<script>
    $(document).on('click','.qty-text',function (){
        var id = $(this).data('id');

        var spinner = $(this),input = spinner.closest("div.quantity").find('input[type="number"]');

        if (input.val()==1){
            return false;
        }

        if (input.val()!=1){
            var newVal = parseFloat(input.val());
            $('#qty-input-'+id).val(newVal);
        }

        var productQuantity = $("#update-cart-"+id).data('product-quantity');
        update_cart(id,productQuantity);
    });

    function update_cart(id,productQuantity){
        var rowId = id;
        var product_qty = $('#qty-input-'+rowId).val();
        var token = "{{ csrf_token() }}"
        var path = "{{ route('cart.update') }}"

    }




</script>
@endsection
