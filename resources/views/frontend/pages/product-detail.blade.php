@extends('frontend.layouts.master')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @php
                            $photos = explode(',',$product->photo);
                        @endphp
                        @foreach($photos as $key => $photo)
                            <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
                                <a class="gallery-image" href="#" title="{{ $product->title }}">
                                    <img class="w-100" src="{{ $photo }}" alt="{{$product->title}}"
                                         style="height: 400px">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <ol class="carousel-indicators">
                        @php
                            $photos = explode(',',$product->photo);
                        @endphp
                        @foreach($photos as $key => $photo)
                            <li class="{{$key==0 ? 'active' : ''}}" data-target="#product-carousel"
                                data-slide-to="{{$key}}"
                                style="background-image: url({{$photo}});height: 100px;width: 80px;background-size: cover">

                            </li>
                        @endforeach
                    </ol>
                    {{--                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">--}}
                    {{--                        <i class="fa fa-2x fa-angle-left text-dark"></i>--}}
                    {{--                    </a>--}}
                    {{--                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">--}}
                    {{--                        <i class="fa fa-2x fa-angle-right text-dark"></i>--}}
                    {{--                    </a>--}}
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ ucfirst($product->title) }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h6>${{number_format($product->offer_price,2)}}
                    <span class="text-muted ml-2">
                    <del class="text-danger fw-light">
                        ${{number_format($product->price,2)}}</del>
                </span></h6>
                <p class="mb-4">{!! html_entity_decode($product->summary) !!} </p>
                {{--                <div class="d-flex mb-3">--}}
                {{--                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>--}}
                {{--                    <form>--}}
                {{--                        <div class="custom-control custom-radio custom-control-inline">--}}
                {{--                            <input type="radio" class="custom-control-input" id="size-1" name="size">--}}
                {{--                            <label class="custom-control-label" for="size-1">XS</label>--}}
                {{--                        </div>--}}
                {{--                        <div class="custom-control custom-radio custom-control-inline">--}}
                {{--                            <input type="radio" class="custom-control-input" id="size-2" name="size">--}}
                {{--                            <label class="custom-control-label" for="size-2">S</label>--}}
                {{--                        </div>--}}
                {{--                        <div class="custom-control custom-radio custom-control-inline">--}}
                {{--                            <input type="radio" class="custom-control-input" id="size-3" name="size">--}}
                {{--                            <label class="custom-control-label" for="size-3">M</label>--}}
                {{--                        </div>--}}
                {{--                        <div class="custom-control custom-radio custom-control-inline">--}}
                {{--                            <input type="radio" class="custom-control-input" id="size-4" name="size">--}}
                {{--                            <label class="custom-control-label" for="size-4">L</label>--}}
                {{--                        </div>--}}
                {{--                        <div class="custom-control custom-radio custom-control-inline">--}}
                {{--                            <input type="radio" class="custom-control-input" id="size-5" name="size">--}}
                {{--                            <label class="custom-control-label" for="size-5">XL</label>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                {{--                --}}
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>

            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{!! html_entity_decode($product->description) !!}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                            invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                            consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam.
                            Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos
                            dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                            nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt
                            tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                         style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum
                                            et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->



    @if(count($product->rel_prods)>0)
        <!-- Products Start -->
        <div class="container-fluid py-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel" data-ride="carousel">
                        @foreach($product->rel_prods as $item)
                            @if($item->id != $product->id)
                                <div class="card product-item border-0">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ $item->condition }} !</span>

                                        @php
                                            $photosc = explode(',',$item->photo);
                                        @endphp
                                        <img class="img-fluid" src="{{ $photosc[0] }}" alt="{{ $item->title }}">

                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ ucfirst($item->title) }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h5>${{number_format($item->offer_price,2)}}</h5>
                                            <h6 class="text-muted ml-2">
                                                <del class="text-danger fw-light">
                                                    ${{number_format($item->price,2)}}</del>
                                            </h6>
                                        </div>
                                        <p>{{ ucfirst( \App\Models\Brand::where('id',$item->brand_id)->value('title'))  }}</p>

                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ route('product.detail',$item->slug) }}"
                                           class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View
                                            Detail</a>
                                        <a href="" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Products End -->
    @endif
@endsection
