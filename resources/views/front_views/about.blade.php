
@include('front_views.layouts.header')

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active">من نحن</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="row align-items-center mb-n6">
                <div class="col-lg-7 mb-6">

                    <!-- About Content Start  -->
                    <div class="about-content" data-aos="fade-up" data-aos-delay="600">
                        <h2 class="about-title">من نحن</h2>
                        <p>
                            {{ $about->translate('ar')->description }}
                        </p>
                    </div>


                </div>
                <div class="col-lg-5 mb-6">

                    <!-- About Thumb Start -->
                    <div class="about-thumb" data-aos="fade-up" data-aos-delay="200">
                        <img class="fit-image lozad" data-src="{{ $about->img }}" alt="صورة من نحن">
                    </div>
                    <!-- About Thumb End -->

                </div>
                <!-- About Content End -->


            </div>

        </div>
    </div>
    <!-- About Section End -->

    <!-- CTA Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">

                    <!-- Section Title Start -->
                    <div class="section-title text-center">
                        <h2 class="title">لماذا نحن</h2>
                    </div>
                    <!-- Section Title End -->

                </div>
            </div>

            <div class="row mb-n6">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-choose-item text-center mb-6">
                        <i class="fa fa-globe"></i>
                        <h4 class="cta-title">توصيل مجاني</h4>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="single-choose-item text-center mb-6">
                        <i class="fa fa-plane"></i>
                        <h4 class="cta-title">شحن سريع</h4>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="single-choose-item text-center mb-6">
                        <i class="fa fa-comments"></i>
                        <h4 class="cta-title">تلبية سريعة للطلبات</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- CTA Section End -->

@include('front_views.layouts.footer')