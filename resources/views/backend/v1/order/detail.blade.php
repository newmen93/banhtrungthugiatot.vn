@extends('backend.v1.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('backend/plugins/iCheck/square/blue.css')}}">
@endpush
@section('button')
<a href="{{route('admin.order.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Quay lại</a>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Chi tiết</a></li>
            </ul>
            <div class="tab-content">
                @include('backend.v1.order._form')
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
@include('backend.v1.layouts.data-table-script')
<script src="{{asset('backend/plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
        
    });
</script>



@endpush
