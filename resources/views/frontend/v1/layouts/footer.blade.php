<footer id="wpo-footer" class="wpo-footer">
<div class="container">
    <section class=" box-element mass-bottom">
        <div class="container">
            <div class="row">
            <div class="vc_col-sm-3 col-sm-4 col-xs-4 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <div class="wpb_single_image wpb_content_element overlay vc_align_left">
                        <div class="wpb_wrapper">
                        <img class=" vc_box_border_grey " src="{{ asset('frontend/images/logo/logo.png') }}" width="144" height="85" alt="logo_footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_col-sm-6 col-sm-8 col-xs-8 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                        <div class="box about">
                            <div class="box-heading">{{config('kiot.name')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class=" box-element wpo-footer-center">
        <div class="container">
            <div class="row">
                <div class="vc_col-sm-3 col-sm-6 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <div class="wpb_widgetised_column wpb_content_element">
                            <div class="wpb_wrapper">
                            <aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
                                <div class="box-heading"><span>Tài khoản Của Tôi</span></div>
                                <div class="menu-my-account-container">
                                    <ul id="menu-my-account" class="menu">
                                        <li>
                                            @if(Auth::guard('web')->check())
                                            <a href="{{route('user-detail')}}">Tài khoản Của Tôi</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_col-sm-4 col-sm-6 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <div class="wpb_widgetised_column wpb_content_element">
                            <div class="wpb_wrapper">
                            <aside id="text-10" class="widget clearfix widget_text">
                                <div class="box-heading"><span>Liên Lạc</span></div>
                                <div class="textwidget">
                                    <address><strong>Email: {{$about['email']}}</strong></address>
                                    <address><strong>HotLine: {{$about['phone']}}</strong></address>
                                    <address><strong>Đ/c: {{$about['address']}}</strong></address>
                                </div>
                            </aside>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_col-sm-4 col-sm-6 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <div class="wpb_widgetised_column wpb_content_element">
                            <div class="wpb_wrapper">
                            <aside id="text-10" class="widget clearfix widget_text">
                                <div class="box-heading"><span>Fan Page</span></div>
                                <div class="textwidget">
                                        <address><a href={{$about['fanpage']}} target="_blank"><strong>moonshop.local</strong></a><br>
                                    </address>
                                </div>
                            </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="wpo-copyright newsletter-fix">
    <div class="container">
        <div class="inner">
            <div class="col-sm-12">
            <div class="copyright">
                &copy; {{date('Y')}} <a href="#">moonshop</a>
                - Powered by <strong>MoonShop</strong>
                    - Develop by <a href="https://dkteam.tk">DKTEAM</a>
            </div>
            </div>
        </div>
    </div>
</section>
</footer>