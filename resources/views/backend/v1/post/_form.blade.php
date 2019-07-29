<form class="form-horizontal" action="{{route('admin.post.store')}}" method="post" id="post-form">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Tiêu đề bài viết</label>
        @csrf
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Ảnh thumb</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="image">
        </div>
    </div>
    <div class="form-group">
        <label for="parent" class="col-sm-2 control-label">Nội dung</label>
        <div class="col-sm-10">
            <textarea name="parent" class="form-control summernote" id="parent">
            </textarea>
        </div>
    </div>
   
    {{-- @if($mode == "create")
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-success">Thêm</button>
        </div>
    </div>
    @endif
    @if($mode == "edit")
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-success">Lưu</button>
        </div>
    </div>
    @endif --}}
</form>
