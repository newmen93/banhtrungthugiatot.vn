@extends('backend.v1.layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('backend/plugins/iCheck/square/blue.css')}}">
@endpush

@section('button')
<button type="button" id="sync-product" class="btn btn-success btn-sm m-btn--square m-btn--icon m-btn--icon-only"
    title="Edit">
    <i class="fa fa-spinner"></i> Sync data
</button>
{{-- <button type="button" data-toggle="modal" data-target="#productDetail" class="btn btn-primary btn-sm m-btn--square m-btn--icon m-btn--icon-only"
    title="Edit">
    <i class="fa fa-plus"></i> Thêm mới
</button> --}}
<a type="button" title="Add New Product" class="btn btn-primary btn-sm m-btn--square m-btn--icon m-btn--icon-only" href="{{url('admin/product/create')}}">
    Thêm Mới
</a>
@stop

@section('content')
<div class="row" style="overflow-x:auto">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#product-panel" data-toggle="tab">Quản Lý Sản Phẩm</a></li>
            </ul>
            <div class="tab-content">
                <div class="activetab-pane" id="product-panel">
                    <table class="table table-hover" id="product-tb" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã Hàng</th>
                                <th>Tên Hàng</th>
                                <th>Danh mục</th>
                                <th>Giá Vốn</th>
                                <th>Giá Sỉ </th>
                                <th>Giá Lẻ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Bạn Chắc Chắn Muốn Xóa ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger">Xóa</button>
            </div>
        </div>
    </div>
</div>


@stop

@push('scripts')
@include('backend.v1.layouts.data-table-script')
{{-- <script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script> --}}
{{-- <script src="{{asset('backend/plugins/iCheck/icheck.min.js')}}"></script> --}}
<script>
    $('#product-tb').on('click', 'tr td .btn-delete', function () {
        let product_id = $(this).data('id');
        $('#confirmDelete button.btn-danger').data('id', product_id);
        console.log(product_id);
        $("#confirmDelete").modal();
    });


    $('#confirmDelete button.btn-danger').on('click', function(e){
        e.preventDefault();
        let product_id = $(this).data('id');
        let url = `${location.origin}/admin/product/delete/${product_id}`;
        axios.delete(url)
        .then(response => {
            $("#confirmDelete").modal('hide');
            alertify.success('Xóa thành công')
            $('#product-tb').DataTable().ajax.reload();
        })
        .catch(err => {
            console.log(err);
            $("#confirmDelete").modal('hide');
            $('#product-tb').DataTable().ajax.reload();
        });
    });

    
    $('#sync-product').on('click',function(e){
        e.preventDefault();
        $.ajax({
            url:'{{route('admin.product.sync')}}',
            type:'POST',
            beforeSend:function(){
                $('button#sync-product i').addClass('fa-spin');
            },
            success:function(response){
                $('button#sync-product i').removeClass('fa-spin');
                alertify.success('Đồng bộ thành công');
                $('#product-tb').DataTable().ajax.reload();
            }
        });
    });



    $(document).ready(function() {
    $('#product-tb').DataTable({
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
            url:"{{route('admin.product.table')}}",
            dataType:"json",
            type:"POST",
            data:{"_token":"<?=csrf_token() ?>"}
        },
        columns: [
            {data: 'code'},
            {data: 'name', searchable: true},
            {data: 'category', orderable: false},
            {data: 'price_base', orderable: false},
            {data: 'price_si', orderable: false},
            {data: 'price_le', orderable: false}, //, orderable: false
            {data: 'action', orderable: false} //orderable: false, searchable: false
        ]
    });



});
</script>
@endpush
