@extends('frontend.v1.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')
                <span class="current">Người dùng</span>
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <div id="wpo-content" class="wpo-content col-xs-12 no-sidebar">
            <article id="post-9" class="post-9 page type-page status-publish hentry">
                <h1 class="wpo-title">Chi tiết</h1>
                <div class="content">
                    <div class="woocommerce">
                        <form method="post" class="login" action="{{ route('update.member', Auth::guard('web')->user()->customer->id) }}">
                            @csrf
                            <p class="form-row">
                                <label class="">Điện Thoại <abbr class="required" title="required">*</abbr></label>
                                <input type="text" id="phone_number" class="input-text " name="tel" placeholder="Nhập sdt để lấy thông tin"
                                 value="@if(Auth::guard('web')->check()) {{Auth::guard('web')->user()->customer->contact_number}}@endif" required>
                            </p>
                            <p class="form-row">
                                <label class="">Tên <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="name" placeholder="Nguyễn Văn A"
                                value="@if(Auth::guard('web')->check()) {{Auth::guard('web')->user()->customer->name}}@endif" required>
                            </p>
                            <p class="form-row">
                                <label class="">Địa Chỉ Email <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="email" placeholder="nva.0904@gmail.com"
                                value="@if(Auth::guard('web')->check()) {{Auth::guard('web')->user()->customer->email}}@endif" required>
                            </p>
                            <p class="form-row">
                                <label class="">Địa Chỉ Chi Tiết <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="address" placeholder="123 Đường ABC"
                                value="@if(Auth::guard('web')->check()){{Auth::guard('web')->user()->customer->address}}@endif" required>
                            </p>
                            <p class="form-row">
                                <label for="password">Mật khẩu Mới</label>
                                <input class="input-text" type="password" name="password" id="password">
                            </p>
                            <p class="form-row">
                                <label for="password">Nhập lại mật khẩu Mới</label>
                                <input class="input-text" type="password" name="re_password" id="re_password">
                            </p>
                            <p class="form-row ">
                                <label for="password">Giới tính <span class="required">*</span></label>
                                <span>Nam</span><input type="radio" name="gender" value="1" @if(Auth::guard('web')->check() and Auth::guard('web')->user()->customer->gender == 1) checked @endif>
                                <span>Nữ</span><input type="radio" name="gender" value="2" @if(Auth::guard('web')->check() and  Auth::guard('web')->user()->customer->gender == 2) checked @endif>
                            </p>
                            <div class="clear"></div>
                            <button type="submit" class="btn btn-primary">Thay Đổi</button>
                        </form>
                    </div>
                </div>
                <!-- .entry-content -->
            </article>
            <!-- #post -->
        </div>
    </div><!--./main-content-->
@endsection