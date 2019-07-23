@extends('backend.v1.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Thông tin người dùng</a></li>
                </ul>
                <div class="tab-content">
                    <div class=" activetab-pane" id="settings">
                        <form class="form-horizontal" action="{{route('admin.profile.update')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Tên</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="inputName" value="{{Auth::guard('admin')->user()->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail" value="{{Auth::guard('admin')->user()->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone" class="col-sm-2 control-label">Số điện thoại</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNote" class="col-sm-2 control-label">Ghi chú</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="note" id="inputNote" placeholder="Ghi chú"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
@stop
