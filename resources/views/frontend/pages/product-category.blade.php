@extends('frontend.layouts.master')

@section('content')

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <p>Category:
                            <strong> {{ $categories->title}}</strong>
                        </p>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <select class="" id="sortBy">
                                    <option value="">Default Sort</option>
                                    <option value="priceAsc" {{  old('sortBy') == 'priceAsc' ? 'selected' : '' }}>Price
                                        - Lower to Higher
                                    </option>
                                    <option value="priceDesc" {{  old('sortBy') == 'priceDesc' ? 'selected' : '' }}>
                                        Price - Higher to Lower
                                    </option>
                                    <option value="titleAsc" {{  old('sortBy') == 'titleAsc' ? 'selected' : '' }}>
                                        Alphabetical Ascending
                                    </option>
                                    <option value="titleDesc" {{  old('sortBy') == 'titleDesc' ? 'selected' : '' }}>
                                        Alphabetical Descending
                                    </option>
                                    <option value="discountAsc" {{  old('sortBy') == 'discountAsc' ? 'selected' : '' }}>
                                        Discount - Lower to Higher
                                    </option>
                                    <option
                                        value="discountDesc" {{  old('sortBy') == 'discountDesc' ? 'selected' : '' }}>
                                        Discount - Higher to Lower
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row" id="product-data">
                        @include('frontend.layouts._single-product')
                    </div>
                    <div class="ajax-load text-center container" style="display: none">
                        <img src="{{ asset('frontend/img/loading_icon.gif') }}">
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection

@section('scripts')
    <script>
        $('#sortBy').change(function () {
            var sort = $('#sortBy').val();
            window.location = "{{ url(''.$route.'') }}/{{ $categories->slug }}?sort=" + sort;
        });
    </script>
    <script>
        function loadmoreData(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function () {
                    $('.ajax-load').show();
                },
            })
                .done(function (data) {
                    if (data.html == '') {
                        $('.ajax-load').html('<h2>No more product available</h2>');
                        return;
                    }
                    $('.ajax-load').hide();
                    $('#product-data').append(data.html);
                })
                .fail(function () {
                    console.log('Something went wrong loading more products');
                });
        }

        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
                page++;
                loadmoreData(page);
            }
        })

    </script>
    {{--    Add to Cart--}}
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var product_qty = $(this).data('quantity');

            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.store') }}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function () {
                    $('#add_to_cart' + product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                },
                complete: function () {
                    $('#add_to_cart' + product_id).html('<i class="fa fa-cart-plus"></i> Add to Cart');
                },
                success: function (data) {
                    console.log(data);
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
    {{--    END Add to Cart--}}

    {{--    Add to Wishlist--}}

    <script>
        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');

            var token = "{{ csrf_token() }}";
            var path = "{{ route('wishlist.store') }}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function () {
                    $('#add_to_wishlist_' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function () {
                    $('#add_to_wishlist_' + product_id).html('<i class="fas fa-hand-holding-heart"></i> Added to Wishlist');
                },
                success: function (data) {
                    $('body #nav-ajax').html(data['nav']);
                    $('body #wishlist_counter').html(data['wishlist_count']);
                    if (data['status']) {
                        swal.fire({
                            title: "Good job",
                            text: data['message'],
                            icon: "success",
                        });
                    }
                    else if(data['present']){
                        $('body #nav-ajax').html(data['nav']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal.fire({
                            title: "Opps !",
                            text: data['message'],
                            icon: "warning",
                        });
                    }
                    else{
                        swal.fire({
                            title: "Sorry !",
                            text: "You can't add that product",
                            icon: "error",
                        });
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });

        });
    </script>
    {{--    ENDAdd to Wishlist--}}

@endsection
