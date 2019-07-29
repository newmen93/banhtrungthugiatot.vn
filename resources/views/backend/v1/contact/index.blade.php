@extends('backend.v1.layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" integrity="sha256-f/v2ew/bb0v4el1ALE7bOoXGUDWGk2k+dkPLo3JPhLw=" crossorigin="anonymous" />
@endpush
@section('button')
    {{-- <button type="button" data-toggle="modal" data-target="#confirmCreate" class="btn btn-primary btn-sm m-btn--square m-btn--icon m-btn--icon-only"
            title="Edit">
        <i class="fa fa-plus"></i> Thêm mới
    </button> --}}
@stop
@section('content')
<div class="row" style="overflow-x:auto">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Danh sách liên hệ</a></li>
            </ul>
            <div class="tab-content">
                <div class="activetab-pane" id="settings">
                    <table class="table table-hover" id="contact-tb" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Chủ đề</th>
                            <th>Nội dung</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal-->
<div class="modal fade" id="confirmCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông Báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @include('backend.v1.category._form',['mode'=>'list']) --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-success" form="category-form">Lưu</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#contact-tb').DataTable({
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
                url:"{{route('admin.contact.table')}}",
                dataType:"json",
                type:"POST",
                data:{"_token":"<?=csrf_token() ?>"}
            },
            columns: [
                {data: 'name', searchable: true},
                {data: 'subject'},
                {data: 'message', orderable: false},
                {data: 'action'}
            ]

        });
        $('form#category-form').on('submit', function(e){
            e.preventDefault();
            let $form = $(this);
            let action = $form.attr('action');

            console.log(action);
            axios.post(action, $form.serialize())
            .then(response => {
                if(response.data.status == 200) {
                    alertify.success('Thêm mới thành công');
                    $("#confirmCreate").modal('hide');
                    $('#category-tb').DataTable().ajax.reload();
                    $('form#category-form').trigger("reset");
                    let option = '';
                    for(let i = 0, l = categories.length; i < l; i++){
                        option += `<option value="${categories[i].id}">${categories[i].name}</option>`;
                    }
                    $('select#parent').html(option);
                }
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
            $('form#category-form').attr('action', `${window.origin}/admin/category/store`);
        });

        $('#category-tb').on('click', 'tr td .btn-edit', function () {
            $('form#category-form').trigger("reset");
            let category_id = $(this).data('id');
            let url = `${location.origin}/admin/category/edit/${category_id}`;
            axios.get(url)
            .then(response=>{
                let category = response.data.category;
                let categories = response.data.categories;

                $('form#category-form input[name="id"]').val(category.id);
                $('form#category-form input[name="name"]').val(category.name);
                $('form#category-form input[name="parent"]').val(category.parent_id);
                $('form#category-form input[name="priority"]').val(category.priority);
                $('form#category-form').attr('action', `${window.origin}/admin/category/update/${category.id}`);
            })
            .catch(err => {
                console.log(err);
            });
            $("#confirmCreate").modal('show');
        });
        $('#category-tb').on('click', 'tr td .btn-delete', function () {
            let category_id = $(this).data('id');
            $('#confirmDelete button.btn-danger').data('id',category_id);
            console.log(category_id);
            $("#confirmDelete").modal();
        });
        $('#confirmDelete button.btn-danger').on('click', function(e){
            e.preventDefault();
            let category_id = $(this).data('id');
            let url = `${location.origin}/admin/category/delete/${category_id}`;
            axios.delete(url)
            .then(response => {
                console.log(response.data);
                if(response.data.status == 403) {
                    $("#confirmDelete").modal('hide');
                    alertify.error('Dữ liệu đang được sử dụng');
                }
                if(response.data.status == 200) {
                    $("#confirmDelete").modal('hide');
                    alertify.success('Xóa thành công');
                    $('#category-tb').DataTable().ajax.reload();
                }
            })
            .catch(err => {
                console.log(err);
            });
        });
    });
</script>
@endpush
