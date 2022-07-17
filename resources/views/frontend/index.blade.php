@extends('frontend.layouts.master')


@section('content')
    <div class="main-content">


        @if(count($banners)>0)
            <div id="carouselExampleIndicators" class="carousel slide main-slider" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="{{ $banners[0]->photo }}" class="d-block w-100" style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{ $banners[0]->description }}</h3>
                            <p>
                                <a href="{{$banners[0]->slug}}" class="btn btn-primary slider-link">
                                    See More
                                </a>
                            </p>
                        </div>
                    </div>
                    @foreach($banners as $value => $banner)
                        @if($value>0)
                            <div class="carousel-item ">
                                <img src="{{ $banner->photo }}" class="d-block w-100" style="height: 600px">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>{{ $banner->description }}</h3>
                                    <p>
                                        <a href="{{$banner->slug}}" class="btn btn-primary slider-link">
                                            See More
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        @endif



    <!-- Carousel -->


        <div class="top-body pt-4 pb-4">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card card-body single-top-link" onclick="location.href='login.html'">
                            <h4>Sign In</h4>
                            <i class="fa fa-sign-in-alt"></i>
                            <p>
                                Sign In To Start Sharing Your Books
                            </p>
                        </div> <!-- Single Item -->
                    </div> <!-- Single Col -->

                    <div class="col-md-3">
                        <div class="card card-body single-top-link" onclick="location.href='register.html'">
                            <h4>Create New</h4>
                            <i class="fa fa-user"></i>
                            <p>
                                Create New Account
                            </p>
                        </div> <!-- Single Item -->
                    </div> <!-- Single Col -->

                    <div class="col-md-3">
                        <div class="card card-body single-top-link">
                            <h4>Borrow Book</h4>
                            <i class="fa fa-cart-plus"></i>
                            <p>
                                Borrow your needed books
                            </p>
                        </div> <!-- Single Item -->
                    </div> <!-- Single Col -->

                    <div class="col-md-3">
                        <div class="card card-body single-top-link">
                            <h4>Top Searched</h4>
                            <i class="fa fa-search"></i>
                            <p>
                                Top Searched Book Lists
                            </p>
                        </div> <!-- Single Item -->
                    </div> <!-- Single Col -->

                </div>
            </div>
        </div>
        <!-- End Top Body Links -->
        <!-- Categories Container-->
        @if(count($categories))

            <div class="cat-list">
                <div class="container px-4 py-2" id="custom-cards">
                    <h2 class="pb-2 border-bottom">Categories</h2>

                    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                        @foreach($categories as $cat)
                            <div class="col-md-4">
                                <div
                                    class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg"
                                    style="background-image: url('{{ $cat->photo }}');">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                        <h2
                                            class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $cat->title}}</h2>

                                        <a href="{{route('product.category',$cat->slug)}}"
                                           class="icon-link d-inline-flex align-items-center">
                                            See
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

    @endif
    <!-- End Categories Container -->


        <div class="advance-search">
            <div class="container">
                <h3>Advance Search</h3>
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Book Title/Description</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Book Title/Description">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Book Author">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Publication</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Book Publication">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Book Category</label>
                                <select class="form-control">
                                    <option>Select a category</option>
                                    <option>Java Programming</option>
                                    <option>C Programming</option>
                                    <option>C++ Programming</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success btn-lg" name="">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="book-list-sidebar">
            <div class="container">
                <div class="row">

                    <div class="col-md-9">
                        <h3>Recent Uploaded Books</h3>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="single-book">
                                    <img src="assets/images/books/book.jpg" alt="">
                                    <div class="book-short-info">
                                        <h5>Java Programming</h5>
                                        <p>
                                            <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                                        </p>
                                        <a href="book-view.html" class="btn btn-outline-primary"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i>
                                            Wishlist</a>

                                    </div>
                                </div>
                            </div> <!-- Single Book Item -->
                            <div class="col-md-4">
                                <div class="single-book">
                                    <img src="assets/images/books/book2.jpg" alt="">
                                    <div class="book-short-info">
                                        <h5>C Programming</h5>
                                        <p>
                                            <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                                        </p>
                                        <a href="book-view.html" class="btn btn-outline-primary"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i>
                                            Wishlist</a>

                                    </div>
                                </div>
                            </div> <!-- Single Book Item -->

                            <div class="col-md-4">
                                <div class="single-book">
                                    <img src="assets/images/books/book1.jpg" alt="">
                                    <div class="book-short-info">
                                        <h5>C++ Programming</h5>
                                        <p>
                                            <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                                        </p>
                                        <a href="book-view.html" class="btn btn-outline-primary"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i>
                                            Wishlist</a>

                                    </div>
                                </div>
                            </div> <!-- Single Book Item -->
                            <div class="col-md-4">
                                <div class="single-book">
                                    <img src="assets/images/books/book3.jpg" alt="">
                                    <div class="book-short-info">
                                        <h5>Java Programming</h5>
                                        <p>
                                            <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                                        </p>
                                        <a href="book-view.html" class="btn btn-outline-primary"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i>
                                            Wishlist</a>

                                    </div>
                                </div>
                            </div> <!-- Single Book Item -->
                            <div class="col-md-4">
                                <div class="single-book">
                                    <img src="assets/images/books/book4.jpg" alt="">
                                    <div class="book-short-info">
                                        <h5>Java Programming</h5>
                                        <p>
                                            <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                                        </p>
                                        <a href="book-view.html" class="btn btn-outline-primary"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i>
                                            Wishlist</a>

                                    </div>
                                </div>
                            </div> <!-- Single Book Item -->


                        </div>

                        <div class="books-pagination mt-5">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                  <span class="page-link">
                    2
                    <span class="sr-only">(current)</span>
                  </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div> <!-- Book List -->

                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="mb-2 border-bottom pb-3">
                                Categories
                            </h5>

                            <div class="list-group mt-3">
                                <a href="#" class="list-group-item list-group-item-action">
                                    Programming
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Arts</a>
                                <a href="#" class="list-group-item list-group-item-action">Banking</a>
                                <a href="#" class="list-group-item list-group-item-action">Others</a>
                            </div>

                        </div> <!-- Single Widget -->

                    </div> <!-- Sidebar -->

                </div>
            </div>
        </div>
    </div>
@endsection
