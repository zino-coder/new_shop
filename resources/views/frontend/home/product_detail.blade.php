@extends('frontend.layouts.layout')
@section('content')
<div class="page-content mb-10 pb-6">
    <div class="container">
        <div class="product product-single row mb-8">
            <div class="col-md-6">
                <div class="product-gallery pg-vertical">
                    <div
                        class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                        @if(isset($product->thumbImages))
                        @foreach($product->thumbImages as $thumb)
                            <figure class="product-image">
                                <img src="{{ asset('storage/uploads/thumb/' .$thumb->name) }}"
                                     data-zoom-image="images/product/product-19-1.jpg"
                                     alt="Mackintosh Poket backpack" width="800" height="900">
                            </figure>
                        @endforeach
                            @endif
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                            @if(isset($product->thumbImages))
                            @foreach($product->thumbImages as $thumb)
                            <div class="product-thumb">
                                <img src="{{ asset('storage/uploads/thumb/' .$thumb->name) }}" alt="product thumbnail"
                                     width="150" height="169">
                            </div>
                            @endforeach
                                @endif
                        </div>
                        <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                        <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 sticky-sidebar-wrapper">
                <div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
                    <div class="product-navigation">
                        <ul class="breadcrumb breadcrumb-lg">
                            <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                            <li><a href="#" class="active">Products</a></li>
                            <li>In Stock</li>
                        </ul>

                        <ul class="product-nav">
                            <li class="product-nav-prev">
                                <a href="#">
                                    <i class="d-icon-arrow-left"></i> Prev
                                    <span class="product-nav-popup">
													<img src="images/product/product-thumb-prev.jpg"
                                                         alt="product thumbnail" width="110" height="123">
													<span class="product-name">Sed egtas Dnte Comfort</span>
												</span>
                                </a>
                            </li>
                            <li class="product-nav-next">
                                <a href="#">
                                    Next <i class="d-icon-arrow-right"></i>
                                    <span class="product-nav-popup">
													<img src="images/product/product-thumb-next.jpg"
                                                         alt="product thumbnail" width="110" height="123">
													<span class="product-name">Sed egtas Dnte Comfort</span>
												</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <h1 class="product-name">{{ $product->name }}</h1>
                    <div class="product-meta">
                        SKU: <span class="product-sku">12345670</span>
                        BRAND: <span class="product-brand">The Northland</span>
                    </div>
                    <div class="product-price">${{ number_format($product->regular_price) }}</div>
                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width:100%"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 81 reviews )</a>
                    </div>
                    <p class="product-short-desc">Sed egestas, ante et vulputate volutpat, eros pede semper
                        est,
                        vitae luctus metus libero eu augue. Morbi purus liberpuro ate vol faucibus
                        adipiscing.</p>

                    <p class="stock in-stock">{{ $product->amount }} in stock</p>

                    <hr class="product-divider">

                    <div class="product-form product-qty">
                        <div class="product-form-group">
                            <div class="input-group mr-2">
                                <button class="quantity-minus d-icon-minus"></button>
                                <input class="quantity form-control" type="number" min="1" max="1000000">
                                <a herf="{{ route('addToCart') . '?product_id=' . $product->id }}" class="quantity-plus d-icon-plus"></a>
                            </div>
                            <a herf="{{ route('addToCart') . '?product_id=' . $product->id }}"class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold"><i
                                    class="d-icon-bag"></i>Add to
                                Cart</a>
                        </div>
                    </div>

                    <hr class="product-divider mb-3">

                    <div class="product-footer">
                        <div class="social-links mr-4">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                        </div>
                        <span class="divider d-lg-show"></span>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-wishlist mr-6"><i
                                    class="d-icon-heart"></i><span>Add to
												wishlist</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab tab-nav-simple product-tabs mb-4">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#product-tab-description">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-tab-additional">Additional information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active in" id="product-tab-description">
                    <div class="row mt-6">
                        <div class="col-md-6">
                            <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
                            <p class="mb-2">
                                Praesent id enim sit amet.Tdio vulputate eleifend in in tortor.
                                ellus massa. siti iMassa ristique sit amet condim vel, facilisis
                                quimequistiqutiqu amet condim Dilisis Facilisis quis sapien. Praesent id
                                enim sit amet.
                            </p>
                            <ul class="mb-8">
                                <li>Praesent id enim sit amet.Tdio vulputate</li>
                                <li>Eleifend in in tortor. ellus massa.Dristique sitii</li>
                                <li>Massa ristique sit amet condim vel</li>
                                <li>Dilisis Facilisis quis sapien. Praesent id enim sit amet</li>
                            </ul>
                            <h5 class="description-title mb-3 font-weight-semi-bold ls-m">Specifications
                            </h5>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th class="font-weight-semi-bold text-dark pl-0">Material</th>
                                    <td class="pl-4">Praesent id enim sit amet.Tdio</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-semi-bold text-dark pl-0">Claimed Size</th>
                                    <td class="pl-4">Praesent id enim sit</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-semi-bold text-dark pl-0">Recommended Use
                                    </th>
                                    <td class="pl-4">Praesent id enim sit amet.Tdio vulputate eleifend
                                        in in tortor. ellus massa. siti</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-semi-bold text-dark border-no pl-0">
                                        Manufacturer</th>
                                    <td class="border-no pl-4">Praesent id enim</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pl-md-6 pt-4 pt-md-0">
                            <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description
                            </h5>
                            <figure class="p-relative d-inline-block mb-3">
                                <img src="images/product/product.jpg" width="559" height="370"
                                     alt="Product" />
                                <a class="btn-play btn-iframe" href="video/memory-of-a-woman.mp4">
                                    <i class="d-icon-play-solid"></i>
                                </a>
                            </figure>
                            <div class="icon-box-wrap d-flex flex-wrap">
                                <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
                                    <div class="icon-box-icon">
                                        <i class="d-icon-lock"></i>
                                    </div>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">2 year
                                            warranty</h4>
                                        <p>Guarantee with no doubt</p>
                                    </div>
                                </div>
                                <div class="divider d-xl-show mr-10"></div>
                                <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
                                    <div class="icon-box-icon">
                                        <i class="d-icon-truck"></i>
                                    </div>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Free shipping
                                        </h4>
                                        <p>On orders over $50.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="product-tab-additional">
                    <ul class="list-none">
                        <li><label>Brands:</label>
                            <p>SkillStar, SLS</p>
                        </li>
                        <li><label>Color:</label>
                            <p>Blue, Brown</p>
                        </li>
                        <li><label>Size:</label>
                            <p>Large, Medium, Small</p>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="product-tab-reviews">
                    <div class="row">
                        <div class="col-lg-4 mb-6">
                            <div class="avg-rating-container">
                                <mark>5.0</mark>
                                <div class="avg-rating">
                                    <span class="avg-rating-title">Average Rating</span>
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <span class="rating-reviews">(2 Reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ratings-list mb-2">
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:100%;"></span>
                                    </div>
                                    <div class="progress-value">100%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:0%;"></span>
                                    </div>
                                    <div class="progress-value">0%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:60%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:0%;"></span>
                                    </div>
                                    <div class="progress-value">0%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:0%;"></span>
                                    </div>
                                    <div class="progress-value">0%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:20%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:0%;"></span>
                                    </div>
                                    <div class="progress-value">0%</div>
                                </div>
                            </div>
                            <a class="btn btn-dark btn-rounded submit-review-toggle" href="#">Submit
                                Review</a>
                        </div>
                        <div class="col-lg-8 comments pt-2 pb-10 border-no">
                            <nav class="toolbox">
                                <div class="toolbox-left">
                                    <div class="toolbox-item">
                                        <a href="#" class="btn btn-outline btn-rounded">All Reviews</a>
                                    </div>
                                    <div class="toolbox-item">
                                        <a href="#" class="btn btn-outline btn-rounded">With Images</a>
                                    </div>
                                    <div class="toolbox-item">
                                        <a href="#" class="btn btn-outline btn-rounded">With Videos</a>
                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Sort By :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="">Default Order</option>
                                            <option value="newest" selected="selected">Newest Reviews
                                            </option>
                                            <option value="oldest">Oldest Reviews</option>
                                            <option value="high_rate">Highest Rating</option>
                                            <option value="low_rate">Lowest Rating</option>
                                            <option value="most_likely">Most Likely</option>
                                            <option value="most_unlikely">Most Unlikely</option>
                                        </select>
                                    </div>
                                </div>
                            </nav>
                            <ul class="comments-list">
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="images/blog/comments/1.jpg" alt="avatar">
                                            </a>
                                        </figure>
                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
															<span class="comment-date">by <span
                                                                    class="font-weight-semi-bold text-uppercase text-dark">John
																	Doe</span> on
																<span class="font-weight-semi-bold text-dark">Nov 22,
																	2018</span></span>
                                            </div>

                                            <div class="comment-content mb-5">
                                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                    libero sodales leo,
                                                    eget blandit nunc tortor eu nibh. Nullam mollis. Ut
                                                    justo.
                                                    Suspendisse potenti.
                                                    Sed egestas, ante et vulputate volutpat, eros pede
                                                    semper
                                                    est, vitae luctus metus libero eu augue.</p>
                                            </div>
                                            <div class="file-input-wrappers">
                                                <img class="btn-play btn-img pwsp"
                                                     src="images/products/product1.jpg" width="280"
                                                     height="315" alt="product" />


                                                <img class="btn-play btn-img pwsp"
                                                     src="images/products/product3.jpg" width="280"
                                                     height="315" alt="product" />

                                                <a class="btn-play btn-iframe"
                                                   style="background-image: url(images/product/product.jpg);background-size: cover;"
                                                   href="video/memory-of-a-woman.mp4">
                                                    <i class="d-icon-play-solid"></i>
                                                </a>
                                            </div>
                                            <div class="feeling mt-5">
                                                <button
                                                    class="btn btn-link btn-icon-left btn-slide-up btn-infinite like mr-2">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    Like (<span class="count">0</span>)
                                                </button>
                                                <button
                                                    class="btn btn-link btn-icon-left btn-slide-down btn-infinite unlike">
                                                    <i class="fa fa-thumbs-down"></i>
                                                    Unlike (<span class="count">0</span>)
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="images/blog/comments/2.jpg" alt="avatar">
                                            </a>
                                        </figure>

                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
															<span class="comment-date">by <span
                                                                    class="font-weight-semi-bold text-uppercase text-dark">John
																	Doe</span> on
																<span class="font-weight-semi-bold text-dark">Nov 22,
																	2018</span></span>
                                            </div>

                                            <div class="comment-content">
                                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                    libero sodales leo, eget blandit nunc tortor eu nibh.
                                                    Nullam
                                                    mollis.
                                                    Ut justo. Suspendisse potenti. Sed egestas, ante et
                                                    vulputate volutpat,
                                                    eros pede semper est, vitae luctus metus libero eu
                                                    augue.
                                                    Morbi purus libero,
                                                    faucibus adipiscing, commodo quis, avida id, est. Sed
                                                    lectus. Praesent elementum
                                                    hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                                    volutpat.</p>
                                            </div>
                                            <div class="feeling mt-5">
                                                <button
                                                    class="btn btn-link btn-icon-left btn-slide-up btn-infinite like mr-2">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    Like (<span class="count">0</span>)
                                                </button>
                                                <button
                                                    class="btn btn-link btn-icon-left btn-slide-down btn-infinite unlike">
                                                    <i class="fa fa-thumbs-down"></i>
                                                    Unlike (<span class="count">0</span>)
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <nav class="toolbox toolbox-pagination justify-content-end">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous"
                                           tabindex="-1" aria-disabled="true">
                                            <i class="d-icon-arrow-left"></i>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link"
                                                                                        href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item page-item-dots"><a class="page-link" href="#">6</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next<i class="d-icon-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Comments -->
                    <div class="review-form-section">
                        <div class="review-overlay"></div>
                        <div class="review-form-wrapper">
                            <div class="title-wrapper text-left">
                                <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                <p>Your email address will not be published. Required fields are marked *
                                </p>
                            </div>
                            <div class="rating-form">
                                <label for="rating" class="text-dark">Your rating * </label>
                                <span class="rating-stars selected">
												<a class="star-1" href="#">1</a>
												<a class="star-2" href="#">2</a>
												<a class="star-3" href="#">3</a>
												<a class="star-4 active" href="#">4</a>
												<a class="star-5" href="#">5</a>
											</span>

                                <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>
                            <form action="#">
											<textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                                      placeholder="Comment *" required></textarea>

                                <div class="review-medias">
                                    <div class="file-input form-control image-input"
                                         style="background-image: url(images/product/placeholder.png);">
                                        <div class="file-input-wrapper">
                                        </div>
                                        <label class="btn-action btn-upload" title="Upload Media">
                                            <input type="file" accept=".png, .jpg, .jpeg"
                                                   name="riode_comment_medias_image_1">
                                        </label>
                                        <label class="btn-action btn-remove" title="Remove Media">
                                        </label>
                                    </div>
                                    <div class="file-input form-control image-input"
                                         style="background-image: url(images/product/placeholder.png);">
                                        <div class="file-input-wrapper">
                                        </div>
                                        <label class=" btn-action btn-upload" title="Upload Media">
                                            <input type="file" accept=".png, .jpg, .jpeg"
                                                   name="riode_comment_medias_image_2">
                                        </label>
                                        <label class="btn-action btn-remove" title="Remove Media">
                                        </label>
                                    </div>
                                    <div class="file-input form-control video-input"
                                         style="background-image: url(images/product/placeholder.png);">
                                        <video class="file-input-wrapper" controls=""></video>
                                        <label class="btn-action btn-upload" title="Upload Media">
                                            <input type="file" accept=".avi, .mp4"
                                                   name="riode_comment_medias_video_1">
                                        </label>
                                        <label class="btn-action btn-remove" title="Remove Media">
                                        </label>
                                    </div>
                                </div>
                                <p>Upload images and videos. Maximum count: 3, size: 2MB</p>
                                <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                                        class="d-icon-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- End Reply -->
                </div>
            </div>
        </div>
        <section class="pt-3 mt-10">
            <h2 class="title justify-content-center">Related Products</h2>

            <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
                 data-owl-options="{
							'items': 5,
							'nav': false,
							'loop': false,
							'dots': true,
							'margin': 20,
							'responsive': {
								'0': {
									'items': 2
								},
								'768': {
									'items': 3
								},
								'992': {
									'items': 4,
									'dots': false,
									'nav': true
								}
							}
						}">
                <div class="product shadow-media">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="images/product/featured1.jpg" alt="product" width="280" height="315">
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-new">new</label>
                        </div>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                               data-target="#addCartModal" title="Add to cart"><i
                                    class="d-icon-bag"></i></a>
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3col.html">Clothing</a>
                        </div>
                        <h3 class="product-name">
                            <a href="product.html">Solid Pattern in Summer Dress</a>
                        </h3>
                        <div class="product-price">
                            <span class="price">$140.00</span>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( <span class="review-count">12</span>
                                reviews
                                )</a>
                        </div>
                    </div>
                </div>
                <div class="product shadow-media">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="images/product/featured2.jpg" alt="product" width="280" height="315">
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-sale">27% off</label>
                        </div>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                               data-target="#addCartModal" title="Add to cart"><i
                                    class="d-icon-bag"></i></a>
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3col.html">Bags & Backpacks</a>
                        </div>
                        <h3 class="product-name">
                            <a href="product.html">Mackintosh Poket Backpack</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:60%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( <span class="review-count">6</span> reviews
                                )</a>
                        </div>
                    </div>
                </div>
                <div class="product shadow-media">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="images/product/featured3.jpg" alt="product" width="280" height="315">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                               data-target="#addCartModal" title="Add to cart"><i
                                    class="d-icon-bag"></i></a>
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3col.html">Clothing</a>
                        </div>
                        <h3 class="product-name">
                            <a href="product.html">Fashionable Orginal Trucker</a>
                        </h3>
                        <div class="product-price">
                            <span class="price">$78.64</span>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( <span class="review-count">2</span> reviews
                                )</a>
                        </div>
                    </div>
                </div>
                <div class="product shadow-media">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="images/product/featured4.jpg" alt="product" width="280" height="315">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                               data-target="#addCartModal" title="Add to cart"><i
                                    class="d-icon-bag"></i></a>
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3col.html">Clothing</a>
                        </div>
                        <h3 class="product-name">
                            <a href="product.html">Women Red Fur Overcoat</a>
                        </h3>
                        <div class="product-price">
                            <span class="price">$184.00</span>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( <span class="review-count">6</span> reviews
                                )</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection