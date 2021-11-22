
@include('front_views.layouts.header')

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start --
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active">{{ $pro->translate('ar')->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Single Product Section Start -->
    <div class="section section-margin-top">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-12 offset-lg-0 col-md-8 offset-md-2">

                    <!-- Product Details Image Start -->
                    <div class="product-details-img">

                        <!-- Single Product Image Start -->
                        <div class="single-product-img swiper-container product-gallery-top">
                            <div class="swiper-wrapper">
                                @foreach ($pro->images as $img)
                                <a class="swiper-slide w-100">
                                    <img class="w-100 lozad" data-src="{{ asset($img->img) }}" alt="صورة المنتج">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="single-product-thumb swiper-container product-gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach ($pro->images as $img)
                                <div class="swiper-slide">
                                    <img class="lozad" data-src="{{ asset($img->img) }}" alt="صورة المنتج">
                                </div>
                                @endforeach
                               
                            </div>

                            <!-- Next Previous Button Start -->
                            <div class="swiper-button-next swiper-button-white"><i class="pe-7s-angle-left"></i></div>
                            <div class="swiper-button-prev swiper-button-white"><i class="pe-7s-angle-right"></i></div>
                            <!-- Next Previous Button End -->

                        </div>
                        <!-- Single Product Thumb End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-7 col-12">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{ $pro->translate('ar')->name }}</h2>
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
                                @if ($pro->new_price != NULL)
                                    {{ $pro->new_price }} جنيه
                                @else
                                    {{ $pro->price }} جنيه
                                @endif
                            </span>
                            
                            @if ($pro->new_price != NULL)
                            <span class="old-price">
                                <del>
                                {{ $pro->price }} جنيه
                                </del>
                            </span>
                            @endif
                        </div>
                        <!-- Price Box End -->

                        <!-- Product Inventory Start -->
                        @if ($pro->count != NULL)
                        <div class="product-inventroy mb-3">
                            <span class="inventroy-title"> <strong>عدد القطع المتوفرة:</strong></span>
                            <span class="inventory-varient"> {{ $pro->count }} قطعة </span>
                        </div>
                        @endif
                        
                        
                        <!-- Product Inventory End -->

                        <!-- Description Start -->
                        <p class="desc-content mb-5">
                            {{ $pro->translate('ar')->description }}
                        </p>
                        <!-- Description End -->

                        <!-- Product Coler Variation Start --
                        <div class="product-color-variation mb-5">
                            <span> <strong>اللون: </strong></span>
                            <button type="button" class="btn bg-danger"></button>
                            <button type="button" class="btn bg-primary"></button>
                            <button type="button" class="btn bg-dark"></button>
                            <button type="button" class="btn bg-success"></button>
                        </div>
                        <!-- Product Coler Variation End -->

                        <!-- Quantity Start --
                        <div class="quantity d-flex align-items-center mb-5">
                            <span class="me-2"><strong>الكمية : </strong></span>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text">
                                <div class="dec qtybutton"></div>
                                <div class="inc qtybutton"></div>
                            </div>
                        </div>
                        <!-- Quantity End -->

                        <!-- Cart Button Start -->
                        <!--<div class="cart-btn mb-4">
                            <div class="add-to_cart">
                                <a class="btn btn-dark btn-hover-primary" href="cart.html">اضافة الى السلة</a>
                            </div>
                        </div> -->
                        <!-- Cart Button End -->

                        <!-- Action Button Start --
                        <div class="actions border-bottom mb-4 pb-4">

                            <a href="wishlist.html" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i>
                                المفضلة</a>
                        </div>
                        <!-- Action Button End -->

                        <!-- Social Shear Start --
                        <div class="social-share">
                            <span><strong>مشاركة: </strong></span>
                            <a href="#" class="facebook-color"><i class="fa fa-facebook"></i> فيس بوك</a>
                            <a href="#" class="twitter-color"><i class="fa fa-twitter"></i> تويتر</a>
                        </div>
                        <!-- Social Shear End -->

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
                @if ($pro->youtube_link)
                <div class="col-12">
                        <div class="screen">
                        <iframe width="853" height="480" src="{{ 'https://www.youtube.com/embed/'. $pro->youtube_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        <img src="{{ asset('assets/images/screen.png') }}" class="img-fluid">
                    </div>
                </div>
                @endif
            </div>
            @if($pro->code != NULL || $pro->age != NULL || $pro->size != NULL || $pro->source != NULL || $pro->contents != NULL || $pro->country != NULL || $pro->brand != NULL)
            <div class="row section-margin">
                <!-- Single Product Tab Start -->
                <div class="col-lg-12 single-product-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="true">تفاصيل حول المنتج </a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        
                       
                        <div class="tab-pane fade active show" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                            <div class="size-tab table-responsive-lg p-3">
                               
                                <table class="table border mb-0">
                                    <tbody>
                                        <tr>
                                            @if ($pro->code != NULL)
                                            <td class="cun-name"><span>الكود</span></td>
                                            <td>{{ $pro->code }}</td>
                                            @endif
                                            
                                        </tr>
                                        <tr>
                                        @if ($pro->age != NULL)
                                            <td class="cun-name"><span>العمر الموصى به</span></td>
                                            <td>{{ $pro->age }}</td>
                                        @endif
                                            
                                        </tr>
                                        <tr>
                                        @if ($pro->size != NULL)
                                            <td class="cun-name"><span>الحجم</span></td>
                                            <td>{{ $pro->translate('ar')->size  }}</td>
                                        @endif
                                            
                                        </tr>
                                        <tr>
                                        @if ($pro->source != NULL)
                                            <td class="cun-name"><span>الخامة الأصلية</span></td>
                                            <td>{{ $pro->translate('ar')->source }} </td>
                                        @endif
                                            
                                        </tr>
                                        <tr>
                                        @if ($pro->contents != NULL)
                                            <td class="cun-name"><span>محتويات العبوة</span></td>
                                            <td>{{ $pro->translate('ar')->contents }} </td>
                                        @endif
                                            
                                        </tr>
                                        <tr>
                                        @if ($pro->country != NULL)
                                            <td class="cun-name"><span>البلد </span></td>
                                            <td>{{ $pro->translate('ar')->country }} </td>
                                        @endif
                                        </tr>
                                        <tr>
                                        @if ($pro->brand != NULL)
                                            <td class="cun-name"><span>الماركة </span></td>
                                            <td>{{ $pro->translate('ar')->brand }} </td>
                                        @endif
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product Tab End -->
            </div>
            @endif
        </div>
    </div>
    <!-- Single Product Section End -->
    

    <!-- Product Section Start -->
    <div class="section section-margin mt-5 position-relative">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row mb-lg-8 mb-md-6 mb-4">

                <!-- Section Title Start -->
                <div class="col-lg col-12">
                    <div class="section-title mb-0 text-center">
                        <h2 class="title mb-2">منتجاتنا المميزة</h2>
                        <p>تعرف على أحدث المنتجات المضافة</p>
                    </div>
                </div>
                <!-- Section Title End -->

            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Start -->
            <div class="row">
                <div class="col">
                    <div class="product-carousel arrow-outside-container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach ($items as $item)
                                <!-- Product Start -->
                                <div class="swiper-slide">
                                    <div class="product-wrapper">
                                        <div class="product">
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
                                                <!--  <div class="add-cart-btn">
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
            <!-- Products End -->
        </div>
    </div>
    <!-- Product Section End -->

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