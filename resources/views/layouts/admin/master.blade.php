<!DOCTYPE html>
<html>

<head>
    @include('layouts.admin.head')
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        @include('layouts.admin.navbar')
        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-image: url('{{ url('gambar/butama.jpg')}}');">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{$title}}
                    <!-- <small>Version 1.0</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="active">{{$title}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('konten')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <!-- <b>Version</b> 1.0 -->
            </div>
            <strong>Copyright &copy; 2021 <a href="#"></a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        @include('layouts.admin.control')
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    @include('layouts.admin.script')
</body>

</html>