<form class="form-horizontal" action="{{route('admin.email.store')}}" method="post" id="form-email">
    @csrf
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Tên</label>

        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="inputName">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Chủ đề</label>

        <div class="col-sm-10">
            <input type="text" class="form-control" name="subject" id="inputEmail">
        </div>
    </div>

    <div class="form-group">
        <label for="inputNote" class="col-sm-2 control-label">Nội dung</label>

        <div class="col-sm-10">
            <textarea class="form-control" name="note" id="inputNote" placeholder="Ghi chú"></textarea>
        </div>
    </div>
    {{-- <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Lưu</button>
        </div>
    </div> --}}
</form>
