@extends('frontend.layouts.layout')

@section('content')
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step"><a href="cart.html">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step active"><a href="checkout.html">2. Checkout</a></h3>
            <h3 class="title title-simple title-step"><a href="order.html">3. Order Complete</a></h3>
        </div>
        <div class="container mt-7">
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Returning customer?</span>
                    <a href="#alert-body1" class="text-primary collapse">Click here to login</a>
                </div>
                <div class="alert-body collapsed" id="alert-body1">
                    <p>If you have shopped with us before, please enter your details below.
                        If you are a new customer, please proceed to the Billing section.</p>
                    <div class="row cols-md-2">
                        <form class="mb-4 mb-md-0">
                            <label for="username">Username Or Email *</label>
                            <input type="text" class="input-text form-control mb-0" name="username"
                                   id="username" autocomplete="username">
                        </form>
                        <form class="mb-4 mb-md-0">
                            <label for="password">Password *</label>
                            <input class="input-text form-control mb-0" type="password" name="password"
                                   id="password" autocomplete="current-password">
                        </form>
                    </div>
                    <div class="checkbox d-flex align-items-center justify-content-between">
                        <div class="form-checkbox pt-0 mb-0">
                            <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                   name="signin-remember" />
                            <label class="form-control-label" for="signin-remember">Remember
                                Me</label>
                        </div>
                        <a href="#" class="lost-link">Lost your password?</a>
                    </div>
                    <div class="link-group">
                        <a href="#" class="btn btn-dark btn-rounded mb-4">Login</a>
                        <span class="d-inline-block text-body font-weight-semi-bold">or Login With</span>
                        <div class="social-links mb-4">
                            <a href="#" class="social-link social-google fab fa-google"></a>
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Have a coupon?</span>
                    <a href="#alert-body2" class="text-primary">Click here to enter your code</a>
                </div>
                <div class="alert-body collapsed" id="alert-body2">
                    <p>If you have a coupon code, please apply it below.</p>
                    <div class="check-coupon-box d-flex">
                        <input type="text" name="coupon_code"
                               class="input-text form-control text-grey ls-m mr-4 mb-4" id="coupon_code" value=""
                               placeholder="Coupon code">
                        <button type="submit" class="btn btn-dark btn-rounded btn-outline mb-4">Apply
                            Coupon</button>
                    </div>
                </div>
            </div>
            <form action="#" class="form">
                <div class="row">
                    <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                        <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>First Name *</label>
                                <input type="text" class="form-control" name="first-name" required="" />
                            </div>
                            <div class="col-xs-6">
                                <label>Last Name *</label>
                                <input type="text" class="form-control" name="last-name" required="" />
                            </div>
                        </div>
                        <label>Company Name (Optional)</label>
                        <input type="text" class="form-control" name="company-name" required="" />
                        <label>Country / Region *</label>
                        <div class="select-box">
                            <select name="country" class="form-control">
                                <option value="us" selected>United States (US)</option>
                                <option value="uk"> United Kingdom</option>
                                <option value="fr">France</option>
                                <option value="aus">Austria</option>
                            </select>
                        </div>
                        <label>Street Address *</label>
                        <input type="text" class="form-control" name="address1" required=""
                               placeholder="House number and street name" />
                        <input type="text" class="form-control" name="address2" required=""
                               placeholder="Apartment, suite, unit, etc. (optional)" />
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Town / City *</label>
                                <input type="text" class="form-control" name="city" required="" />
                            </div>
                            <div class="col-xs-6">
                                <label>State *</label>
                                <input type="text" class="form-control" name="state" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>ZIP *</label>
                                <input type="text" class="form-control" name="zip" required="" />
                            </div>
                            <div class="col-xs-6">
                                <label>Phone *</label>
                                <input type="text" class="form-control" name="phone" required="" />
                            </div>
                        </div>
                        <label>Email Address *</label>
                        <input type="text" class="form-control" name="email-address" required="" />
                        <div class="form-checkbox mb-0">
                            <input type="checkbox" class="custom-checkbox" id="create-account"
                                   name="create-account">
                            <label class="form-control-label ls-s" for="create-account">Create an
                                account?</label>
                        </div>
                        <div class="form-checkbox mb-6">
                            <input type="checkbox" class="custom-checkbox" id="different-address"
                                   name="different-address">
                            <label class="form-control-label ls-s" for="different-address">Ship to a different
                                address?</label>
                        </div>
                        <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                        <label>Order Notes (Optional)</label>
                        <textarea class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                                  placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div>
                    <aside class="col-lg-5 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                            <div class="summary pt-5">
                                <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                                <table class="order-table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="product-name">Fashionable Overnight Bag <span
                                                class="product-quantity">×&nbsp;1</span></td>
                                        <td class="product-total text-body">$110.00</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td class="pb-0">
                                            <h4 class="summary-subtitle">Total</h4>
                                        </td>
                                        <td class=" pt-0 pb-0">
                                            <p class="summary-total-price ls-s text-primary">$290.00</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="payment accordion radio-type">
                                    <h4 class="summary-subtitle ls-m pb-3">Payment Methods</h4>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1"
                                               class="collapse text-body text-normal ls-m">Check payments
                                            </a>
                                        </div>
                                        <div id="collapse1" class="expanded" style="display: block;">
                                            <div class="card-body ls-m">
                                                Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2" class="expand text-body text-normal ls-m">Cash
                                                on delivery</a>
                                        </div>
                                        <div id="collapse2" class="collapsed">
                                            <div class="card-body ls-m">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-checkbox mt-4 mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                           name="terms-condition" />
                                    <label class="form-control-label" for="terms-condition">
                                        I have read and agree to the website <a href="#">terms and conditions
                                        </a>*
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-order">Place
                                    Order</button>
                            </div>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
@endsection
