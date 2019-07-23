<form class="form-horizontal" action="{{route('admin.category.store')}}" method="post" id="category-form">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Tên danh mục</label>
        @csrf
        {{-- <input type="hidden" name="type" value="create" id="type">
        <input type="hidden" name="id" value="" id="id"> --}}
        <div class="col-sm-9">
            <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
        </div>
    </div>
    <div class="form-group">
        <label for="parent" class="col-sm-3 control-label">Danh mục cha</label>
        <div class="col-sm-9">
            <select name="parent" class="form-control" id="parent">
                <option value="0" selected >Không có</option>
                @foreach($categories as $category)
                    <option value="{{$category->k_id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="priority" class="col-sm-3 control-label">Ưu tiên</label>
        <div class="col-sm-9">
            <select name="priority" class="form-control">
                <option value="" selected >--------</option>
                @php $range = [1,2,3,3,4,5,6,7,8,9,10]; @endphp
                @foreach($range as $i)
                    <option value="{{$i}}">{{$i}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if($mode == "create")
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
    @endif
</form>
