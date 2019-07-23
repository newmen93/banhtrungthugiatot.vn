@extends('backend.v1.layouts.app') 
@section('content')

<!-- Main content -->
<section class="invoice">
  <form action="">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> AdminLTE, Inc.
          <small class="pull-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
        <strong>Admin, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        Phone: (804) 123-5432<br>
        Email: info@almasaeedstudio.com
      </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
        <strong>John Doe</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        Phone: (555) 539-1037<br>
        Email: john.doe@example.com
      </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Số Đơn Hàng #007612</b><br> {{-- <br> --}} {{-- <b>Order ID:</b> 4F3S8J<br> --}}
        <b>Phương Thức Thanh Toán:</b>COD (Chuyển tiền khi nhận hàng)<br> {{-- <b>Account:</b> 968-34567 --}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Số Lượng</th>
              <th>Sản Phẩm</th>
              <th>Màu Sắc</th>
              <th>Kích Thước</th>
              <th>Tổng</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2</td>
              <td>Kem Đánh Răng PS</td>
              <td>PST</td>
              <td>Vừa</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Kem Đánh Răng PS</td>
              <td>PST</td>
              <td>Vừa</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Kem Đánh Răng PS</td>
              <td>PST</td>
              <td>Vừa</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Kem Đánh Răng PS</td>
              <td>PST</td>
              <td>Vừa</td>
              <td>$64.50</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Tình Trạng Đơn Hàng:</p>


        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label">Đặt Hàng Thành Công</label>
          <div class="col-sm-8">
            <input type="checkbox" value="0" name="order_success" readonly class="form-control-plaintext" id="pre-pay">
          </div>
        </div>

        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label" title="thanh toán khi nhận hàng" title="Khách đã thanh toán đơn hàng hay chưa ">Đã Thanh Toán ? </label>
          <div class="col-sm-8">
            <input type="checkbox" value="1" name="paid" readonly class="form-control-plaintext" id="cod">
          </div>
        </div>

        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label" title="thanh toán khi nhận hàng">Đang Vận Chuyển</label>
          <div class="col-sm-8">
            <input type="checkbox" value="2" name="shipping" readonly class="form-control-plaintext" id="cod">
          </div>
        </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label" title="thanh toán khi nhận hàng">Đã Nhận Hàng</label>
          <div class="col-sm-8">
            <input type="checkbox" value="3" name="received" readonly class="form-control-plaintext" id="cod">
          </div>
        </div>


        <p class="lead">Ghi Chú Đơn Hàng:</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Hàng dễ vỡ, xin hãy nhẹ tay nhé :)
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Tổng Đơn</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Tổng:</th>
              <td>$260</td>
            </tr>
            <tr>
              <tr>
                <th>Phí Vận Chuyển:</th>
                <td>$5.80</td>
              </tr>
              <tr style="border-style:solid;border-color:indianred">
                <th>Tổng Cộng:</th>
                <td>$265.24</td>
              </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->



  </form>
</section>
<!-- /.content -->






@stop @push('scripts')
  @include('backend.v1.layouts.data-table-script')
<script type="text/javascript">
  $(document).ready(function() {
        $('#customer-tb').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            language: {
                url: "{{asset('backend/dataTable/Vietnamese.json')}}"
            },
            serverSide: true,
            processing: true,
            ajax: {
                url:"{{route('admin.customer.table')}}",
                dataType:"json",
                type:"POST",
                data:{"_token":"<?=csrf_token() ?>"}
            },
            columns: [
                {data: 'code'},
                {data: 'username', searchable: true},
                {data: 'name', orderable: false},
                {data: 'email', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'address', orderable: false}, //, orderable: false
                {data: 'action', orderable: false} //orderable: false, searchable: false
            ]

        });

        $('#customer-tb').on('click', 'tr td .btn-edit', function () {
            //alert('Clicked row id is: ' + $(this).data('id'));
            $("#updateCustomer").modal()
        });
        $('#customer-tb').on('click', 'tr td .btn-delete', function () {
            //alert('Clicked row id is: ' + $(this).data('id'));
            $("#confirmDelete").modal()
        });
    });

</script>



@endpush