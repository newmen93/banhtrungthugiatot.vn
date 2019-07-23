@extends('frontend.v1.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')
                <span class="current">Đăng kí</span>
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <div id="wpo-content" class="wpo-content col-xs-12 no-sidebar">
            <article id="post-9" class="post-9 page type-page status-publish hentry">
                <h1 class="wpo-title">Đăng kí</h1>
                <div class="content">
                    <div class="woocommerce">
                        <form method="post" class="login" action="{{route('user.register')}}">
                            <p class="form-row form-row-first">
                                <label class="">Tài khoản <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="name" placeholder="" value="">
                                @csrf
                            </p>
                            <p class="form-row form-row-last">
                                <label class="">Địa chỉ <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="address" placeholder="" value="">
                            </p>
                            <p class="form-row form-row-first">
                                <label class="">Điện thoại <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="phone" placeholder="" value="">
                            </p>
                            <p class="form-row form-row-last">
                                <label class="">Email <abbr class="required" title="required">*</abbr></label>
                                <input type="email" class="input-text " name="email" placeholder="customer@gmail.com" value="">
                            </p>
                            <p class="form-row form-row-first">
                                <label for="password">Mật khẩu <span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="password">Giới tính <span class="required">*</span></label>
                                <span>Nam</span><input type="radio" aria-label="Radio button for following text input">
                                <span>Nữ</span><input type="radio" aria-label="Radio button for following text input">
                            </p>
                            <div class="clear"></div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
                <!-- .entry-content -->
            </article>
            <!-- #post -->
        </div>
    </div><!--./main-content-->
@endsection
