@extends('frontend.layouts.layout')

@section('content')
    <div class="page-content">
        <section
            class="intro-slider owl-carousel owl-theme row owl-dot-inner animation-slider owl-nav-arrow cols-1 appear-animate"
            data-owl-options="{
                    'items': 1,
                    'nav': false,
                    'loop': false,
                    'dots': false,
                    'autoplay': false,
                    'responsive': {
                        '1360': {
                            'nav': true
                        }
                    }
                }">
            <div class="intro-slide1 banner banner-fixed" style="background-color: #f6f6f6">
                <figure>
                    <img src="{{ asset('frontend/images/demos/demo6/slides/1.png') }}" alt="slide" width="1903" height="650" />
                </figure>
                <div class="container">
                    <div class="banner-content y-50">
                        <div class="slide-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s'
                                }">
                            <h4 class="banner-subtitle text-uppercase text-grey mb-2">Best Seller</h4>
                            <h3 class="banner-title font-weight-bold ls-m">Power bank with built in wireless
                                charge</h3>
                            <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop
                                Electronics<i class="d-icon-arrow-right"></i></a>
                            <figure class="floating y-50" data-options='{"invertX":false,"invertY":false}'
                                    data-floating-depth=".4">
                                <img class="layer h-auto" src="{{ asset('frontend/images/demos/demo6/slides/1-floating.png') }}"
                                     alt="power bank" width="778" height="394" />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-slide2 banner banner-fixed" style="background-color: #5A5957;">
                <figure>
                    <img src="{{ asset('frontend/images/demos/demo6/slides/2.png') }}" alt="bg" width="1903" height="650" />
                </figure>
                <div class="container">
                    <div class="banner-content y-50 ml-lg-auto">
                        <div class="slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s'
                                }">
                            <h4 class="banner-subtitle text-primary text-uppercase">New Design</h4>
                            <h3 class="banner-title text-white font-weight-bold ls-m">Stunning original design
                                new wooden clock</h3>
                            <a href="#" class="btn btn-white btn-link btn-underline">Shop Essentials<i
                                    class="d-icon-arrow-right"></i></a>
                            <figure class="floating y-50" data-options='{"invertX":false,"invertY":false}'
                                    data-floating-depth=".4">
                                <img class="layer h-auto" src="{{ asset('frontend/images/demos/demo6/slides/2-floating.png') }}"
                                     alt="Clock" width="391" height="401" />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-wrapper mb-10 pb-8 appear-animate">
            <div class="container">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <ul class="nav-filters product-filters" data-target="#products-grid">
                            <li><a href="#" class="nav-filter active font-weight-semi-bold"
                                   data-filter="*">All</a></li>
                        </ul>
                        <span class="divider"></span>
                        <div class="header-search hs-toggle">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>Search
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                       placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit" title="submit-button">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                    <div class="toolbox-right">
                        <a href="#" class="btn btn-link  right-sidebar-toggle font-weight-semi-bold mr-0"><i
                                class="d-icon-filter-3"></i>Filter</a>
                    </div>
                </div>
                <div class="row grid products-grid mb-2" id="products-grid" data-grid-options="{
                            'masonry': {
                                'columnWidth': ''
                            }
                        }">

                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-4 col-6 grid-item electronics sale essentials">
                            <div class="product text-center">
                                <figure class="product-media" style="background-color: #f9f9f9;">
                                    <a href="{{ route('product_detail', $product->slug) }}">
                                        <img src="{{ asset('storage/uploads/featured/' . $product->featuredImage?->name) }}" alt="product" width="280"
                                             height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                           data-target="#addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a>
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                                class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-grid-3cols.html">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="demo6-product.html">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">${{ number_format($product->regular_price) }}</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="demo6-product.html" class="rating-reviews">( 8 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a class="btn btn-outline btn-dark btn-load" href="ajax/ajax-products-demo6.html"
                       data-load-to="#products-grid">Load more</a>
                </div>
            </div>
        </section>
        <aside class="right-sidebar shop-sidebar">
            <div class="sidebar-overlay"></div>
            <div class="sidebar-content">
                <div class="filter-actions mb-4">
                    <a href="#"
                       class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary text-uppercase btn-icon-right">Filter<i
                            class="d-icon-arrow-right"></i></a>
                    <a href="#" class="filter-clean">Clean All</a>
                </div>
                <div class="widget widget-collapsible price-with-count">
                    <h3 class="widget-title">Filter by price</h3>
                    <ul class="widget-body filter-items filter-price">
                        <li><a href="#">$0.00 - $50.00</a><span>(0)</span></li>
                        <li><a href="#">$50.00 - $100.00</a><span>(7)</span></li>
                        <li><a href="#">$100.00 - $200.00</a><span>(18)</span></li>
                        <li><a href="#">$200.00+</a><span>(5)</span></li>
                    </ul>
                </div>
                <div class="widget widget-collapsible">
                    <h3 class="widget-title">Size</h3>
                    <ul class="widget-body filter-items">
                        <li><a href="#">Extra Large</a></li>
                        <li><a href="#">Large</a></li>
                        <li><a href="#">Medium</a></li>
                        <li><a href="#">Small</a></li>
                    </ul>
                </div>
                <div class="widget widget-collapsible">
                    <h3 class="widget-title">Color</h3>
                    <ul class="widget-body filter-items">
                        <li><a href="#">Black</a></li>
                        <li><a href="#">Blue</a></li>
                        <li><a href="#">Green</a></li>
                        <li><a href="#">White</a></li>
                    </ul>
                </div>
                <div class="widget widget-collapsible">
                    <h3 class="widget-title">Brands</h3>
                    <ul class="widget-body filter-items">
                        <li><a href="#">Cinderella</a></li>
                        <li><a href="#">Comedy</a></li>
                        <li><a href="#">Rightcheck</a></li>
                        <li><a href="#">SkillStar</a></li>
                        <li><a href="#">SLS</a></li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
@endsection
