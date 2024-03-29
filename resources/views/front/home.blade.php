@extends('layouts.site')

@section('content')
    <!-- Slider Area -->
    @include('front.includes.slider')
    <!--/ End Slider Area -->

    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="https://via.placeholder.com/600x370" alt="#">
                        <div class="content">
                            <p>Man's Collectons</p>
                            <h3>Summer travel <br> collection</h3>
                            <a href="#">Discover Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="https://via.placeholder.com/600x370" alt="#">
                        <div class="content">
                            <p>Bag Collectons</p>
                            <h3>Awesome Bag <br> 2020</h3>
                            <a href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-12">
                    <div class="single-banner tab-height">
                        <img src="https://via.placeholder.com/600x370" alt="#">
                        <div class="content">
                            <p>Flash Sale</p>
                            <h3>Mid Season <br> Up to <span>40%</span> Off</h3>
                            <a href="#">Discover Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Small Banner -->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach ($main_categories as $index => $category)
                                    <li class="nav-item"><a
                                            class="nav-link @if ($index == 0) active @endif"
                                            data-toggle="tab" href="#{{ $category->slug }}"
                                            role="tab">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            @foreach ($main_categories as $index => $category)
                                <div class="tab-pane fade show @if ($index == 0) active @endif"
                                    id="{{ $category->slug }}" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">

                                            @foreach ($category->products as $product)
                                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="{{ route('product', $product->slug) }}">
                                                                <img class="default-img" src="{{ $product->photo }}"
                                                                    alt="#">
                                                                <img class="hover-img" src="{{ $product->photo }}"
                                                                    alt="#">
                                                            </a>
                                                            <div class="button-head">
                                                                <div class="product-action">
                                                                    <a data-toggle="modal" data-target="#exampleModal"
                                                                        title="Quick View" href="#"><i
                                                                            class=" ti-eye"></i><span>Quick
                                                                            Shop</span></a>
                                                                    <a title="Wishlist" href="#"><i
                                                                            class=" ti-heart "></i><span>Add to
                                                                            Wishlist</span></a>
                                                                    <a title="Compare" href="#"><i
                                                                            class="ti-bar-chart-alt"></i><span>Add to
                                                                            Compare</span></a>
                                                                </div>
                                                                <div class="product-action-2">
                                                                    <a title="Add to cart" class="add-to-cart"
                                                                        href="{{ route('add_to_cart', $product->slug) }}">Add
                                                                        to
                                                                        cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="product-details.html">{{ $product->title }}</a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span>{{ number_format($product->current_price) }}
                                                                    LE</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Midium Banner  -->
    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="https://via.placeholder.com/600x370" alt="#">
                        <div class="content">
                            <p>Man's Collectons</p>
                            <h3>Man's items <br>Up to<span> 50%</span></h3>
                            <a href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="https://via.placeholder.com/600x370" alt="#">
                        <div class="content">
                            <p>shoes women</p>
                            <h3>mid season <br> up to <span>70%</span></h3>
                            <a href="#" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Midium Banner -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Hot Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <span class="out-of-stock">Hot</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                                class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Black Sunglass For Women</a></h3>
                                <div class="product-price">
                                    <span class="old">$60.00</span>
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                                class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Women Hot Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <span class="new">New</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                                class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Awesome Pink Show</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                                class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Awesome Bags Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <section class="section free-version-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 offset-md-2 col-xs-12">
                    <div class="section-title mb-60">
                        <span class="text-white wow fadeInDown" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Eshop Free
                            Lite version</span>
                        <h2 class="text-white wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Currently You
                            are using free<br> lite Version of Eshop.</h2>
                        <p class="text-white wow fadeInUp" data-wow-delay=".6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Please,
                            purchase full version of the template to get all pages,<br> features and commercial license.
                        </p>

                        <div class="button">
                            <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank"
                                rel="nofollow" class="btn wow fadeInUp" data-wow-delay=".8s">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>On sale</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a></h4>
                                    <p class="price with-discount">$59</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$44</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$89</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Best Seller</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$65</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$33</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$77</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Top viewed</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$22</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$35</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July , 2020. Monday</p>
                            <a href="#" class="title">Sed adipiscing ornare.</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Man’s Fashion Winter Sale</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Women Fashion Festive</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop News -->
@endsection


@section('javascript')
    <script>
        //Add item To Cart
        const add_to_cart_btns = document.querySelectorAll('.add-to-cart');
        const shopping_list = document.querySelector('#shopping-list');

        add_to_cart_btns.forEach(add_to_cart => {
            add_to_cart.addEventListener('click',
                function send_to_cart(e) {
                    e.preventDefault();
                    false_url = this.getAttribute('href');
                    url = false_url.replace("http", "https")
                    $.ajax({
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        url: url,
                        success: function(data) {
                            console.log(data.cart_product)
                            $.notify(data.response, {
                                delay: 500,
                                timer: 2000,
                                animate: {
                                    enter: 'animated bounceIn',
                                    exit: 'animated bounceOut'
                                },
                                type: 'success',
                                newest_on_top: true,
                            }, );
                            console.log(data.cart_product.slug)
                            shopping_list.innerHTML += `<li class="header-cart-item">
                                                        <a href="/remove_from_cart/${data.cart_product.slug}"
                                                            class="remove remove-from-cart" title="Remove this item"><i
                                                                class="fa fa-remove"></i></a>
                                                        <a class="cart-img"
                                                            href="/product/${data.cart_product.slug}"><img
                                                                src="${data.cart_product.img}" alt="#"></a>
                                                        <h4><a
                                                                href="/product/${data.cart_product.slug}">${data.cart_product.product_name}</a>
                                                        </h4>
                                                        <p class="quantity">${data.cart_product.qty} - <span
                                                                class="amount">${parseFloat(data.cart_product.price) * parseFloat(data.cart_product.qty)} <b>LE</b></span>
                                                        </p>
                                                    </li>`;
                            remove_from_cart_btns = document.querySelectorAll('.remove-from-cart');
                            header_cart_item = document.querySelectorAll('.header-cart-item');
                            refresh_remove_btns();
                        }
                    });
                })
        });
        let destroy_from_cart = (index) => {

            $.ajax({
                type: 'Delete',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                url: remove_from_cart_btns[index].getAttribute('href'),
                success: function(data) {
                    header_cart_item[index].remove();
                    $.notify(data.response, {
                        delay: 500,
                        timer: 2000,
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        },
                        type: 'success',
                        newest_on_top: true,
                    }, );
                }
            })
        }

        // Remove Item From Cart
        let remove_from_cart_btns = document.querySelectorAll('.remove-from-cart');
        let header_cart_item = document.querySelectorAll('.header-cart-item');

        let refresh_remove_btns = () => {
            remove_from_cart_btns.forEach((remove_from_cart, index) => {
                remove_from_cart.addEventListener('click', function(e) {
                    e.preventDefault();
                    destroy_from_cart(index);
                })
            });
        }
        refresh_remove_btns();
    </script>
@endsection
