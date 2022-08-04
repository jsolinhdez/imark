@extends('frontend.layouts.master')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5" style="background-image: url(images/banners/banner-shop.gif);background-position: center;
    background-size: cover;">
        <div class="d-flex flex-column align-items-center justify-content-end pb-4" style="min-height: 380px">
            <div class="d-inline-flex">
                <h3 class="m-0 "><a href="{{ route('home') }}" style="color: #121862">Home</a></h3>
                <h3 class="m-0 px-2">-</h3>
                <h3 class="m-0">Shop</h3>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <form action="{{ route('shop.filter') }}" method="POST">
            @csrf
            <div class="row px-xl-5">

                <!-- Shop Sidebar Start -->
                <div class="col-lg-3 col-md-12">

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
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by Price</h5>

                        @if(!empty($_GET['price']))
                            @php
                                $price = explode('-',$_GET['price'])
                            @endphp
                        @endif
                        <div id="slider-range" slider-min="{{ Helper::minPrice() }}"
                             slider-max="{{ Helper::maxPrice() }}"></div>
                        <div class="mt-2">
                            <label for="amount">Price range:</label>
                            <input type="text" id="amount" name="range" readonly
                                   style="border:0; color:#f6931f; font-weight:bold;">
                            <input type="hidden" id="amount_r"
                                   value="@if(!empty($_GET['price'])){{ $_GET['price'] }}@endif"
                                   slider-min="@if(!empty($_GET['price'])){{ $price[0] }}@else {{ Helper::minPrice() }} @endif"
                                   slider-max="@if(!empty($_GET['price'])){{ $price[1] }} @else {{ Helper::maxPrice() }}@endif"
                                   name="price_range">
                            <button type="submit" class="float-right btn btn-sm btn-primary">Filter</button>
                        </div>
                    </div>


                @if(count($brands)>0)
                    <!-- Brands Start -->
                        <div class="border-bottom mb-5 pb-4">
                            <h5 class="font-weight-semi-bold mb-4">Filter by brands</h5>
                            @if(!empty($_GET['brand']))
                                @php
                                    $filter_brands = explode(',',$_GET['brand'])
                                @endphp
                            @endif
                            @foreach($brands as  $brand)
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" @if(!empty($filter_brands) && in_array($brand->slug,$filter_brands)) checked
                                       @endif onchange="this.form.submit();" name="brand[]" value="{{ $brand->slug }}" class="custom-control-input"  id="{{ $brand->slug }}">
                                <label class="custom-control-label"  for="{{ $brand->slug }}">{{ $brand->title }}</label>
                                <span class="badge border font-weight-normal">{{ count($brand->products) }}</span>
                            </div>
                            @endforeach
                        </div>
                        <!-- Brands End -->
                @endif


                <!-- Size Start -->
                    <div class="mb-5">
                        <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                        @if(!empty($_GET['size']))
                            @php
                                $filter_sizes = explode(',',$_GET['size'])
                            @endphp
                        @endif
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" @if(!empty($_GET['size']) && in_array('S',$filter_sizes)) checked @endif name="size[]" value="S" id="sizes" onchange="this.form.submit();">
                            <label class="custom-control-label" for="sizes">Small</label>
                            <span class="badge border font-weight-normal">{{ \App\Models\Product::where(['status'=>'active','size'=>'S'])->count() }}</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" @if(!empty($_GET['size']) && in_array('M',$filter_sizes)) checked @endif name="size[]" value="M" id="sizem" onchange="this.form.submit();">
                            <label class="custom-control-label" for="sizem">Medium</label>
                            <span class="badge border font-weight-normal">{{ \App\Models\Product::where(['status'=>'active','size'=>'M'])->count() }}</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3" >
                            <input type="checkbox" class="custom-control-input"  @if(!empty($_GET['size']) && in_array('L',$filter_sizes)) checked @endif name="size[]" value="L" id="sizel" onchange="this.form.submit();">
                            <label class="custom-control-label" for="sizel">Large</label>
                            <span class="badge border font-weight-normal">{{ \App\Models\Product::where(['status'=>'active','size'=>'L'])->count() }}</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" @if(!empty($_GET['size']) && in_array('XL',$filter_sizes)) checked @endif name="size[]" value="XL" id="sizexl" onchange="this.form.submit();">
                            <label class="custom-control-label" for="sizexl">Extra Large</label>
                            <span class="badge border font-weight-normal">{{ \App\Models\Product::where(['status'=>'active','size'=>'XL'])->count() }}</span>
                        </div>
                    </div>
                    <!-- Size End -->
                </div>
                <!-- Shop Sidebar End -->


                <!-- Shop Product Start -->
                <div class="col-lg-9 col-md-12">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="dropdown ml-4">
                                    <select name="sortBy" onchange="this.form.submit();">
                                        <option value="">Default Sort</option>
                                        <option value="priceAsc"
                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceAsc') selected @endif>
                                            Price
                                            - Lower to Higher
                                        </option>
                                        <option value="priceDesc"
                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceDesc') selected @endif>
                                            Price - Higher to Lower
                                        </option>
                                        <option value="titleAsc"
                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleAsc') selected @endif>
                                            Alphabetical Ascending
                                        </option>
                                        <option value="titleDesc"
                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleDesc') selected @endif>
                                            Alphabetical Descending
                                        </option>
                                        <option
                                            value="discountAsc"
                                            @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='discountAsc') selected @endif>
                                            Discount - Lower to Higher
                                        </option>
                                        <option
                                            value="discountDesc"
                                            @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='discountDesc') selected @endif>
                                            Discount - Higher to Lower
                                        </option>

                                    </select>
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
        </form>
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


    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: parseInt($("#slider-range").attr("slider-min")),
                max: parseInt($("#slider-range").attr("slider-max")),
                values: [parseInt($("#amount_r").attr("slider-min")), parseInt($("#amount_r").attr("slider-max"))],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - " + "$" + ui.values[1]);
                    $("#amount").attr("slider-min", ui.values[0]);
                    $("#amount").attr("slider-max", ui.values[1]);
                    $("#amount_r").val(ui.values[0] + "-" + ui.values[1]);
                    $("#amount_r").attr("slider-min", ui.values[0]);
                    $("#amount_r").attr("slider-max", ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - " + "$" + $("#slider-range").slider("values", 1));
        });
    </script>
@endsection


