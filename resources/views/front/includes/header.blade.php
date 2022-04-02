<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> Store location</li>
                            <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
                            <li><i class="ti-user"></i> <a href="#">My account</a></li>
                            <li><i class="ti-power-off"></i><a href="login.html#">Login</a></li>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                @csrf
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form id="search-form" action="{{ route('home') }}" method="GET">
                                <select name="category">
                                    <option
                                        @if (isset($category_id)) @if ($category_id != 0) @else selected="selected" @endif
                                        @endif value='0'>All Category</option>
                                    @foreach ($main_categories as $category)
                                        <option
                                            @if (isset($category_id)) @if ($category_id == $category->id) selected='selected' @endif
                                            @endif value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if (isset($search))
                                    <input name="search" placeholder="Search Products Here....."
                                        value="{{ $search }}" type="search">
                                @else
                                    <input name="search" placeholder="Search Products Here....." type="search">
                                @endif
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{ route('get_cart') }}" class="single-icon"><i class="ti-bag"></i>
                                <span class="total-count">{{ $cart->cart_product_count }}</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{ $cart->cart_product_count }} Items</span>
                                    <a href="{{ route('get_cart') }}">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    @foreach ($cart->cart_product as $product)
                                        <li class="header-cart-item">
                                            <a href="/remove_from_cart/{{ $product->product->slug }}"
                                                class="remove remove-from-cart" title="Remove this item"><i
                                                    class="fa fa-remove"></i></a>
                                            <a class="cart-img"
                                                href="{{ route('product', $product->product->slug) }}"><img
                                                    src="{{ $product->product->photo }}" alt="#"></a>
                                            <h4><a
                                                    href="{{ route('product', $product->product->slug) }}">{{ $product->product->title }}</a>
                                            </h4>
                                            <p class="quantity">{{ $product->qty }} - <span
                                                    class="amount">${{ $product->product->current_price * $product->qty }}</span>
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="all-category">
                            <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                            <ul class="main-category">

                                @foreach ($main_categories as $category)
                                    <li><a href="#">{{ $category->name }}
                                            @if ($category->subCategories->count())
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <ul class="sub-category">
                                            @foreach ($category->subCategories as $sub)
                                                <li><a href="#">{{ $sub->name }}
                                                        @if ($sub->sub_sub_categories->count())
                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="sub-sub-category">
                                                        @foreach ($sub->sub_sub_categories as $subSub)
                                                            <li><a href="#">{{ $subSub->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    </a>
                                            @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            </a>
                            @endif
                            </li>
                            @endforeach
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="#">Product</a></li>
                                            <li><a href="#">Service</a></li>
                                            <li><a href="#">Shop<i class="ti-angle-down"></i><span
                                                        class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a></li>
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
