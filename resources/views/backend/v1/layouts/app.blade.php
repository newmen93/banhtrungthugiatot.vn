<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>banhtrungthugiatot.vn | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset("backend/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("backend/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("backend/bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("backend/dist/css/AdminLTE.min.css")}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {{-- <link rel="stylesheet" href="{{asset("backend/dist/css/skins/_all-skins.min.css")}}"> --}}
  <link rel="stylesheet" href="{{asset("backend/dist/css/skins/skin-blue.min.css")}}">
  <!-- Pace style -->
  <link rel="stylesheet" href="{{asset("/backend/plugins/pace/pace.min.css")}}">

  <!-- Date Picker -->
  {{-- <link rel="stylesheet" href="{{asset("backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}"> --}}
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="{{asset("backend/bower_components/bootstrap-daterangepicker/daterangepicker.css")}}"> --}}
  <!-- bootstrap wysihtml5 - text editor -->
  {{-- <link rel="stylesheet" href="{{asset("backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}"> --}}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- AlertifyJS CDN CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css">
  @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <a href="{{route('admin.home')}}" class="logo">

      <span class="logo-mini">AdminLTE</span>

      <span class="logo-lg"><b>ALTE2</b></span>
    </a>
    @include('backend.v1.layouts.header-navbar')
  </header>

    @include('backend.v1.layouts.left-sidebar')

  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        @yield('button')
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      @include('backend.v1.layouts.flash-message')
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
    <strong>Copyright &copy; {{date("Y")}} <a target="_blank" href="https://dkteam.tk">DKTEAM</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset("backend/bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("backend/bower_components/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("backend/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- PACE -->
<script src="{{asset("backend/bower_components/PACE/pace.min.js")}}"></script>

<!-- jQuery Knob Chart -->
{{-- <script src="{{asset("backend/bower_components/jquery-knob/dist/jquery.knob.min.js")}}"></script> --}}
<!-- daterangepicker -->
{{-- <script src="{{asset("backend/bower_components/moment/min/moment.min.js")}}"></script> --}}
{{-- <script src="{{asset("backend/bower_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script> --}}
<!-- datepicker -->
{{-- <script src="{{asset("backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script> --}}
<!-- Bootstrap WYSIHTML5 -->
{{-- <script src="{{asset("backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script> --}}
<!-- Slimscroll -->
<script src="{{asset("backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
{{-- <script src="{{asset("backend/bower_components/fastclick/lib/fastclick.js")}}"></script> --}}
<!---- axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset("backend/dist/js/adminlte.min.js")}}"></script>

<script src="{{asset("frontend/js/address.js")}}"></script>

<!-- main App -->
<script src="{{asset("backend/js/main.js")}}"></script>
<script type="text/javascript">
  $(document).ajaxStart(function() {
    Pace.restart();
  });
  $('.flash').delay(500).fadeIn('normal', function() {
    $(this).delay(2500).fadeOut();
  });
</script>
<script type="text/javascript" src="//cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
@stack('scripts')
</body>
</html>
