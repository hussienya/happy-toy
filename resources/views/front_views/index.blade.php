
@include('front_views.layouts.header')

    <!-- Hero/Intro Slider Start -->
    <div class="section">

        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">


                @foreach ($slides as $slide)
                <div class="hero-slide-item swiper-slide">
                    <div class="overlay-hero"></div>
                    <div class="hero-slide-bg">
                        <img class="lozad" data-src="{{ asset($slide->img) }}" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-center">
                            <h2 class="title m-0 text-white">{{ $slide->translate('ar')->title }}</h2>
                            <p class="text-white">{{ $slide->translate('ar')->description }}</p>
                            <a href="{{ $slide->link }}" class="btn btn-secondary btn-hover-primary">تسوق الآن</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-md-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i
                    class="pe-7s-angle-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i
                    class="pe-7s-angle-right"></i></div>
            <!-- Swiper Navigation End -->
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Product Banner Carousel Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-banner-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach ($categories_item as $category)
                                @if($category->id != 4)
                                <div class="swiper-slide">
                                    <div class="single-product-banner" data-aos="fade-up" data-aos-delay="200">
                                        <div class="banner-img">
                                            <a href="{{ url('/category/'.$category->id) }}"><img data-src="{{ $category->img }}" class="lozad" alt="صورة التصنيف"></a>
                                        </div>
                                        <div class="single-banner-content">
                                            <h4 class="title">
                                                <a href="{{ url('/category/'.$category->id) }}">
                                                    {{ $category->translate('ar')->name }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Banner Carousel End -->

    <!-- Product Section Start -->
    <div class="section position-relative">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row mb-lg-8 mb-6">
                <!-- Section Title Start -->
                <div class="col-lg col-12">
                    <div class="section-title mb-0 text-center" data-aos="fade-up" data-aos-delay="400">
                        <h2 class="title mb-2">منتجاتنا المميزة</h2>
                        <p>تعرف على أحدث المنتجات المضافة</p>
                    </div>
                </div>
                <!-- Section Title End -->

            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="600">
                    <div class="product-carousel arrow-outside-container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach ($items as $item)
                                <!-- Product Start -->
                                <div class="swiper-slide">
                                    <div class="product-wrapper">
                                        <div class="product mb-6">
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
                                                    <img class="fit-image lozad" data-src="{{ asset($img->img) }}" alt="صورة المنتج" />
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
                                                    <a href="wishlist.html" class="action wishlist"><i
                                                            class="pe-7s-like"></i></a>
                                                    -->
                                                    <a href="#" class="action quickview" data-bs-toggle="modal"
                                                        data-bs-target="{{ '#quick-view'.$item->id }}"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <!-- <div class="add-cart-btn">
                                                    <button
                                                        class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">اضافة
                                                        الى السلة</button>
                                                </div> -->
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="{{ url('/product/'.$item->id) }}">
                                                    {{ $item->translate('ar')->name }} 
                                                </a></h5>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product End -->
                                @endforeach
                                
                            </div>

                            <div class="swiper-pagination d-block d-md-none"></div>
                            <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i
                                    class="pe-7s-angle-right"></i></div>
                            <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i
                                    class="pe-7s-angle-left"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product Section End -->

    <!-- Product tab -->
    <div class="section position-relative mt-4">
        <div class="container">

            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Tab Start -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                    <ul class="product-tab-nav nav mb-n3 pb-10 title-border-bottom">
                        <li class="nav-item mb-3"><a class="nav-link active" data-bs-toggle="tab" href="#tab-product-all">المضافة أخيراً</a></li>
                        <li class="nav-item mb-3"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-featured">أخر الخصومات</a></li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="600">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-product-all">
                            <div class="product-carousel arrow-outside-container">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        @foreach ($new_items as $item)
                                        <!-- Product Start -->
                                        <div class="swiper-slide">
                                            <div class="product-wrapper">
                                                <div class="product mb-6">
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
                                                            <img class="fit-image lozad" data-src="{{ asset($img->img) }}" alt="صورة المنتج" />
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
                                                            <a href="wishlist.html" class="action wishlist"><i
                                                                    class="pe-7s-like"></i></a>
                                                            -->
                                                            <a href="#" class="action quickview" data-bs-toggle="modal"
                                                                data-bs-target="{{ '#quick-view'.$item->id }}"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <!-- <div class="add-cart-btn">
                                                            <button
                                                                class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">اضافة
                                                                الى السلة</button>
                                                        </div> -->
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a href="{{ url('/product/'.$item->id) }}">
                                                            {{ $item->translate('ar')->name }} 
                                                        </a></h5>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product End -->
                                        @endforeach

                                    </div>

                                    <div class="swiper-pagination d-block d-md-none"></div>
                                    <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                                    <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-product-featured">
                            <div class="product-carousel arrow-outside-container">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                    @foreach ($sale_items as $item)
                                        <!-- Product Start -->
                                        <div class="swiper-slide">
                                            <div class="product-wrapper">
                                                <div class="product mb-6">
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
                                                            <img class="fit-image lozad" data-src="{{ asset($img->img) }}" alt="صورة المنتج" />
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
                                                            <a href="wishlist.html" class="action wishlist"><i
                                                                    class="pe-7s-like"></i></a>
                                                            -->
                                                            <a href="#" class="action quickview" data-bs-toggle="modal"
                                                                data-bs-target="{{ '#quick-view'.$item->id }}"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <!-- <div class="add-cart-btn">
                                                            <button
                                                                class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">اضافة
                                                                الى السلة</button>
                                                        </div> -->
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a href="{{ url('/product/'.$item->id) }}">
                                                            {{ $item->translate('ar')->name }} 
                                                        </a></h5>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product End -->
                                        @endforeach

                                    </div>

                                    <div class="swiper-pagination d-block d-md-none"></div>
                                    <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                                    <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product tab -->

    <!-- Brand Logo Section Start -->
    <div class="section section-margin-bottom">
        <div class="container">
            <div class="border-top border-bottom">
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                        <!-- Brand Logo Wrapper Start -->
                        <div class="brand-logo-carousel arrow-outside-container">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                    @foreach ($brands as $brand)
                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a><img class="lozad" data-src="{{ asset($brand->img) }}" alt="شعار العلامة التجارية"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->
                                    @endforeach

                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div
                                    class="swiper-logo-button-next swiper-button-next swiper-nav-button d-none d-md-flex">
                                    <i class="pe-7s-angle-left"></i>
                                </div>
                                <div
                                    class="swiper-logo-button-prev swiper-button-prev swiper-nav-button d-none d-md-flex">
                                    <i class="pe-7s-angle-right"></i>
                                </div>
                                <!-- Next Previous Button End -->
                            </div>
                        </div>
                        <!-- Brand Logo Wrapper End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Section End -->

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