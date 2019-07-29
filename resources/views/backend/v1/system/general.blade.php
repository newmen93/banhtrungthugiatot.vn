@extends('backend.v1.layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" integrity="sha256-f/v2ew/bb0v4el1ALE7bOoXGUDWGk2k+dkPLo3JPhLw=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#website" data-toggle="tab">Thông tin website</a></li>
                <li><a href="#settings" data-toggle="tab">Cài đặt chung</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="website">
                    <form class="form-horizontal" action="{{route('admin.system.general.update')}}" method="post">
                        <div class="form-group">
                            <input type="hidden" name="info" value="info">
                            <label for="fanpage" class="col-sm-2 control-label">Fan page</label>
                            @csrf
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fanpage" placeholder="Fan page" value="{{$fanpage}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{$email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{$phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="address" placeholder="Địa chỉ">{{$address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank" class="col-sm-2 control-label">Số tài khoản ngân hàng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="bank" placeholder="Số tài khoản ngân hàng" value="{{$bank}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('admin.system.general.update')}}" method="post">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Tiêu đề (title)</label>
                            @csrf
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Mô tả (description)</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" placeholder="Mô tả">{{''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Giới thiệu</label>

                            <div class="col-sm-10">
                                <textarea id="about" class="form-control summernote" name="description" placeholder="Giới thiệu">{{''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.min.js" integrity="sha256-Q4K0T9IUORjpebn9dIu9szj2Rgn7GmLF+S3RjgM8aXw=" crossorigin="anonymous"></script>
<script>
$('.summernote').summernote({
    height: 200
});
</script>
@endpush