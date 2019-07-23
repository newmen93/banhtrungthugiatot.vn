@extends('backend.v1.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Thêm mới danh mục</a></li>
                </ul>
                <div class="tab-content">
                    <div class=" activetab-pane" id="settings">
                        @include('backend.v1.category._form',['mode'=>'create'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
