@extends('layouts.site')

@section('content')
    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 style="font-weight: normal">Your search about <b>'{{ $search }}'</b> resault:
                            ({{ $products->count() }})</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="row">

                            @foreach ($products as $product)
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('product', $product->slug) }}">
                                                <img class="default-img" src="{{ $product->photo }}" alt="#">
                                                <img class="hover-img" src="{{ $product->photo }}" alt="#">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                        href="#"><i class=" ti-eye"></i><span>Quick
                                                            Shop</span></a>
                                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                            Wishlist</span></a>
                                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                            Compare</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" class="add-to-cart"
                                                        href="/add_to_cart/{{ $product->slug }}">Add to
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
            </div>
        </div>
    </div>
    <!-- End Product Area -->

@endsection

@section('javascript')
    <script>
        const add_to_cart_btns = document.querySelectorAll('.add-to-cart');

        add_to_cart_btns.forEach(add_to_cart => {
            add_to_cart.addEventListener('click',
                function send_to_cart(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'GET',
                        url: this.getAttribute('href'),
                        success: function(data) {
                            $.notify(data.response, {
                                delay: 1000,
                                timer: 1500,
                                animate: {
                                    enter: 'animated bounceIn',
                                    exit: 'animated bounceOut'
                                },
                                type: 'danger',
                                newest_on_top: true,
                            }, );
                        }
                    });
                })
        });
    </script>
@endsection
