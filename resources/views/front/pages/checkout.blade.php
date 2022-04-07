@extends('layouts.site')
@section('content')
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-form">
                        <h2>Make Your Checkout Here</h2>
                        <p>Please choose your address</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                            Add Address
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="margin: 5% auto; width: fit-content" role="document">
                                <div class="modal-content">
                                    <div class="modal-header p-3" style="position: unset;">
                                        <h4 class="modal-title" style="align-self:centre; margin:auto;"
                                            id="exampleModalLabel">Add Adress</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body" style="height: auto; min-height: 260px">
                                        <form class="form p-5" id="address_form" method="post"
                                            action="{{ route('add_address') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Name<span>*</span></label>
                                                        <input type="text" name="name" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Country<span>*</span></label>
                                                        <select name="country_name" id="country" style="display: none;">
                                                            <option value="Egypt">Afghanistan</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                        </select>
                                                        <div class="nice-select" tabindex="0">
                                                            <span class="current">Egypt</span>
                                                            <ul class="list">
                                                                <li data-value="Egypt" class="option">Egypt</li>
                                                                <li data-value="Saudi Arabia" class="option">Saudi
                                                                    Arabia</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Address Line <span>*</span></label>
                                                        <input type="text" name="description" placeholder=""
                                                            required="required">
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" form="address_form" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Adresses -->
                        @if ($addresses->count() > 0)
                            @foreach ($addresses as $address)
                                <label for="address{{ $address->id }}" style="display: block">
                                    <div class="card col-10">
                                        <input type="radio" class="form-check-input align-self-end mt-3 "
                                            id="address{{ $address->id }}" name="address" value="{{ $address->id }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $address->name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $address->country }}</h6>
                                            <p class="card-text">{{ $address->description }}</p>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        @else
                            <p>You need to add deleviry address first.</p>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>CART TOTALS</h2>
                            <div class="content">
                                <ul>
                                    <li>Sub Total<span>{{ $total }} <b>LE</b></span></li>
                                    <li>(+) Shipping<span>free</span></li>
                                    <li class="last">Total<span>{{ $total }} <b>LE</b></span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Payments</h2>
                            <div class="content">
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox">
                                        Check Payments</label>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash
                                        On Delivery</label>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">
                                        PayPal</label>
                                </div>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Payment Method Widget -->
                        <div class="single-widget payement">
                            <div class="content">
                                <img src="images/payment-method.png" alt="#">
                            </div>
                        </div>
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <a href="#" class="btn">proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Checkout -->
@endsection
