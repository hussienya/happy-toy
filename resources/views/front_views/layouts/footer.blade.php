

    <!-- Footer Section Start -->
    <footer class="section footer-section">
        <!-- Footer Top Start -->
        <div class="footer-top bg-primary section-padding">
            <div class="container">
                <div class="row mb-n8">
                    <!-- Header Logo Start -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-8">
                        <div class="header-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/icon.png') }}" alt="هابي توي"></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-8">
                        <div class="single-footer-widget">
                            <h1 class="widget-title">من نحن</h1>
                            <p class="desc-content">متجر إلكتروني متخصص ببيع ألعاب الأطفال</p>
                            <!-- Soclial Link Start -->
                            <div class="widget-social justify-content-start mb-n2">
                                <a title="Facebook" href="https://www.facebook.com/happytoyeg" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                <a title="Youtube" href="https://www.youtube.com/channel/UCbk0P83qtgyxGHqfIPelN0Q" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a title="Vimeo" href="https://www.instagram.com/happytoyeg/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                            <!-- Social Link End -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-8">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">اتصل بنا</h2>
                            <ul class="contact-links">
                                <li><i class="pe-7s-mail"></i><a href="mailto:info@happytoyeg.com"> info@happytoyeg.com</a>
                                </li>
                                <li><i class="pe-7s-call"></i><a href="tel:002001019715872"> +020 0101 971 5872</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-8">
                        <div class="single-footer-widget aos-init aos-animate">
                            <h2 class="widget-title">روابط سريعة</h2>
                            <ul class="widget-list">
                                <li><a href="{{ url('/') }}">الرئيسية</a></li>
                                <li><a href="{{ url('/about') }}">من نحن</a></li>
                                <li><a href="{{ url('/products') }}">منتجاتنا</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->
    </footer>
    <!-- Footer Section End -->

    <a href="#" class="scroll-top show" id="scroll-top">
        <!--<i class="arrow-top pe-7s-angle-up-circle"></i>
        <i class="arrow-bottom pe-7s-angle-up-circle"></i>-->
        <img src="{{ asset('assets/images/icon.png') }}" class="img-fluid">
    </a>

    <a target="_blank" class="whatsapp-chat" href="https://wa.me/2001019715872"> 
    	<img src="{{ asset('images/whatsapp.png')}}">
    </a>

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>

    <!--Main JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>