@extends('frontend.layouts.master')


@section('content')

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class=" table-responsive mb-5" id="wishlist_list">
                    @include('frontend.layouts._wishlist')
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).on('click','.move_to_cart', function (e) {
            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('wishlist.move.cart') }}";

            $.ajax({
                url: path,
                type: "POST",
                data: {
                    rowId: rowId,
                    _token: token,
                },
                beforeSend: function () {
                    $(this).html('<i class="fa fa-spinner fa-spin"></i> Moving to cart...');
                },

                success: function (data) {
                    if (data['status']) {
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #nav-ajax').html(data['nav-ajax']);
                        swal.fire({
                            title: "Success !",
                            text: data['message'],
                            icon: "success",
                        });
                    } else {
                        swal.fire({
                            title: "Opps !",
                            text: "Something went wrong",
                            icon: "warning",
                        });
                    }
                },
                error: function (err) {
                    swal.fire({
                        title: "Error !",
                        text: "Some error",
                        icon: "error",
                    });
                }

            });

        });
    </script>

@endsection
