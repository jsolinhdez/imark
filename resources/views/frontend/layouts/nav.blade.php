<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="https://www.facebook.com/julioalejandro.hernandezlopez.9">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="https://twitter.com/jsolinhdez">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="https://www.linkedin.com/in/julio-alejandro-hernandez-a57ba9241/">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="https://www.instagram.com/solin.hdez/?hl=es">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="https://www.youtube.com/channel/UCt4bCCKcngtFr-wxW12bzFQ">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">i</span>MarK</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <div class="btn border cart-list">

                <a class="nav-link  dropdown-toggle py-0" data-toggle="dropdown"
                   aria-expanded="false">
                    <i class="fas fa-shopping-cart text-primary"></i>

                    <span
                        class="badge">{{ \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count() }}</span>
                </a>
                <ul class="dropdown-menu rounded-0 m-0">
                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                        <li >
                            <div class="dropdown-item cart-item-desc d-flex align-items-center border">
                                <a href="{{ route('product.detail',$item->model->slug) }}"><img src="{{ $item->model->photo }}" class="item-tumb" alt="item-image" >
                                </a>
                                <div>
                                    <a href="{{ route('product.detail',$item->model->slug) }}">{{ $item->name }}</a>
                                    <p>{{ $item->qty }} x - <span
                                            class="price-cart">$ {{ number_format($item->price,2) }}</span></p>
                                </div>
                                <span class="m-lg-2 cart_delete" data-id="{{$item->rowId}}" href=""><i class="icon-trash "  ></i></span>
                            </div>
                        </li>
                        <hr>
                    @endforeach
                    <div class="cart-calc">
                        <li class="dropdown-item subtotal">
                            <span >Sub Total:  </span>
                            <span class="price">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span>
                        </li>
{{--                        <li class="dropdown-item">--}}
{{--                            <span >Shipping:  </span>--}}
{{--                            <span >$50.00  </span>--}}
{{--                        </li>--}}
                        <li class="dropdown-item total">
                            <span >Total:  </span>
                            <span class="price">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span>
                        </li>

                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary btn-block border-0 py-3 " type="submit">Checkout</button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid ">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 collapsed"
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories </h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav
                class="collapse navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden mb-2" style="height: auto">
                    @php
                        $cat_parent = \App\Models\Category::where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')->get();
                    @endphp

                    @foreach($cat_parent as $cat_p)
                        <a href="{{ route('product.category',$cat_p->slug) }}"
                           class="nav-item nav-link">{{ $cat_p->title }}</a>
                    @endforeach
                </div>


            </nav>


        </div>

        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                        <a href="shop.html" class="nav-item nav-link">Shop</a>
                        <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.html" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="user-area navbar py-0">
                        <div class="nav-item dropdown">
                            <div class="nav-link dropdown-toggle py-0" data-toggle="dropdown"
                                 aria-expanded="false">
                                @auth()
                                    <img class="user-image" src="{{ auth()->user()->photo }}" alt="user-image">
                                @else
                                    <img class="user-image" src="{{ Helper::userDefaultImage() }}" alt="user-avatar">
                                @endauth
                            </div>
                            <ul class="dropdown-menu rounded-0 m-0">

                                @auth
                                    @php
                                        $first = explode(' ',auth()->user()->full_name);
                                    @endphp
                                    <li><h6 class="dropdown-item">Hello, <strong>{{ $first[0] }}</strong>
                                        </h6></li>
                                    <li><a class="dropdown-item" href="{{route('user.dashboard')}}">My Account</a></li>

                                    <li><a class="dropdown-item" href="{{ route('user.order') }}">Ordered List</a></li>
                                    <li><a class="dropdown-item" href="cart.html">Wishing List</a></li>

                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}"><i
                                                class="icon-logout mr-2"></i>Logout</a></li>
                                @else

                                    <li><a class="dropdown-item" href="{{ route('user.auth') }}">Login & Register</a>
                                    </li>

                                @endauth
                            </ul>
                        </div>

                    </div>
                </div>
            </nav>


        </div>
    </div>
</div>
<!-- Navbar End -->
