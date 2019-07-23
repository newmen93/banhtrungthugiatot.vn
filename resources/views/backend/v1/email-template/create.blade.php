@extends('backend.v1.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#email" data-toggle="tab">Tạo mới mẫu</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="email">
                        @include('backend.v1.email-template._form',['mode' => 'create'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
