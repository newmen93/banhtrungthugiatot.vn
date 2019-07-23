  <form action="">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Đơn hàng
          <small class="pull-right">Ngày: {{ date_format($order->created_at,'d/m/Y') }}</small>
        </h2>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
        <strong>Khách hàng : {{ $order->customer_name }}</strong><br>
        Địa chỉ: {{ $order->address }}<br>
        Điện thoại: {{$order->customer ? $order->customer->phone : ""}}<br>
        Email: {{ $order->customer ? $order->customer->email : ""}}
      </address>
      </div>
      <div class="col-sm-4 invoice-col">

      </div>
      <div class="col-sm-4  invoice-col">
        <b>Số Đơn Hàng {{$order->code }}</b><br>
        <b>Phương Thức Thanh Toán:</b>{{$order->payments}}<br>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Số Lượng</th>
              <th>Sản Phẩm</th>
              <th>Code</th>
              <th>Giá</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order->orderDetail as $detail)
            <tr>
              <td>{{$detail->quantity}}</td>
              <td>{{$detail->product_name}}</td>
              <td>{{$detail->product_code}}</td>
              <td>{{$detail->price}}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-6">
        <p class="lead">Tình Trạng Đơn Hàng:</p>


        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label">{{$order->status_value}}</label>
        </div>

        @if($order->description)
        <p class="lead">Ghi Chú Đơn Hàng:</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          {{ $order->description }}
        </p>
        @endif
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Tổng Đơn</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Tổng:</th>
              <td>{{$order->total}}</td>
            </tr>
            <tr>
              <tr>
                <th>Phí Vận Chuyển:</th>
                <td>{{$order->ship_fee}}</td>
              </tr>
              <tr style="border-style:solid;border-color:indianred">
                <th>Tổng Cộng:</th>
                <td>{{$order->payment}}</td>
              </tr>
          </table>
        </div>
      </div>
    </div>
  </form>

