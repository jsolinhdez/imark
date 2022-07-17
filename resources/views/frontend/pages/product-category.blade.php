@extends('frontend.layouts.master')

@section('content')




    @if(count($categories->products)>0)
        <div class="main-content p-4">
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach($categories->products as $item)

                    <div class="col-md-3">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">{{$item->title}}</h4>
                            </div>
                            <div class="card-body">
                                <img src="{{ $item->photo }}">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>{{ $item->description }}</li>
                                </ul>
                                <h5 class="card-title pricing-card-title">${{number_format($item->offer_price,2)}}
                                    <small>
                                        <del class="text-danger fw-light">/${{number_format($item->price,2)}}</del>
                                    </small></h5>
                                <button type="button" class="w-100 btn btn-lg btn-outline-primary">Buy now</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No products Found</p>
    @endif
@endsection
