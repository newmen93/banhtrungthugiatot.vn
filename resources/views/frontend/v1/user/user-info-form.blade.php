<p class="form-row">
    <label class="">Điện Thoại <abbr class="required" title="required">*</abbr></label>
    <input type="text" id="phone_number" class="input-text " name="tel" placeholder="Nhập sdt để lấy thông tin"
     value="@if(Auth::guard('web')->check()) {{Auth::guard('web')->user()->customer->contact_number}}@endif" required>
</p>
<p class="form-row">
    <label class="">Tên <abbr class="required" title="required">*</abbr></label>
    <input type="text" class="input-text " name="name" placeholder="Nguyễn Văn A"
    value="@if(Auth::guard('web')->check()) {{Auth::guard('web')->user()->customer->name}}@endif" required>
</p>
<p class="form-row">
    <label class="">Địa Chỉ Email <abbr class="required" title="required">*</abbr></label>
    <input type="text" class="input-text " name="email" placeholder="nva.0904@gmail.com"
    value="@if(Auth::guard('web')->check()) {{Auth::guard('web')->user()->customer->email}}@endif" required>
</p>
<p class="form-row">
    <label class="">Địa Chỉ Chi Tiết <abbr class="required" title="required">*</abbr></label>
    <input type="text" class="input-text " name="address" placeholder="123 Đường ABC"
    value="@if(Auth::guard('web')->check()){{Auth::guard('web')->user()->customer->address}}@endif" required>
</p>
<p class="form-row">
    <table>
        <thead>
            <tr>
                <th><label class="">Tỉnh<abbr class="required" title="required">*</abbr></label></th>
                <th><label class="">Quận/Huyện<abbr class="required" title="required">*</abbr></label></th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" name="sub-total" value="{{Cart::subtotal()}}"/>
            <tr>
                <input type="hidden" name="province_value">
                <td>
                    <select name="province" required>
                        <option value="#" selected>Chọn Tỉnh</option>
                    </select>
                </td>
                <td>
                    <select name="district" required>
                        <option value="#" selected>Chọn Quận/Huyện</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</p>
<p class="form-row ">
    <label for="password">Giới Tính</label>
    <span>Nam</span><input type="radio" name="gender" value="1" @if(Auth::guard('web')->check() and Auth::guard('web')->user()->customer->gender == 1) checked @endif>
    <span>Nữ</span><input type="radio" name="gender" value="2" @if(Auth::guard('web')->check() and  Auth::guard('web')->user()->customer->gender == 2) checked @endif>
</p>