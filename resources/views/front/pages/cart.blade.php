@extends('layouts.site')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->cart_product as $product)
                                <tr class="product-tr">
                                    <td class="image" data-title="No"><img src="{{ $product->product->photo }}"
                                            alt="#">
                                    </td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a
                                                href="/product/{{ $product->product->slug }}">{{ $product->product->title }}</a>
                                        </p>
                                        <p class="product-des">{!! Str::limit($product->product->description, 30) !!}</p>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <span>{{ number_format($product->product->current_price, 2, '.', ',') }}
                                        </span>
                                    </td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                    data-type="minus" data-field="quant[{{ $product->id }}]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[{{ $product->id }}]" class="input-number"
                                                data-min="1" data-max="100" value="{{ $product->qty }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                    data-field="quant[{{ $product->id }}]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount total-price" data-title="Total">
                                        <span>{{ number_format($product->qty * $product->product->current_price, 2, '.', ',') }}</span>
                                    </td>
                                    <input type="hidden" class="old-total-price" data-title="Total"
                                        value="{{ number_format($product->qty * $product->product->old_price, 2, '.', ',') }}">

                                    <td class="action" data-title="Remove">
                                        <a href="/remove_from_cart/{{ $product->product->slug }}"
                                            class="remove remove-from-cart remove-item-cart" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">
                                            Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span id="subtotal">$</span></li>
                                        <li>Shipping<span id="shipping">Free</span></li>
                                        <li>You Save<span id="saving">$</span></li>
                                        <li class="last">You Pay<span class="total-cart">$310.00</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('get_checkout') }}" class="btn">Checkout</a>
                                        <a href="#" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const calc_total = () => {
            let total_price = 0;
            let totals = document.querySelectorAll('.total-price');
            totals.forEach(total => {
                total = total.textContent.replace(',', '')
                total_price += parseFloat(total);
            });
            const sub_total = document.querySelector('#subtotal');
            sub_total.innerHTML = total_price + ' <b>LE</b>';

            let old_total_price = 0;
            let old_totals = document.querySelectorAll('.old-total-price');
            old_totals.forEach(old_total => {
                old_total = old_total.value.replace(',', '')
                old_total_price += parseFloat(old_total);
            });
            const saving = document.querySelector('#saving');
            saving.innerHTML = (parseFloat(old_total_price) - parseFloat(total_price)) + ' <b>LE</b>';

            const total_cart = document.querySelectorAll('.total-cart');
            const shipping = document.querySelector('#shipping');
            total_cart.forEach(total_cart_element => {
                total_cart_element.innerHTML = total_price + ' <b>LE</b>';
            })

        }

        document.addEventListener('DOMContentLoaded', function() {
            calc_total();
        }, false);;


        // Remove Item From Cart
        let remove_from_cart_btns = document.querySelectorAll('.remove-item-cart');
        const product_tr = document.querySelectorAll('.product-tr');
        let real_index = 0;

        remove_from_cart_btns.forEach((remove_from_cart, index) => {
            remove_from_cart.addEventListener('click',
                function destroy_from_cart(e) {
                    e.preventDefault();

                    // const new_index = remove_from_cart_btns.length - 1
                    // if (new_index % 2 == 0) {
                    //     real_index = index - (new_index / 2);
                    // } else {
                    //     real_index = index - ((new_index - 1) / 2);
                    // }

                    // console.log(new_index);
                    // console.log(index);
                    // console.log(real_index);

                    $.ajax({
                        type: 'delete',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        url: this.getAttribute('href'),
                        success: function(data) {
                            product_tr[index].remove();
                            calc_total();
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
                    });
                })
        });
    </script>
@endsection
