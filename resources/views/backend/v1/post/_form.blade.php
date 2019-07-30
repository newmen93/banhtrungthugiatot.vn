<form class="form-horizontal" action="{{route('admin.post.store')}}" method="post" id="post-form">
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Tiêu đề bài viết</label>
        @csrf
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" placeholder="Tên bài viết">
        </div>
    </div>
    <div class="form-group">
        <label for="image" class="col-sm-2 control-label">Ảnh thumb</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="image">
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Nội dung</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control summernote">
            </textarea>
        </div>
    </div>
</form>
