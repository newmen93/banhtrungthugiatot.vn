@extends('backend.v1.layouts.app') 
@section('button')

<a href="{{url('admin/product/')}}" class="btn btn-primary btn-sm m-btn--square m-btn--icon m-btn--icon-only" title="Edit">
    <i class="fa fa-arrow-left"></i> Quay lại
</a> 
@stop 
@section('content')
<form action="" method="put" id="update-product-form">
    <input type="hidden" name="product_id" value="{{$product->id}}" />
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Cập Nhật Mặt Hàng</h4>
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
                                <input type="text" class="form-control" required name="product_name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nhóm Hàng<span style="color:crimson">(*)</span></label>
                                <select class="form-control" required name="product_category">
                                <option value="">None</option>

                                @foreach ($categories as $cate)
                                    <option value="{{$cate->k_id}}" @if($product->category_id == $cate->k_id) selected @endif>{{$cate->name}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group">
                                <label for="message-text" title="Số lượng sản phẩm tối thiếu để mua được với giá bán sỉ" class="col-form-label">Định mức bán giá sỉ</label>
                                <input class="form-control" type="number" name="si_quantity" value="{{$product->quantity_si}}">
                            </div>

                            <div class="form-group">
                                <label for="message-text" title="Số lượng sản phẩm tối thiếu để mua được với giá bán sỉ" class="col-form-label">Hash Tag</label>
                                <input class="form-control" id="ton-kho" type="text" name="hash_tag" value="{{$product->hashtag}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" title="Tồn kho" class="col-form-label">Tồn Kho</label>
                                <input class="form-control" type="number" name="total_quantity" value="{{$product->total_quantity}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" title="Giá vốn" class="col-form-label">Giá Vốn</label>
                                <input class="form-control" type="number" name="cost" value="{{$product->cost}}">
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Hot</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="is_hot" value="1" @if($product->is_hot) checked
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">New</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="is_new" value="1" @if($product->is_new) checked
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Discount</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="is_discount" value="1" @if($product->is_discount)
                                            checked @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            Chọn hình: <input type="file" id="gallery-photo-add" name="img" multiple accept="image/x-png,image/gif,image/jpeg">
                            <div id="gallery-imgs" class="gallery" style="overflow-y:auto;overflow-x:hidden;height:350px;">
                                @foreach ($product->color as $item)
                                <div class="form-group row img" style="border-width: thin;" name="img_color">
                                    <div class="col-md-5">
                                        <img style="height:60px;width:60;" name="imgP" class="img-selected" src="{{asset($item->image_path)}}">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="text" class="color-card" style="float:left" ;height:40px;width:40px; name="colorP" value="{{$item->color}}">
                                    </div>

                                    <div class="col-md-2">
                                        <button type='button' class="btn btn-sm btn-danger remove-img">X</button>
                                    </div>
                                    <hr>
                                    <br/>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Quản Lý Size Và Giá
                                <a href="#costAndSize" data-toggle="collapse" data-target="#costAndSize" style="float: right" id="open_size_zone_btn">Ẩn/Hiện</a>
                            </div>
                            <div class="panel-body collapse" id="costAndSize">
                                <button type="button" class="btn-add-size btn btn-success btn-md m-btn--square m-btn--icon m-btn--icon-only" style="float:right"
                                    title="add new">
                                    Thêm Size
                                <i class="fa fa-plus"></i>
                            </button> @foreach ($product->color as $color) @foreach ($color->size
                                as $size)
                                <div class="form-group" id="size-price">
                                    <div class="row size-cost" style="overflow-x: auto;width:100%;white-space: nowrap;display: inline-flex;">
                                        <div class="col-sm-2" style="">
                                            <label for="message-text" class="col-form-label">Size</label>
                                            <input class="form-control" type="text" name="size" value="{{$size->size}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Giá sỉ</label>
                                            <input class="form-control" min="0" type="number" name="price_si" value="{{$size->si_price}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="message-text" class="col-form-label">Giá lẻ</label>
                                            <input class="form-control" min="0" type="number" name="price_le" value="{{$size->base_price}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="message-text" class="col-form-label">Giá disscount</label>
                                            <input class="form-control" min="0" type="number" name="price_disscount" value="{{$size->discount_price}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Tồn kho</label>
                                            <input class="form-control" min="0" type="number" name="remaining" value="{{$size->quantity}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Chọn Màu</label>
                                            <select name="color" class="form-control lst-colors-product">
                                                        <option value="{{$color->color}}">{{$color->color}}</option>
                                                    </select>
                                        </div>
                                        <div class="col-md-2">
                                            <br/>
                                            <button type="button" class="btn-delete-size btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                            <button type="button" class="btn-edit-size btn btn-primary btn-md m-btn--square m-btn--icon m-btn--icon-only" title="edit">
                                               
                                                        <i class="fa fa-edit"></i>
                                                   </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach @endforeach
                            </div>
                        </div>
                    </div>


                    {{--
                    <div class="panel-group">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Quản Lý Thuộc Tính <a href="#productAtribute" data-toggle="collapse" data-target="#productAtribute"
                                    style="float: right">Ẩn/Hiện</a>
                                <a href="" data-toggle="collapse" data-target="" style="float: right">Ẩn/Hiện</a>
                            </div>

                            <div class="panel-body collapse" id="productAtribute">
                                <div class="form-group">
                                    <div class="row" style="border:hotpink">
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Thuộc Tính<span style="color:crimson">(*)</span></label>
                                            <input class="form-control" type="text" name="atrribute">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="message-text" class="col-form-label">Giá Trị<span style="color:crimson">(*)</span></label>
                                            <input class="form-control" min="0" type="number" name="attribute_value">
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
                    </div> --}}

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
                                            <input class="form-control" placeholder="cái, chiếc, thùng ..." type="text" name="basic_unit" value="{{$product->unit}}">
                                        </div>
                                    </div>
                                    {{--
                                    <div class="form-group" id="size-price">
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
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Mô Tả
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <textarea class="form-control" id="summary-ckeditor" name="description">{{$product->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Mẫu ghi chú (hóa đơn, đặt hàng)
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
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
        <button type="submit" class="btn btn-primary save" value="Submit" id="save-product-btn">Lưu</button>
    </div>

</form>


@stop @push('scripts')
<script>
    var colorsList = [];
        var sizeArr = [];
        var colorImageCollection = [];
        var colorSelectedArr = [];

       

        function loadColorCard(){
            console.log(sizeArr);
            const gallery = $('#gallery-imgs').children('.form-group');
            colorsList = [];
            for(var i = 0; i < gallery.length; i++){
                var input_color = gallery[i].getElementsByClassName('color-card');
                var color = input_color[0].value;
                colorsList.push(color);
            }

                $('select.lst-colors-product').find("option").remove();
                $('select.lst-colors-product').append(`<option>Please Select</option>`)
                colorsList.forEach(color => {
                    var colorElement = `<option value="`+color+`">`+color+`</option>`
                    $('select.lst-colors-product').append(colorElement);
                });

                for(var i=0;i<sizeArr.length;i++){
                        const color = sizeArr[i].color;
                        var row = $($('#costAndSize').find('div.form-group'));
                        var select = $(row.find('select.lst-colors-product')[i]);
                         select.find("option[value='"+color+"']").attr('selected', 'selected');
                    }

            
        }

        $(document).ready(function() {
            const ele = `<div class="form-group">
                <div class="row size-cost" style="overflow-x: auto;width:100%;white-space: nowrap;display: inline-flex;">

                    <div class="col-md-2">
                        <label for="message-text" class="col-form-label">Size</label>
                        <input class="form-control" name="size"  type="text">
                    </div>

                    <div class="col-md-2">
                        <label for="message-text" class="col-form-label">Giá sỉ</label>
                        <input class="form-control" name="price_si"  min="0" type="number">
                    </div>

                    <div class="col-md-2">
                        <label for="message-text" class="col-form-label">Giá lẻ</label>
                        <input class="form-control" name="price_le"  min="0" type="number">
                    </div>

                    <div class="col-sm-2">
                        <label for="message-text" class="col-form-label">Giá disscount</label>
                        <input class="form-control" name="price_disscount" min="0" type="number" name="price_disscount[]">
                    </div>

                    <div class="col-md-2">
                        <label for="message-text" class="col-form-label">Tồn kho</label>
                        <input class="form-control" min="0" type="number" name="remaining">
                    </div>

                    <div class="col-md-2">
                        <label for="message-text" class="col-form-label">Chọn Màu</label>
                        <select name="color" class="form-control lst-colors-product">

                        </select>
                    </div>

                    <div class="col-md-2">
                        <br>
                        <button type="button" class="btn-delete-size btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                            <i class="fa fa-trash-o"></i>
                        </button>
                        <button type="button" class="btn-edit-size btn btn-primary btn-md m-btn--square m-btn--icon m-btn--icon-only" title="edit">
                    
                    <i class="fa fa-edit"></i>
                </button>  

                    </div>


                </div>
            </div>`;

            const unitEle = `<div class="form-group" >
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="message-text" class="col-form-label">Tên Đơn Vị</label>
                                        <input class="form-control"   type="text" name="unit">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="message-text" class="col-form-label">Giá Trị Qui Đổi</label>
                                        <input class="form-control"   min="0" type="number" name="value">
                                    </div>

                                    <div class="col-md-2">
                                        <label for="message-text" class="col-form-label">Giá Bán</label>
                                        <input class="form-control"   min="0" type="number" name="uprices">
                                    </div>
                                    <div class="col-md-2">
                                        <br/>
                                        <button type="button"  class="btn-delete-unit btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        <button type="button" class="btn-add-unit btn btn-success btn-md m-btn--square m-btn--icon m-btn--icon-only" title="add new">
                                                        <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
            const atrEl = `<div class="form-group">
                            <div class="row" style="border:hotpink">

                                <div class="col-md-2">
                                    <label for="message-text" class="col-form-label">Thuộc Tính<span style="color:crimson">(*)</span></label>
                                    <input class="form-control" type="text">
                                </div>

                                <div class="col-md-2">
                                    <label for="message-text" class="col-form-label">Giá Trị<span style="color:crimson">(*)</span></label>
                                    <input class="form-control" min="0" type="number">
                                </div>

                                <div class="col-md-2">
                                    <br/>
                                    <button type="button" class="btn-delete-atr btn btn-danger btn-md m-btn--square m-btn--icon m-btn--icon-only" title="delete">
                                                <i class="fa fa-trash-o"></i>
                                        </button>

                                    <button type="button" class="btn-add-atr btn btn-success btn-md m-btn--square m-btn--icon m-btn--icon-only" title="add new">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                </div>
                            </div>
                        </div>`;


            function loadCurrentSizes(){
                var sizesForm = $("#costAndSize").find('div.form-group');
                var colorSelected = null;
                for(var i=0;i<sizesForm.length;i++){
                    var row = $(sizesForm[i]);
                    $.each(row.find("select.form-control option:selected"), function(){
                        console.log(colorImageCollection);
                        for(var j = 0; j< colorImageCollection.length;j++){
                            if(colorImageCollection[j].color_name===$(this).val()){
                                colorSelected  = colorImageCollection[j].color_name;
                                colorSelectedArr.push(colorSelected);
                                colorSelectedArr = colorSelectedArr.filter((el, i, a) => i === a.indexOf(el));
                            }
                        }
                    });

                    var arr = [];
                    if(row.find('input[name="size"]').attr("disabled")!=="disabled"){
                            arr =  row.find('.form-control');
                    }
                    var obj = {};
                    for(var k=0;k<arr.length;k++){
                        if(arr[k].name==="color" ){
                                var s = arr[k].value;
                        }

                        if((arr[k].name==="color" && arr[k].value=="Please Select") || (arr[k].name==="size" && arr[k].value.trim()=="")){
                            alert("Nhập size và màu trước khi tiếp tục");
                            return;
                        }


                        if(arr[k].name==="color"){
                            obj[arr[k].name]  = colorSelected;
                        }else{
                            obj[arr[k].name] = arr[k].value;
                        }
                    }
                    if(!isEmpty(obj)){
                        sizeArr.push(obj);
                    }
                    console.log(sizeArr);
                    

                   
                }

                for(var i=0;i<sizeArr.length;i++){
                        const color = sizeArr[i].color;
                        var row = $($('#costAndSize').find('div.form-group'));
                        var select = $(row.find('select.lst-colors-product')[i]);
                        select.find("option[value='"+color+"']").attr('selected', 'selected');
                        row.find('input.form-control').attr("disabled","true");
                        row.find('select.lst-colors-product').attr("disabled","true")
                    }



            }

            $('body').on('click','#open_size_zone_btn',function(){
                console.log("open");
                getColorImagesCollection();     
                loadCurrentSizes();
            });

            $('body').on('change','input.color-card',function(){                      
                loadColorCard();           
            });

            window.onload = (event) => {         
                getColorImagesCollection();     
                loadCurrentSizes();      
            };
          
            $('body').on('click','.btn-add-size', function(e){     
                    if(!checkSavedCurrentSize()){
                        alert("Bạn chưa lưu size hiện tại !");
                        return;
                    }               
                    getColorImagesCollection();                    
                    var index_latest = $('#costAndSize').find('div.form-group').length-1 ;
                    var latestRow = $($('#costAndSize').find('div.form-group')[index_latest]);
                    if(!isEmpty(latestRow) && latestRow.find('input[name="size"]').val().trim()!="" && latestRow.find('input[name="size"]').attr("disabled")==="disabled"){
                        console.log(latestRow.find('input[name="size"]').val().trim());
                        loadCurrentSizes();
                        // addNewSizeRow();
                        // index_latest = $('#costAndSize').find('div.form-group').length-1 ;
                        // latestRow = $($('#costAndSize').find('div.form-group')[index_latest]);
                    }

                    // check if size and color existed, return
                    if((latestRow.find('input[name="size"]').attr("disabled")!=="disabled") && checkIfExistSizeAndColor(latestRow)){
                        return;
                    }

                    var colorSelected = null;
                    $.each(latestRow.find("select.form-control option:selected"), function(){
                        console.log(colorImageCollection);
                        for(var i = 0; i< colorImageCollection.length;i++){
                            if(colorImageCollection[i].color_name===$(this).val()){
                                colorSelected  = colorImageCollection[i].color_name;
                                colorSelectedArr.push(colorSelected);
                                colorSelectedArr = colorSelectedArr.filter((el, i, a) => i === a.indexOf(el));
                            }
                        }
                    });

                var arr = [];
                if(latestRow.find('input[name="size"]').attr("disabled")!=="disabled"){
                        arr =  latestRow.find('.form-control');
                }
                var obj = {};
                    for(var i=0;i<arr.length;i++){
                        if(arr[i].name==="color" ){
                                var s = arr[i].value;
                        }

                        if((arr[i].name==="color" && arr[i].value=="Please Select") || (arr[i].name==="size" && arr[i].value.trim()=="")){
                            alert("Nhập size và màu trước khi tiếp tục");
                            return;
                        }


                        if(arr[i].name==="color"){
                            obj[arr[i].name]  = colorSelected;
                        }else{
                            obj[arr[i].name] = arr[i].value;
                        }
                    }
                    if(!isEmpty(obj)){
                        sizeArr.push(obj);
                    }

                /**
                    Disabled all input in all size-row
                **/
                var allRow = $($('#costAndSize').find('div.form-group'));
                for(var i=0;i<allRow.length;i++){
                $(allRow[i]).find('input.form-control').attr("disabled","true");
                $(allRow[i]).find('select.lst-colors-product').attr("disabled","true")
                }


                addNewSizeRow();

                console.log(sizeArr);

            });

            // remove duplicate by property
            function removeDuplicates(myArr, prop) {
                return myArr.filter((obj, pos, arr) => {
                    return arr.map(mapObj => mapObj[prop]).indexOf(obj[prop]) === pos;
                });
            }



            function getColorImagesCollection(){
                colorImageCollection=[];
                var gallery = $('#gallery-imgs').children('div.form-group');
                    for(var i =0; i< gallery.length;i++){
                        var img_src = $(gallery[i]).find('img.img-selected').attr('src');
                        var color_name = $(gallery[i]).find('input.color-card').val();
                        colorImageCollection.push({
                            "color_name":color_name,
                            "image_src":img_src
                        });
                    }
                    // colorImageCollection =removeDuplicates(colorImageCollection,"color_name");
                    colorImageCollection = uniqueElements(colorImageCollection, (a,b) => a.color_name === b.color_name && a.image_src === b.image_src );
            }

                const uniqueElements = (arr, fn) => arr.reduce((acc, v) => {
                    if (!acc.some(x => fn(v, x))) { acc.push(v); }
                    return acc;
                }, []);



            function isEmpty(obj) { for(var key in obj) { if(obj.hasOwnProperty(key)) return false; } return true; }

            function reAssigneColorValue(){
                for(var i=0;i<sizeArr.length;i++){
                        const color = sizeArr[i].color;
                        var row = $($('#costAndSize').find('div.form-group'));
                        var select = $(row.find('select.lst-colors-product')[i]);
                        select.find("option[value='"+color+"']").attr('selected', 'selected');;
                    }

            }

            function checkIfExistSizeAndColor(latestRow){
                var size = latestRow.find('input[name="size"]').val();
                var color = latestRow.find('select[name="color"]').val();


                for(var i=0;i<sizeArr.length;i++){
                    var s = sizeArr[i]["size"] ;
                    var c = sizeArr[i]["color"];

                    if(size===sizeArr[i]["size"] && color === sizeArr[i]["color"]){
                        alert("Trùng size và màu đã có, vui lòng kiểm tra lại !");
                        return true;
                    }
                }
            }

            function addNewSizeRow(){
                $('#costAndSize').append(ele);
                // disabled delete button in the row just added
                var index_latest = $('#costAndSize').find('div.form-group').length-1 ;
                var latestRow = $($('#costAndSize').find('div.form-group')[index_latest]);
                var PreRow = $($('#costAndSize').find('div.form-group')[index_latest-1]);
                PreRow.find('button.btn-delete-size').removeAttr("disabled");
                latestRow.find('button.btn-delete-size').attr("disabled","disabled");

                loadColorCard();
                reAssigneColorValue();
                let div = $('#costAndSize div.form-group');
                let button = $(this).closest('div.form-group').find('button.btn-add-size');
                if(button.length>0){
                    button.prop('disabled',true);
                }
            }




        

            $('body').on('click','.btn-edit-size',function(e){
                /**
                    Disabled all input in all size-row
                **/
                var allRow = $($('#costAndSize').find('div.form-group'));
                for(var i=0;i<allRow.length-1;i++){
                var editbtn = $(allRow[i]).find('i.fa-save');
                if(editbtn.length>0 && ($(this).find('i.fa-save').length==0)){
                    alert("Bạn chưa lưu size hiện tại !");
                    return;
                }    
                $(allRow[i]).find('input.form-control').attr("disabled","true");
                $(allRow[i]).find('select.lst-colors-product').attr("disabled","true");
                }
                var row = $(this).closest('div.size-cost');
                row.toggleClass("editing");
                switchEditAndSaveBtn($(this));
            });


            function switchEditAndSaveBtn(btn){

                var isEdit = $(btn).find('i.fa-edit').length>0;
                var row = $(btn).closest('div.size-cost');
                if(isEdit){           
                    $(btn).find('i.fa').replaceWith("<i class='fa fa-save'></i>");
                    var row = $(btn).closest('div.size-cost');
                        var inputs = row.find('input.form-control');
                        var select = row.find('select.lst-colors-product').first();
                        select.attr("disabled",false);
                        for(var i=0;i<inputs.length;i++){
                            $(inputs[i]).attr("disabled",false);
                        }
                }else{
                    if(checkIfExistSizeAndColorWhenEdit(row)){
                        alert("Đang có màu và size trùng nhau, hãy kiểm tra lại !");
                        var row = $(btn).closest('div.size-cost');
                        var inputs = row.find('input.form-control');
                        var select = row.find('select.lst-colors-product').first();
                        select.attr("disabled",false);
                        for(var i=0;i<inputs.length;i++){
                            $(inputs[i]).attr("disabled",false);
                        }
                        return;
                    }else{
                        $(btn).find('i.fa').replaceWith("<i class='fa fa-edit'></i>");
                        var row = $(btn).closest('div.size-cost');
                        var inputs = row.find('input.form-control');
                        var select = row.find('select.lst-colors-product').first();
                        select.attr("disabled",true);
                        for(var i=0;i<inputs.length;i++){
                            $(inputs[i]).attr("disabled",true);
                        };
                        getSizeFormValues();
                        console.log(sizeArr)
                    }            
                }
            }


            function getSizeFormValues(){
                if(!checkSavedCurrentSize()){
                    alert("Bạn chưa lưu size hiện tại !");
                    return;
                }
                var rows = $('#costAndSize').find('div.form-group');
                sizeArr = [];
                for(var i =0;i<rows.length;i++){
                    var sizeform = $(rows[i]).find("input[name='size']");
                    var colorForm = $(rows[i]).find("select[name='color']");

                    var arr = $(rows[i]).find('.form-control');
                    var obj = {};
                    for(var k=0;k<arr.length;k++){
                        if(arr[k].name==="color" ){
                                var s = arr[k].value;
                        }
                        if(arr[k].name==="color"){
                            obj[arr[k].name]  = colorForm.val();
                        }else{
                            obj[arr[k].name] = arr[k].value;
                        }
                    }
                    if(obj.color!="Please Select" && obj.size!=""){
                        sizeArr.push(Object.assign({},obj));    
                    }
                   

                }
                console.log(sizeArr)
                // return sizes;
            }


            function checkSavedCurrentSize(){
            var allRow = $($('#costAndSize').find('div.form-group'));
            var isSave = true;
            for(var i=0;i<allRow.length-1;i++){
            var editbtn = $(allRow[i]).find('i.fa-save');
            if(editbtn.length>0 && ($(this).find('i.fa-save').length==0)){               
                isSave = false;
            }    
            }
            return isSave
        }

        function checkIfExistSizeAndColorWhenEdit(latestRow) {
            var rows = $('#costAndSize').find('div.form-group');
            var list = [];
            for(var i =0;i<rows.length-1;i++){
                var sizeform = $(rows[i]).find("input[name='size']");
                var colorForm = $(rows[i]).find("select[name='color']");

                list.push({
                    size: sizeform.val(),
                    color:colorForm.val()
                });
                

            }
            
            console.log({LIST:list});
            const beforeDistinct = list.length;
            const afterDistinct = uniqueElements(list, (a,b) => a.size === b.size && a.color === b.color ).length;
            if(afterDistinct!=beforeDistinct){
                
                return true;
            }else{
                return false;
            }

        }


            






            $('body').on('click','.btn-delete-size', function(e){
                var size = $(this).closest('div.size-cost').find('input[name="size"]').val();
                var color = null;
                for(var i=0;i<sizeArr.length;i++){
                        if(size===sizeArr[i]["size"]){
                            color = sizeArr[i]["color"];
                            sizeArr.splice(i,1);
                        }
                }

                for(var i=0; i < colorSelectedArr.length;i++){
                    var c = colorSelectedArr[i];
                    if(colorSelectedArr[i]===color){
                        colorSelectedArr.splice(i,1);
                    }
                }




                let div = $('#costAndSize div.form-group');
                let button = $(this).closest('div.form-group').prev().find('button.btn-add-size');
                $(this).closest('div.form-group').remove();
                button.prop('disabled',false);
                console.log(sizeArr)
                // if(div.length==2){
                //     button.prop('disabled',false);
                // }
            });




            // Atribut Product Add Events
            $('body').on('click','.btn-add-atr', function(e){
                $('#productAtribute').append(atrEl);
                let div = $('#productAtribute div.form-group');
                let button = $(this).closest('div.form-group').find('button.btn-add-atr');
                if(button.length>0){
                    button.prop('disabled',true);
                }
            });

            $('body').on('click','.btn-delete-atr', function(e){
                let div = $('#productAtribute div.form-group');
                let button = $(this).closest('div.form-group').prev().find('button.btn-add-atr');
                $(this).closest('div.form-group').remove();
                if(div.length==2){
                    button.prop('disabled',false);
                }
            });

            // Unit Product Add Events
            $('body').on('click','.btn-add-unit', function(e){
                $('#productUnit').append(unitEle);
                let div = $('#productUnit div.form-group');
                let button = $(this).closest('div.form-group').find('button.btn-add-unit');
                if(button.length>0){
                    button.prop('disabled',true);
                }
            });

            $('body').on('click','.btn-delete-unit', function(e){
                let div = $('#productUnit div.form-group');
                let button = $(this).closest('div.form-group').prev().find('button.btn-add-unit');
                $(this).closest('div.form-group').remove();
                if(div.length==3){
                    button.prop('disabled',false);
                }
            });

         

            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            console.log(event)
                            var imgSelection = `
                                        <div class="form-group row img" style="border-width: thin;" name="img_color">

                                            <div class="col-md-5">
                                                <img style="height:60px;width:60;" name="imgP" class="img-selected">
                                            </div>

                                            <div class="col-md-5">
                                                    <input type="text" class="color-card" style="float:left";height:40px;width:40px; name="colorP">
                                            </div>

                                            <div class="col-md-2">
                                                    <button type='button' class="btn btn-sm btn-danger remove-img">X</button>
                                            </div>
                                            <hr>
                                            <br/>
                                        </div>
                                        `
                                        setTimeout(() => {
                                            loadColorCard();
                                        }, 500);

                            $($.parseHTML(imgSelection)).find('img').attr('src', event.target.result).closest('div.row').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }

                }
            };

            $('body').on('click','.remove-img', function(e) {
                let img = $(this).closest('div.form-group');
                let colorRemove = img.find('input.color-card')[0].value;
                let colorGroup = $("select.lst-colors-product").find("option");

                for(var i =0 ;i <colorSelectedArr.length;i++){
                    if(colorRemove === colorSelectedArr[i]){
                        alert("Màu đang được dùng, không thể xóa 1");
                        return;
                    }
                }

                for(var i=0;i<colorGroup.length;i++){
                    if(colorRemove===colorGroup[i].value){
                        colorGroup[i].remove();
                    }
                }

                for(var i = 0; i < colorImageCollection.length;i++){
                    if(colorRemove===colorImageCollection[i].color_name){
                        colorImageCollection.splice(i,1);
                    }
                }
                img.remove();
            });

            $('#gallery-photo-add').on('change', function() {

                imagesPreview(this, 'div.gallery');
            });

            $('body').on('change','.color-card',function(){
                loadColorCard();
            });

            $('body').on('submit','#update-product-form', function(e) {
                e.preventDefault();
                getSizeFormValues();
                getColorImagesCollection();
                if(sizeArr.length==0) alert("Mặt hàng phải có ít nhất 1 size ! Hãy kiểm tra lại ");
                let values = [];
                let obj= {};
                let product =$(this).serialize();
                let colors = colorImageCollection;
                let sizes = sizeArr;
                let data = {},pair;
                pairs = product.split('&');
                for (let i = 0; i < pairs.length; i++) {
                    pair = pairs[i];
                    separatorIndex = pair.indexOf('=');
                    if (separatorIndex === -1) {
                        escapedKey = pair;
                        escapedValue = '';
                    } else {
                        escapedKey = pair.substr(0, separatorIndex);
                        escapedValue = pair.substr(separatorIndex + 1);
                    }
                    key = decodeURIComponent(escapedKey);
                    value = decodeURIComponent(escapedValue);
                    data[key] = value;
                }
                let requestObject = {
                    'product': data,
                    'colors': colors,
                    'sizes': sizes
                }
                console.log(requestObject);
                let url = `${location.origin}/admin/product/update/${data['product_id']}`;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: url,
                    data: requestObject,
                    success: function(data){
                        console.log(data);
                         location.reload();
                        // $('#update-product-form').trigger("reset");

                    },
                    error:function(data){
                        console.log(data);
                    }
                });

            });
        })

</script>


@endpush