@extends('frontend.layouts.master')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5" id="cart_list">
                @include('frontend.layouts._cart-list')
            </div>
            <div class="col-lg-4">

                <h4 class="card-title">Have a Coupon?</h4>
                <h6>Enter your coupon code here & get awesome discounts!</h6>
                @if(session()->has('coupon'))
                    <div class="coupon-applied mt-4 mb-4">
                        <i class="fas fa-check"></i> Applied Coupon... <strong>{{session('coupon')['code'] }}</strong>
                        <a href="{{ route('coupon.remove') }}" class="delete-coupon ml-5"><i class="icon-trash"></i>Remove Coupon Discount</a>
                    </div>
                @endif
                <form class="mb-5 mt-4" action="{{ route('coupon.add') }}" id="coupon-form" method="POST">
                    @csrf
                    <div class="input-group">
                        @if(session()->has('coupon'))
                            <input type="text" class="form-control p-4" name="code" value="{{session('coupon')['code'] }}" placeholder="Coupon Code">
                        @else
                            <input type="text" class="form-control p-4" name="code" placeholder="Coupon Code">
                        @endif
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary coupon-btn">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                @include('frontend.layouts._total-calc')
                <a href="{{ route('checkout1') }}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection

@section('scripts')

    <script>
        $(document).on('click', '.coupon-btn', function (e) {
            e.preventDefault();
            var code = $('input[name=code]').val();

            $('.coupon-btn').html('<i class="fas fa-spinner fa-spin"></i> Applying...')
            $('#coupon-form').submit();
        });


    </script>

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
                    if (data['status']) {
                        $('body #nav-ajax').html(data['nav']);
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);
                        $('body #data_total').html(data['total_c']);
                        $('#coupon-form').submit();


                        swal.fire({
                            title: "Good job",
                            text: data['message'],
                            icon: "success",
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
        $(document).on('click', '.qty-text', function () {
            var id = $(this).data('id');

            var spinner = $(this), input = spinner.closest("div.quantity").find('input[type="number"]');

            // if (input.val() == 1) {
            //     return false;
            // }

            if (input.val() != 1) {
                var newVal = parseFloat(input.val());
                $('#qty-input-' + id).val(newVal);
            }

            var productQuantity = $("#update-cart-" + id).data('product-quantity');
            update_cart(id, productQuantity);
        });

        function update_cart(id, productQuantity) {
            var rowId = id;
            var product_qty = $('#qty-input-' + rowId).val();
            var token = "{{ csrf_token() }}"
            var path = "{{ route('cart.update') }}"

            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    product_qty: product_qty,
                    rowId: rowId,
                    productQuantity: productQuantity,
                },
                success: function (data) {
                    if (data['status']) {
                        $('body #nav-ajax').html(data['nav']);
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);
                        $('body #data_total').html(data['total_c']);
                        $('#coupon-form').submit();


                    } else {
                        $('body #nav-ajax').html(data['nav']);
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);

                        swal.fire({
                            title: "Warning!!",
                            text: data['message'],
                        });

                    }
                },
            });
        }


    </script>
@endsection
