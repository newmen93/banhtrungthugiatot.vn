@extends('backend.v1.layouts.app')
@section('button')
    <button type="button" id="sync-customer" class="btn btn-success btn-sm m-btn--square m-btn--icon m-btn--icon-only"
        title="Edit">
        <i class="fa fa-spinner"></i> Sync data
    </button>
    <button type="button" data-toggle="modal" data-target="#addCustomer" class="btn btn-primary btn-sm m-btn--square m-btn--icon m-btn--icon-only"
            title="Edit">
        <i class="fa fa-plus"></i> Thêm mới
    </button>
@stop
@section('content')
<div class="row" style="overflow-x:auto">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#customer-panel" data-toggle="tab">Quản Lý Khách hàng</a></li>
            </ul>
            <div class="tab-content">
                <div class="activetab-pane" id="customer-panel">
                    <table class="table table-hover" id="customer-tb" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã Khách Hàng</th>
                                <th>Tên Đăng Nhập</th>
                                <th>Tên Khách Hàng</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.v1.customer.modal')

@stop

@push('scripts')
@include('backend.v1.layouts.data-table-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#sync-customer').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url:'{{route('admin.customer.sync')}}',
                type:'POST',
                beforeSend:function(){
                    $('button#sync-customer i').addClass('fa-spin');
                },
                success:function(response){
                    $('button#sync-customer i').removeClass('fa-spin');
                    alertify.success('Đồng bộ thành công');
                    console.log(response);
                    $('#customer-tb').DataTable().ajax.reload();
                }
            });
        });
       /* $( "#updateCustomer" ).on('shown', function(){
            alert("I want this to appear after the modal has opened!");
        });*/
        //create new user
        $('form#customer-form').on('submit', function(e){
            e.preventDefault();
            $form = $(this);

            let type = $form.find('input#type').val();
            let action = $form.attr('action');

            axios.post(action, $form.serialize())
            .then(response => {
                if(response.data.status == 200) {
                    alertify.success('Cập nhật thành công');
                    $('#customer-tb').DataTable().ajax.reload();
                    $('form#customer-form').trigger("reset");
                    $('#updateCustomer').modal("hide");
                }
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
                //alertify.error('Thêm mới thất bại');
            });
        });
        //Datatable list
        var $anchor=$('#customer-tb');
        $anchor.DataTable({
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
                url:"{{route('admin.customer.table')}}",
                dataType:"json",
                type:"POST",
                data:{"_token":"<?=csrf_token() ?>"}
            },
            columns: [
                {data: 'code'},
                {data: 'username', searchable: true},
                {data: 'name', orderable: false},
                {data: 'email', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'address', orderable: false}, //, orderable: false
                {data: 'action', orderable: false} //orderable: false, searchable: false
            ]

        });
        //edit customer
        $('#customer-tb').on('click', 'tr td .btn-edit', function () {
            $('form#customer-form').trigger("reset");
            let customer_id = $(this).data('id');

            console.log(customer_id);
            axios.get(`${location.origin}/admin/customer/edit/${customer_id}`)
            .then(response => {
                let obj = response.data.data;
                $('form#customer-form input[name="name"]').val(obj.name);
                $('form#customer-form input[name="email"]').val(obj.email);
                $('form#customer-form input[name="phone"]').val(obj.contact_number);
                $('form#customer-form input[name="address"]').val(obj.address);
                $('form#customer-form input[name="note"]').val(obj.note);
            })
            .catch(err => {
                console.log(err);
            });
            $('form#customer-form').attr('action',`${location.origin}/admin/customer/update/${customer_id}`);
            $("#updateCustomer").modal('show');
        });
        //delete customer
        $('#customer-tb').on('click', 'tr td .btn-delete', function () {
            let customer_id = $(this).data('id');
            console.log(customer_id);
            $('#confirmDelete button.btn-danger').data('id', customer_id);
            $("#confirmDelete").modal('show');
        });
        $('#confirmDelete button.btn-danger').on('click', function(e){
            e.preventDefault();
            let customer_id = $(this).data('id');
            let url = `${location.origin}/admin/customer/delete/${customer_id}`;
            axios.delete(url)
            .then(response => {
                $('#confirmDelete').modal('hide');
                alertify.success('Xóa thành công');
                $('#customer-tb').DataTable().ajax.reload();
                console.log(response.data);
                //$anchor.DataTable().ajax.reload();
            })
            .catch(err => {
                console.log(err);
            });
        })
    });
</script>
@endpush
