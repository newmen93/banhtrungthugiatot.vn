@extends('frontend.v1.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')
                <span class="current">Đăng nhập</span>

            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <div id="wpo-content" class="wpo-content col-xs-12 no-sidebar">
            <article id="post-9" class="post-9 page type-page status-publish hentry">
                <h1 class="wpo-title">Đăng nhập</h1>
                <div class="content">
                    <div class="woocommerce">
                        @include('frontend.v1.user.user-login-form')
                    </div>
                </div>
                <!-- .entry-content -->
            </article>
            <!-- #post -->
        </div>
    </div>
    <!--./main-content-->
@endsection
