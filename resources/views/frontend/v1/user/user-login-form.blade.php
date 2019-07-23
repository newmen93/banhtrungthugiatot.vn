<form method="post" class="login" action="{{ route('user.login') }}">
    {{-- <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p> --}}
    <p class="form-row form-row-first">
        @csrf
        <label class="">Email <abbr class="required" title="required">*</abbr></label>
        <input type="email" class="input-text " name="email" placeholder="customer@gmail.com" value="">
    </p>
    <p class="form-row form-row-last">
        <label for="password">Mật khẩu <span class="required">*</span></label>
        <input class="input-text" type="password" name="password" id="password">
    </p>
    <div class="clear"></div>
    <p class="form-row">
        <label for="rememberme" class="inline">
            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Ghi nhớ
        </label>
    </p>
    <p class="lost_password">
        <a href="#">Quên mật khẩu?</a>
    </p>
    <div class="clear"></div>
    <button type="submit" class="btn btn-primary">Gửi</button>
    <div class="clear"></div>

</form>
