@extends('frontend.layouts.master')

@section('content')


    @if(count($banners)>0)
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($banners as $value => $banner)
                    @php
                        $phob = explode('com',$banner->photo);
                    @endphp
                    <div class="carousel-item {{ $value==0 ? 'active' : ''}}" style="height: 410px;">
                        <img class="img-fluid" src="{{ $phob[1] }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $banner->description }}</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{$banner->title}}</h3>
                                <a href="{{ $banner->slug }}" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    @endif
    <!-- Featured Start -->
    <div class="container-fluid pt-3">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    @if(count($categories))
        <!-- Categories Start -->
        <div class="container-fluid pt-3">
            <div class="row px-xl-5 pb-3">
                @foreach($categories as $cat)
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            <p class="text-right">Products:
                                <strong>{{ count(\App\Models\Product::where(['cat_id'=>$cat->id,'status'=>'active'])->get()) }}</strong>
                            </p>
                            <a href="{{route('product.category',$cat->slug)}}"
                               class="cat-img position-relative overflow-hidden mb-3">
                                @php
                                    $photosc = explode(',',$cat->photo);
                                @endphp
                                @php
                                    $phoc = explode('com',$photosc[0]);
                                @endphp
                                <img class="img-fluid" src="{{ $phoc[1] }}" alt="Product-image" style="width: 300px;height: 350px">
                            </a>
                            <h5 class="font-weight-semi-bold m-0">{{ ucfirst($cat->title) }}</h5>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- Categories End -->
    @endif

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="frontend/img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="frontend/img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    @php
        $new_products = \App\Models\Product::where(['status'=>'active','condition'=>'new'])->orderBy('id','DESC')->limit('6')->get();
    @endphp
    @if(count($new_products)>0)
        <!-- Products Start -->
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">
                @foreach($new_products as $nproduct)
                    <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            @php
                                $photosp = explode(',',$nproduct->photo);
                            @endphp
                            @php
                                $phop = explode('com',$photosp[0]);
                            @endphp
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{$phop[1]}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square add_to_cart" data-quantity="1"
                                       id="add_to_cart{{$nproduct->id}}"
                                       data-product-id="{{$nproduct->id}}" href=""><i
                                            class="fa fa-shopping-cart"></i></a>


                                    <a class="btn btn-outline-dark btn-square add_to_wishlist" data-quantity="1"
                                       data-id="{{ $nproduct->id }}" id="add_to_wishlist_{{ $nproduct->id }}"
                                       href="javascript:void(0);"><i
                                            class="far fa-heart"></i></a>


                                    <a class="btn btn-outline-dark btn-square"
                                       href="{{ route('product.detail',$nproduct->slug) }}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate add_to_wishlist"
                                   id="add_to_wishlist_{{ $nproduct->id }} data-id="{{ $nproduct->id }}"
                                data-quantity="1" href="{{route('product.detail',$nproduct->slug)}}
                                ">{{ ucfirst($nproduct->title) }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ number_format($nproduct->offer_price,2) }}</h5>
                                    <h6 class="text-muted ml-2">
                                        <del>{{ number_format($nproduct->price,2) }}</del>
                                    </h6>
                                </div>
                                <p>{{ ucfirst( \App\Models\Brand::where('id',$nproduct->brand_id)->value('title'))  }}</p>

{{--                                <div class="d-flex align-items-center justify-content-center mb-1">--}}
{{--                                    <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                    <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                    <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                    <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                    <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                    <small>(99)</small>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">--}}
                    {{--                        <div class="card product-item border-0 mb-4">--}}
                    {{--                            <div--}}
                    {{--                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">--}}
                    {{--                                @php--}}
                    {{--                                    $photosp = explode(',',$nproduct->photo);--}}
                    {{--                                @endphp--}}
                    {{--                                <img class="img-fluid w-100" src="{{$photosp[0]}}" alt="">--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">--}}
                    {{--                                <a class="product-title"--}}
                    {{--                                   href="{{route('product.detail',$nproduct->slug)}}">{{ ucfirst($nproduct->title) }}</a>--}}
                    {{--                                <div class="d-flex justify-content-center">--}}
                    {{--                                    <h5>{{ number_format($nproduct->offer_price,2) }}</h5>--}}
                    {{--                                    <h6 class="text-muted ml-2">--}}
                    {{--                                        <del class="text-danger">{{ number_format($nproduct->price,2) }}</del>--}}
                    {{--                                    </h6>--}}
                    {{--                                </div>--}}
                    {{--                                <p>{{ ucfirst( \App\Models\Brand::where('id',$nproduct->brand_id)->value('title'))  }}</p>--}}

                    {{--                            </div>--}}
                    {{--                            <div class="card-footer d-flex justify-content-between bg-light border">--}}
                    {{--                                <a href="{{ route('product.detail',$nproduct->slug) }}"--}}
                    {{--                                   class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View--}}
                    {{--                                    Detail</a>--}}

                    {{--                                <a href="javascript:void(0);"--}}
                    {{--                                   class="btn btn-sm text-dark p-0 add_to_wishlist" data-quantity="1"--}}
                    {{--                                   data-id="{{ $nproduct->id }}" id="add_to_wishlist_{{ $nproduct->id }}"><i--}}
                    {{--                                        class="fas fa-heart text-primary mr-1 "></i>Add to wishlist</a>--}}
                    {{--                                <a href="" data-quantity="1" id="add_to_cart{{$nproduct->id}}"--}}
                    {{--                                   data-product-id="{{$nproduct->id}}" class="add_to_cart btn btn-sm text-dark p-0"><i--}}
                    {{--                                        class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                @endforeach
            </div>
        </div>
        <!-- Products End -->
    @endif
    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod
                        duo
                        labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->






    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Ours Brands</span></h2>
            <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod
                duo
                labore labore.</p>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="frontend/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
                    $('#add_to_cart' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function () {
                    $('#add_to_cart' + product_id).html('<i class="fa fa-cart-plus"></i>');
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
                    $('#add_to_wishlist_' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function () {
                    $('#add_to_wishlist_' + product_id).html('<i class="fas fa-hand-holding-heart"></i>');
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
