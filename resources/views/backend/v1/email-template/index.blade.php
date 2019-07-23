@extends('backend.v1.layouts.app')
@section('button')
    <button type="button" data-toggle="modal" data-target="#confirmCreate" class="btn btn-primary btn-sm m-btn--square m-btn--icon m-btn--icon-only"
            title="Edit">
        <i class="fa fa-plus"></i> Thêm mới
    </button>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Danh sách email mẫu</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="settings">
                    <table class="table table-hover" id="email-tb" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tên email mẫu</th>
                                <th>Ngày tạo</th>
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
                @include('backend.v1.email-template._form',['mode'=>'list'])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" form="form-email" class="btn btn-success" form="category-form">Lưu</button>
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
            $('#email-tb').DataTable({
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
                    url:"{{route('admin.email.table')}}",
                    dataType:"json",
                    type:"POST",
                    data:{"_token":"<?=csrf_token() ?>"}
                },
                columns: [
                    {data: 'name'},
                    {data: 'created_at.date'},
                    {data: 'action', orderable: false},
                ],
            });
            $('#email-tb').on('click', 'tr td .btn-edit', function () {
                //alert('Clicked row id is: ' + $(this).data('id'));
                $("#confirmCreate").modal()
            });
            $('#email-tb').on('click', 'tr td .btn-delete', function () {
                //alert('Clicked row id is: ' + $(this).data('id'));
                $("#confirmDelete").modal()
            });
        });
    </script>
@endpush
