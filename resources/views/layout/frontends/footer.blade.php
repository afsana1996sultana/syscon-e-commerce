<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="{{url('/')}}"><img src="{{url('frontends/assets/img/logo/sysconLogo.webp')}}" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            @foreach ($footer as $val)
                                <p>{{ $val->img_title }}</p>
                                <p><span>Address:</span> {{ $val->f_address }}<br></p>
                                <p><span>Mobile: </span><a href="tel:+8801818-497401"> {{ $val->f_phone }}</a></p>
                                <p><span>Support: </span><a href="mailto:info@sysconbd.com"> {{ $val->f_email }}</a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                            @foreach ($firstcolumnlink as $val)
                                <li><a href="{{ $val->link }}">{{ $val->link_name }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                            @foreach ($secondcolumnlink as $val)
                                <li><a href="{{ $val->link }}">{{ $val->link_name }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="https://facebook.com/" title="Facebook"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a class="twitter" href="https://twitter.com/" title="Twitter"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a class="instagram" href="https://instagram.com/" title="instagram"><i class="fa fa-instagram"></i></a>
                                </li>           
                                <li><a class="linkedin" href="https://linkedin.com/" title="linkedin"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                            <h3>Join Our Newsletter Now</h3>
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off"
                                    placeholder="Your email address..." />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                    <!-- All Rights Reserved © 2022 by SYSCON Engineering Ltd. -->
                        <p class="copyright-text">&copy; 2022 <span>SYSCON</span>. All Rights Reserved <i
                                class="fa fa-heart text-danger"></i> by <a href="http://sysconsolutionbd.com/"
                                target="_blank">SYSCON Solution Ltd.</a> </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <a href="#"><img src="{{url('frontends/assets/img/icon/payment.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->