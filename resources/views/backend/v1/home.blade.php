@extends('backend.v1.layouts.app')

@push('styles')
<!-- Morris chart -->
{{-- <link rel="stylesheet" href="{{asset("backend/bower_components/morris.js/morris.css")}}"> --}}
<!-- jvectormap -->
{{-- <link rel="stylesheet" href="{{asset("backend/bower_components/jvectormap/jquery-jvectormap.css")}}"> --}}
@endpush

@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $order }}</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $product }}<sup style="font-size: 20px">%</sup></h3>

            <p>Products</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $customer }}</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </section>
@stop

@push('scripts')
<!-- Morris.js charts -->
{{-- <script src="{{asset("backend/bower_components/raphael/raphael.min.js")}}"></script>
<script src="{{asset("backend/bower_components/morris.js/morris.min.js")}}"></script> --}}
<!-- Sparkline -->
{{-- <script src="{{asset("backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js")}}"></script> --}}
<!-- jvectormap -->
{{-- <script src="{{asset("backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{asset("backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset("backend/dist/js/pages/dashboard.js")}}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset("backend/dist/js/demo.js")}}"></script> --}}
@endpush
