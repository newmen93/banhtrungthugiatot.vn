
<form action="" method="post" id="create-product-form">
        {{-- <input type="checkbox"   name="is_hot" value="1" >
        <input type="checkbox"  name="is_new" value="1" >
        <input type="checkbox"   name="is_discount" value="1"> --}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tạo Mới Mặt Hàng</h4>
    </div>
    <div class="modal-body" style="background-color:white">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#productInfomation" aria-controls="uploadTab" role="tab" data-toggle="tab">Thông Tin Mặt Hàng</a>
                </li>
                <li role="presentation"><a href="#productDescription" aria-controls="browseTab" role="tab" data-toggle="tab">Mô Tả Chi Tiết</a>

                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="productInfomation">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                @csrf
                                <label for="recipient-name" class="col-form-label">Tên Hàng<span style="color:crimson">(*)</span></label>
                                <input type="text" class="form-control" required id="ten-hang" name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nhóm Hàng<span style="color:crimson">(*)</span></label>
                                <select class="form-control" id="danh-muc" required name="product_category">
                                    <option value="">None</option>

                                    @foreach ($categories as $cate)
                                        <option value="{{$cate->k_id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="message-text" title="Số lượng sản phẩm tối thiếu để mua được với giá bán sỉ" class="col-form-label">Định mức bán giá sỉ</label>
                                <input class="form-control" id="ton-kho" type="number" name="si_quantity">
                            </div>

                            <div class="form-group">
                                <label for="message-text" title="Số lượng sản phẩm tối thiếu để mua được với giá bán sỉ" class="col-form-label">Hash Tag</label>
                                <input class="form-control" id="ton-kho" type="text" name="hash_tag">
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Hot</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox"  class="form-control" name="is_hot" value="1" id="hang-hot" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">New</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox"  class="form-control" name="is_new" value="1" id="hang-moi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Discount</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox"  class="form-control" name="is_discount" value="1" id="hang-giam-gia">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            Select images: <input type="file" id="gallery-photo-add" name="img" multiple
                                                accept="image/x-png,image/gif,image/jpeg">
                                            <div id="gallery-imgs" class="gallery" style="overflow-y:auto;overflow-x:hidden;height:350px;"></div>

                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Quản Lý Size Và Giá
                                <a href="#costAndSize" data-toggle="collapse" data-target="#costAndSize" style="float: right">Ẩn/Hiện</a>
                            </div>
                            <div class="panel-body collapse" id="costAndSize">
                                <button type="button" class="btn-add-size btn btn-success btn-md m-btn--square m-btn--icon m-btn--icon-only" style="float:right" title="add new">
                                        Thêm Size
                                    <i class="fa fa-plus"></i>
                                </button>
                                <div class="form-group">
                                    <div class="row size-cost" style="overflow-x: auto;width:100%;white-space: nowrap;display: inline-flex;">
                                        <div class="col-sm-2" style="">
                                            <label for="message-text" class="col-form-label">Size</label>
                                            <input class="form-control" type="text" name="size">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Giá vốn</label>
                                            <input class="form-control" min="0" type="number" name="price_von">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Giá sỉ</label>
                                            <input class="form-control" min="0" type="number" name="price_si">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="message-text" class="col-form-label">Giá lẻ</label>
                                            <input class="form-control" min="0" type="number" name="price_le">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="message-text" class="col-form-label">Giá disscount</label>
                                            <input class="form-control" min="0" type="number" name="price_disscount">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Tồn kho</label>
                                            <input class="form-control" min="0" type="number" name="remaining">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Chọn Màu</label>
                                            <select name="color"  class="form-control lst-colors-product">          
                                                                                
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <br/>
                                            <button type="button" class="btn-delete-size btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                               
                                                                <i class="fa fa-trash-o"></i>
                                            </button>                                           
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>


                    <div class="panel-group">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Quản Lý Thuộc Tính
                                {{-- <a href="#productAtribute" data-toggle="collapse" data-target="#productAtribute" style="float: right">Ẩn/Hiện</a> --}}
                                <a href="" data-toggle="collapse" data-target="" style="float: right">Ẩn/Hiện</a>
                            </div>

                            <div class="panel-body collapse" id="productAtribute">
                                <div class="form-group">
                                    <div class="row" style="border:hotpink">
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Thuộc Tính<span style="color:crimson">(*)</span></label>
                                            <input class="form-control" type="text" name="thuoc-tinh[]">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Giá Trị<span style="color:crimson">(*)</span></label>
                                            <input class="form-control" min="0" type="number" name="gia-tri-thuoc-tinh[]">
                                        </div>
                                        <div class="col-md-2">
                                            <br/>
                                            <button type="button" disabled class="btn-delete-atr btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                                        <i class="fa fa-trash-o"></i>
                                                </button>
                                            <button type="button" class="btn-add-atr btn btn-success btn-md m-btn--square m-btn--icon m-btn--icon-only" title="add new">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Quản Lý Đơn Vị Tính
                                <a href="#productUnit" data-toggle="collapse" data-target="#productUnit" style="float: right">Ẩn/Hiện</a>
                            </div>

                            <div class="panel-body collapse" id="productUnit">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="message-text" class="col-form-label">Đơn Vị Cơ Bản</label>
                                            <input class="form-control" placeholder="cái, chiếc, thùng ..." type="text" name="basic_unit">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group" id="size-price">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="message-text" class="col-form-label">Tên Đơn Vị</label>
                                                <input class="form-control" type="text" name="unit">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="message-text" class="col-form-label">Giá Trị Qui Đổi</label>
                                                <input class="form-control" min="0" type="number" name="value">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="message-text" class="col-form-label">Giá Bán</label>
                                                <input class="form-control" min="0" type="number" name="uprices">
                                            </div>
                                            <div class="col-md-2">
                                                <br/>
                                                <button type="button" disabled class="btn-delete-unit btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                <button type="button" class="btn-add-unit btn btn-success btn-md m-btn--square m-btn--icon m-btn--icon-only" title="add new">
                                                                        <i class="fa fa-plus"></i>
                                                        </button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="productDescription">
                    {{-- <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Định Mức Tồn
                            </div>
                            <div class="panel-body">
                                <div class="form-group" id="ton-kho">
                                    <div class="row">
                                        <div class="col-md-6" title="Hệ thống sẽ dựa vào thông tin này để cảnh báo nếu hàng trong kho tồn < mức tồn ít nhất">
                                            <label for="message-text" class="col-form-label">Ít Nhất</label>
                                            <input class="form-control" type="number" name="min">
                                        </div>
                                        <div class="col-md-6" title="Hệ thống sẽ dựa vào thông tin này để cảnh báo nếu hàng trong kho tồn > mức tồn nhiều nhất">
                                            <label for="message-text" class="col-form-label">Nhiều Nhất</label>
                                            <input class="form-control" type="number" name="max">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Mô Tả
                            </div>
                            <div class="panel-body">
                                <div class="form-group" id="mo-ta">
                                    <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Mẫu ghi chú (hóa đơn, đặt hàng)
                            </div>
                            <div class="panel-body">
                                <div class="form-group" id="ghi-chu">
                                    <textarea class="form-control" rows="5" name="note"></textarea>
                                </div>

                            </div>

                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary save" value="Submit" id="save-product-btn">Lưu</button>
    </div>

</form>
