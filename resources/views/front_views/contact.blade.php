@include('front_views.layouts.header')


    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active">اتصل بنا</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Us Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n10">
                <div class="col-12 col-lg-6 mb-10 order-2 order-lg-1">
                    <!-- Section Title Start -->
                    <div class="contact-title pb-3" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title">تواصل معنا</h2>
                    </div>
                    <!-- Section Title End -->
                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form-wrapper contact-form">
                        <form action="{{ url('/contact') }}" id="contact-form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                            <div class="input-area mb-4">
                                                <input class="input-item" type="text" placeholder="الاسم" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                            <div class="input-area mb-4">
                                                <input class="input-item" type="email" placeholder="الايميل"
                                                    name="email">
                                            </div>
                                        </div>
                                        <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                            <div class="input-area mb-4">
                                                <input class="input-item" type="text" placeholder="الموضوع"
                                                    name="subject">
                                            </div>
                                        </div>
                                        <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                                            <div class="input-area mb-8">
                                                <textarea cols="30" rows="5" class="textarea-item" name="message"
                                                    placeholder="رسالة"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                                            <button type="submit" id="submit" name="submit"
                                                class="btn btn-secondary button-hover-primary">ارسال</button>
                                        </div>
                                        <p class="col-8 form-message mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                    <!-- Contact Form Wrapper End -->
                </div>
                <div class="col-12 col-lg-6 mb-10 order-1 order-lg-2">
                    <!-- Section Title Start -->
                    <div class="contact-title pb-3" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title">تواصل معنا</h2>
                    </div>
                    <!-- Section Title End -->
                    <div class="contact-content">
                        <p data-aos="fade-up" data-aos-delay="200">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                            لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من
                            النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <address class="contact-block">
                            <ul>
                                
                                <li data-aos="fade-up" data-aos-delay="400"><i class="fa fa-phone"></i> <a
                                        href="tel:+020 0101 971 5872">+020 0101 971 5872</a></li>
                                <li data-aos="fade-up" data-aos-delay="600"><i class="fa fa-envelope-o"></i> <a
                                        href="mailto:info@happytoyeg.com">info@happytoyeg.com </a></li>
                            </ul>
                        </address>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact us Section End -->

    @include('front_views.layouts.footer')