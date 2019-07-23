@extends('backend.v1.layouts.app')

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Cập nhật thông tin</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="settings">
                <form class="form-horizontal" action="{{route('admin.profile.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tên</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="inputName" value="{{Auth::guard('admin')->user()->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="inputEmail" value="{{Auth::guard('admin')->user()->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPass" class="col-sm-3 control-label">Mật khẩu</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pass" id="inputPass" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputRepass" class="col-sm-3 control-label">Nhập lại mật khẩu</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="repass" id="inputRepass" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
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

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            $form = $(this);
            axios.post($form.attr('action'), $form.serialize())
            .then(response  => {
                if (response.data.status == 1)  {
                    alertify.success(response.data['messages']);
                }else{
                    alertify.error(response.data['messages']);
                }
            })
            .catch(error => {
                console.log(error);
            });
        });
    });
</script>
@endpush
