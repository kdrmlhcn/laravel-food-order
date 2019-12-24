@extends('frontend.layouts.app')
@section('content')
    <section class="section-product-categories">
        <h3 class="pre-title">
            <span>CHECKOUT PAGE</span>
        </h3>
    </section>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ count((array) session('cart')) }}</span>
            </h4>
            <ul class="list-group mb-3">
                <?php $total = 0 ?>
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)

                        <?php $total += $details['price'] * $details['quantity'] ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $details['name'] }} x {{ $details['quantity'] }}</h6>
                                </div>
                                <span class="text-muted">{{ $details['price'] * $details['quantity'] }} ₺</span>
                            </li>
                    @endforeach
                @endif
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (₺)</span>
                    <strong>{{ $total }} ₺</strong>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="{{ route('frontend.checkoutStore') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="order_total" value="{{ $total }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" placeholder="mail@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone">Phone </label>
                        <input type="phone" class="form-control" name="phone" placeholder="0532 168 50 17">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="text">Order Comment <small class="text-muted">(Optional)</small></label>
                    <input type="text" class="form-control" name="comment" placeholder="Write order comment">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    @foreach($paymentTypes as $key => $paymentType)
                    <div class="custom-control custom-radio">
                        <input id="credit[{{$key}}]" name="payment_type" value="{{ $key }}" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="credit[{{$key}}]">{{ $paymentType }}</label>
                    </div>
                    @endforeach
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-block col-md-3" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
@endsection
