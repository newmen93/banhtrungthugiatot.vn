<form action="{{route('admin.shipping.store')}}" method="post">

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                Định mức miễn ship nội thành
            </div>
            <div class="panel-body">
                <div class="form-group" id="ton-kho">
                    <div class="row">
                        <div class="col-md-6" title="Định mức hóa đơn thấp nhất được miễn phí ship với các địa chỉ ở nội thành HCM">
                            @csrf
                            <label for="message-text" class="col-form-label">Tổng Hóa Đơn</label>
                            <input class="form-control" type="number" name="tong-hoa-don-noi-thanh" min="0" value="{{ $noithanh->min_fee }}">
                        </div>
                        <div class="col-md-6">

                            <label for="message-text" class="col-form-label">Chọn quận nội thành được áp dụng</label>
                            <dl class="custom-dropdown">
                                <dt>
                                    <a href="#">
                                      <span class="hida">Chọn Quận</span>
                                      <p class="multiSel"></p>
                                    </a>
                                </dt>
                                <dd>
                                    <div class="mutliSelect">
                                        <ul class="lst-district">
                                            
                                        </ul>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Định mức miễn ship ngoại thành </label>
        <input type="number" min="0" class="form-control" name="tong-hoa-don-ngoai-thanh" placeholder="" value="{{ $ngoaithanh->min_fee }}">
    </div>

    <div class="form-group">
        <label>Định mức miễn ship ngoại tỉnh </label>
        <input type="number" min="0" class="form-control" name="tong-hoa-don-ngoai-tinh" placeholder="" value="{{ $ngoaitinh->min_fee }}">
    </div>

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                Qui Định Mức Giá Ship
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Giá Ship Nội Thành (HCM)</label>
                    <input type="number" min="0" class="form-control" name="gia-ship-noi-thanh" placeholder="" value="{{ $noithanh->price }}">
                </div>
                <div class="form-group">
                    <label>Giá Ship Ngoại Thành (HCM)</label>
                    <input type="number" min="0" class="form-control" name="gia-ship-ngoai-thanh" placeholder="" value="{{ $ngoaithanh->price }}">
                </div>
                <div class="form-group">
                    <label>Giá Ship Ngoại Tỉnh</label>
                    <input type="number" min="0" class="form-control" name="gia-ship-ngoai-tinh" placeholder="" value="{{ $ngoaitinh->price }}">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="jsondata" id="jsondata" value="">
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>