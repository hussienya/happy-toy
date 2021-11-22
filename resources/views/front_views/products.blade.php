
@include('front_views.layouts.header')

    <!-- Breadcrumb Section Start --
    <div class="section">

        <!-- Breadcrumb Area Start --
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End --

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row pb-10 mb-n4">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left mb-4">

                            <div class="shop_toolbar_btn">
                                <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                        class="fa fa-th"></i></button>
                                <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                        class="fa fa-list"></i></button>
                            </div>
                            <!--
                            <div class="shop-top-show">
                                <span>اظهار 1-12 من 39 من النتائج</span>
                            </div>
                            -->
                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start --
                        <div class="shop-top-bar-right mb-4">

                            <h4 class="title me-2">ترتيب بحسب: </h4>

                            <div class="shop-short-by">
                                <select class="nice-select" aria-label=".form-select-sm example">
                                    <option selected>ترتيب تلقائي</option>
                                    <option value="1">الاكثر شعبية</option>
                                    <option value="2">الافضل تقييما</option>
                                    <option value="3">الاحدث</option>
                                    <option value="3">الاقدم</option>
                                    <option value="3">السعر</option>
                                </select>
                            </div>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_4">
                        <h1 class="text-center"></h1>
                        @foreach ($items as $item)
                        <!-- Single Product Start -->
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="{{ url('/product/'.$item->id) }}" class="image">
                                        @php 
                                            $j = 0; 
                                        @endphp
                                        @foreach ( $item->images as $img )
                                        @if($j != 1)
                                        @php 
                                            $j = 1; 
                                        @endphp
                                        <img class="first-image lozad" data-src="{{ asset($img->img) }}" alt="صورة المنتج" />
                                        @endif
                                        @endforeach
                                    </a>
                                    @if ($item->new_price != NULL)
                                    <span class="badges">
                                        <span class="sale">
                                        - {{round((100 * ($item->price - $item->new_price)) / $item->price, 2)}} %
                                        </span>
                                    </span>
                                    @endif
                                    <div class="actions">
                                        <!--
                                        <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                -->
                                        <a href="#" class="action quickview" data-bs-toggle="modal"
                                            data-bs-target="{{ '#quick-view'.$item->id }}"><i class="pe-7s-search"></i></a>
                                    </div>
                                    <!-- <div class="add-cart-btn">
                                        <button class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add
                                            To Cart</button>
                                    </div> -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="{{ url('/product/'.$item->id) }}">{{ $item->translate('ar')->name }} </a></h5>
                                    <span class="price">
                                        <span class="new">
                                            @if ($item->new_price != NULL)
                                                {{ $item->new_price }} جنيه
                                            @else
                                                {{ $item->price }} جنيه
                                            @endif
                                        </span>
                                        @if ($item->new_price != NULL)
                                        <span class="old">
                                            {{ $item->price }} جنيه
                                        </span>
                                        @endif
                                    </span>
                                    <p>
                                    {{ $item->translate('ar')->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        @endforeach

                    </div>
                    <!-- Shop Wrapper End -->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mt-10 mb-n4">

                        <!-- Shop Top Bar Left start --
                        <div class="shop-bottom-bar-left mb-4">
                            <div class="shop-short-by">
                                <select class="nice-select rounded-0" aria-label=".form-select-sm example">
                                    <option selected>عرض 12 منتج بالصفحة</option>
                                    <option value="1">عرض 12 منتج بالصفحة</option>
                                    <option value="2">عرض 12 منتج بالصفحة</option>
                                    <option value="3">عرض 12 منتج بالصفحة</option>
                                    <option value="3">عرض 12 منتج بالصفحة</option>
                                </select>
                            </div>
                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right mb-4">
                            {{ $items->links() }}
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section End -->

    @foreach ($items as $item)
    <!-- Modal Start  -->
    <div class="modalquickview modal fade" id="{{ 'quick-view'.$item->id }}" tabindex="-1" aria-labelledby="{{ 'quick-view'.$item->id }}" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="btn close" data-bs-dismiss="modal">×</button>
                <div class="row">
                    <div class="col-md-6 col-12">

                        <!-- Product Details Image Start -->
                        <div class="modal-product-carousel">

                            <!-- Single Product Image Start -->
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($item->images as $img)
                                    <a class="swiper-slide">
                                        <img class="w-100 lozad" data-src="{{ $img->img }}"
                                            alt="صورة المنتج">
                                    </a>
                                    @endforeach
                                </div>

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-button-next swiper-button-next"><i
                                        class="pe-7s-angle-left"></i></div>
                                <div class="swiper-product-button-prev swiper-button-prev"><i
                                        class="pe-7s-angle-right"></i></div>
                                <!-- Next Previous Button End -->
                            </div>
                            <!-- Single Product Image End -->

                        </div>
                        <!-- Product Details Image End -->

                    </div>
                    <div class="col-md-6 col-12 overflow-hidden position-relative">

                        <!-- Product Summery Start -->
                        <div class="product-summery position-relative">

                            <!-- Product Head Start -->
                            <div class="product-head mb-3">
                                <h2 class="product-title"> {{ $item->translate('ar')->name }} </h2>
                            </div>
                            <!-- Product Head End -->

                            <!-- Rating Start --
                            <span class="ratings justify-content-start mb-2">
                                <span class="rating-wrap">
                                    <span class="star" style="width: 100%"></span>
                                </span>
                                <span class="rating-num">(4)</span>
                            </span>
                            <!-- Rating End -->

                            <!-- Price Box Start -->
                            <div class="price-box mb-2">
                                <span class="regular-price">
                                    @if ($item->new_price != NULL)
                                        {{ $item->new_price }} جنيه
                                    @else
                                        {{ $item->price }} جنيه
                                    @endif
                                </span>
                                @if ($item->new_price != NULL)
                                <span class="price">
                                    <del>{{ $item->price }} جنيه</del>
                                </span>
                                @endif
                            </div>
                            <!-- Price Box End -->

                            <!-- Description Start -->
                            <p class="desc-content mb-5">
                                {{ $item->translate('ar')->description }}
                            </p>
                            <!-- Description End -->

                            <!-- Quantity Start --
                            <div class="quantity d-flex align-items-center mb-5">
                                <span class="me-2"><strong>الكمية: </strong></span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"></div>
                                    <div class="inc qtybutton"></div>
                                </div>
                            </div>
                            <!-- Quantity End -->

                            <!-- Cart Button Start --
                            <div class="cart-btn mb-4">
                                <div class="add-to_cart">
                                    <a class="btn btn-dark btn-hover-primary" href="cart.html">اضافة الى السلة</a>
                                </div>
                            </div>
                            <!-- Cart Button End -->

                            <!-- Action Button Start --
                            <div class="actions border-bottom mb-4 pb-4">

                                <a href="wishlist.html" title="Wishlist" class="action wishlist"><i
                                        class="pe-7s-like"></i> المفضلة </a>
                            </div>
                            <!-- Action Button End -->

                            <!-- Payment Option Start --
                            <div class="payment-option mt-4 d-flex">
                                <span><strong>الدفع: </strong></span>
                                <a href="#">
                                    <img class="fit-image ms-1" src="assets/images/payment/payment.png"
                                        alt="Payment Option Image">
                                </a>
                            </div>
                            <!-- Payment Option End -->



                        </div>
                        <!-- Product Summery End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End  -->
    @endforeach

@include('front_views.layouts.footer')
