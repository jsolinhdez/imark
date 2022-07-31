@extends('frontend.layouts.master')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <form action="{{ route('shop.filter') }}" method="POST">
                @csrf
                @if(count($cats)>0)
                    <!-- Category Start -->
                        <div class="border-bottom mb-4 pb-4">
                            <h5 class="font-weight-semi-bold mb-4">Filter by category</h5>
                            @if(!empty($_GET['category']))
                                @php
                                    $filter_cats = explode(',',$_GET['category'])
                                @endphp
                            @endif
                            @foreach($cats as $cat)
                                <div
                                    class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input"
                                           @if(!empty($filter_cats) && in_array($cat->slug,$filter_cats)) checked
                                           @endif id="{{ $cat->slug }}"
                                           name="category[]" onchange="this.form.submit();" value="{{ $cat->slug }}">
                                    <label class="custom-control-label" for="{{ $cat->slug }}">{{ $cat->title }}</label>
                                    <span class="badge border font-weight-normal">{{ count($cat->products) }}</span>
                                </div>
                            @endforeach

                        </div>
                        <!-- Category End -->
                    @endif
                </form>
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
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($products)>0)
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ $product->condition }}</span>
                                    @php
                                        $photos = explode(',',$product->photo);
                                    @endphp
                                    @php
                                        $pho = explode('com',$photos[0]);
                                    @endphp
                                    <div
                                        class="card-header text-center product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid " src="{{ $pho[1] }}" alt="{{$product->title}}"
                                             style="width: 250px">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h4 class="text-truncate mb-3">{{ ucfirst($product->title) }}</h4>
                                        <div class="d-flex justify-content-center">
                                            <h6>${{number_format($product->offer_price,2)}}</h6>
                                            <h6 class="text-muted ml-2">
                                                <del>${{number_format($product->price,2)}}</del>
                                            </h6>

                                        </div>
                                        <p class="text-gray-dark">Brand
                                            : {{ ucfirst( \App\Models\Brand::where('id',$product->brand_id)->value('title'))  }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="" data-quantity="1" id="add_to_cart{{$product->id}}"
                                           data-product-id="{{$product->id}}"
                                           class="add_to_cart btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                        <a href="javascript:void(0);"
                                           class="btn btn-sm text-dark p-0 add_to_wishlist" data-quantity="1"
                                           data-id="{{ $product->id }}" id="add_to_wishlist_{{ $product->id }}"><i
                                                class="fas fa-heart text-primary mr-1 "></i>Add to wishlist</a>
                                        <a href="{{ route('product.detail',$product->slug) }}"
                                           class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h4>Sorry, No products found !</h4>
                            </div>
                        </div>
                    @endif
                    {{ $products->appends($_GET)->links('vendor.pagination.custom') }}
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection


@section('scripts')
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
                    $('a#add_to_cart' + product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                },
                complete: function () {
                    $('a#add_to_cart' + product_id).html('<i class="fa fa-cart-plus"></i> Add to Cart');
                },
                success: function (data) {
                    $('body #nav-ajax').html(data['nav']);
                    if (data['status']) {
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
                    $('a#add_to_wishlist_' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function () {
                    $('a#add_to_wishlist_' + product_id).html('<i class="fas fa-hand-holding-heart"></i> Added to Wishlist');
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
                    } else if (data['present']) {
                        $('body #nav-ajax').html(data['nav']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal.fire({
                            title: "Opps !",
                            text: data['message'],
                            icon: "warning",
                        });
                    } else {
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
