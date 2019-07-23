@extends('frontend.v1.layouts.app')

@section('content')
    <!-- Process -->
    <div id="process" class="section">
        <!-- container -->
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success text-center">
                    <div class="panel-heading">Đặt thành công</div>
                    <div class="panel-body">
                        Mã đặt của bạn là: <label style="color: #f36700">{{ Session::get('code') }}</label><br/>
                        Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.
                    </div>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /Process -->
@endsection