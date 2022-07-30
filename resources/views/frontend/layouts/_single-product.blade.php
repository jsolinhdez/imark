    @foreach($products as $item)
        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div
                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    @php
                        $photos = explode(',',$item->photo);
                    @endphp
                    @php
                        $pho = explode('com',$photos[0]);
                    @endphp
                    <img class="img-fluid w-100" src="{{ $pho[1]  }}" alt="">
                </div>

                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ $item->condition }} !</span>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h3 class="text-truncate mb-3">{{ucfirst($item->title)}}</h3>
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
                    <a href="" data-quantity="1" id="add_to_cart{{$item->id}}" data-product-id="{{$item->id}}" class="add_to_cart btn btn-sm text-dark p-0"><i
                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    <a href="javascript:void(0);"
                    class="btn btn-sm text-dark p-0 add_to_wishlist" data-quantity="1" data-id="{{ $item->id }}" id="add_to_wishlist_{{ $item->id }}"><i
                        class="fas fa-heart text-primary mr-1 " ></i>Add to wishlist</a>
                    <a href="{{ route('product.detail',$item->slug) }}"
                       class="btn btn-sm text-dark p-0"><i
                            class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                </div>
            </div>
        </div>
    @endforeach

