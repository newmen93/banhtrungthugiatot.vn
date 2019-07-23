<form action="{{$url}}" method="post" id="customer-form">
    <div class="form-group">
        <input type="hidden" name="type" id="type" value="{{ $mode }}">
         @csrf
        <label for="message-text" class="col-form-label">Tên Khách Hàng <span style="color:crimson">(*)</span></label>
        <input class="form-control" required id="ten-kh-new" name="name">
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Email</label>
        <input type="email" class="form-control" id="email-kh-new" name="email">
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Số Điện thoại <span style="color:crimson">(*)</span></label>
        <input type="tel" class="form-control" required id="sdt-kh-new" name="phone">
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Giới Tính</label> &nbsp; &nbsp;
        <input type="radio" name="gender" value="1"> Nam &nbsp;
        <input type="radio" name="gender" value="2"> Nữ
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Địa Chỉ</label>
        <textarea class="form-control"  rows="3" id="diachi-kh-new" name="address"></textarea>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Ghi Chú</label>
        <textarea class="form-control"  rows="3" id="ghichu-kh-new" name="note"></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-success btn-save">Lưu</button>
    </div>
</form>
