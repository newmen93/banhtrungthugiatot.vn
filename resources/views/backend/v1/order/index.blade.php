@extends('backend.v1.layouts.app')

@section('button')
@stop

@section('content')
<div class="row" style="overflow-x:auto">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Danh sách đơn hàng</a></li>
            </ul>
            <div class="tab-content">
                <div class="activetab-pane" id="settings">
                    <table class="table table-hover" id="order-tb" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
@include('backend.v1.layouts.data-table-script')
<script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script>

<script>
$(document).ready(function() {
    //CKEDITOR.replace('summary-ckeditor');
    $('#order-tb').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        language: {
            url: "{{asset('backend/dataTable/Vietnamese.json')}}"
        },
        serverSide: true,
        processing: true,
        ajax: {
            url:"{{route('admin.order.table')}}",
            dataType:"json",
            type:"POST",
            data:{"_token":"<?=csrf_token() ?>"}
        },
        columns: [
            {data: 'code'},
            {data: 'customer', searchable: true},
            {data: 'total', orderable: false},
            {data: 'status_value', orderable: false},
            {data: 'created_at', orderable: false}, //, orderable: false
            {data: 'action', orderable: false} //orderable: false, searchable: false
        ]
    });

    $('#order-tb').on('click', 'tr td .btn-edit', function () {
        //alert('Clicked row id is: ' + $(this).data('id'));
        $("#productDetail").modal()
    });
    $('#order-tb').on('click', 'tr td .btn-delete', function () {
        //alert('Clicked row id is: ' + $(this).data('id'));
        $("#confirmDelete").modal()
    });
});
</script>
@endpush
