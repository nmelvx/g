<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            @include('admin.includes.header')
        </header>

        <aside class="main-sidebar">
            @include('admin.includes.sidebar')
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            @include('admin.includes.footer')
        </footer>

    </div>


    <!-- jQuery 2.2.3 -->
    {{ HTML::script('admin/assets/plugins/jQuery/jquery-2.2.3.min.js') }}
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    {{ HTML::script('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    {{ HTML::script('admin/assets/plugins/morris/morris.min.js') }}
    <!-- Sparkline -->
    {{ HTML::script('admin/assets/plugins/sparkline/jquery.sparkline.min.js') }}
    <!-- jvectormap -->
    {{ HTML::script('admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
    {{ HTML::script('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
    <!-- jQuery Knob Chart -->
    {{ HTML::script('admin/assets/plugins/knob/jquery.knob.js') }}
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    {{ HTML::script('admin/assets/plugins/daterangepicker/daterangepicker.js') }}
    <!-- datepicker -->
    {{ HTML::script('admin/assets/plugins/datepicker/bootstrap-datepicker.js') }}
    <!-- Bootstrap WYSIHTML5 -->
    {{ HTML::script('admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
    <!-- Slimscroll -->
    {{ HTML::script('admin/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}
    <!-- FastClick -->
    {{ HTML::script('admin/assets/plugins/fastclick/fastclick.js') }}
    <!-- AdminLTE App -->
    {{ HTML::script('admin/assets/js/app.min.js') }}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{ HTML::script('admin/assets/js/pages/dashboard.js') }}
    <!-- AdminLTE for demo purposes -->
    {{ HTML::script('admin/assets/js/demo.js') }}

</body>
</html>