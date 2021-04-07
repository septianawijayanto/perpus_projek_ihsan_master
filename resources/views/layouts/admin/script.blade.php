<!-- jQuery 3 -->
<script src="{{asset('adminlte')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('adminlte')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte')}}/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{asset('adminlte')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="{{asset('adminlte')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte')}}/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('adminlte')}}/dist/js/pages/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('adminlte')}}/ist/js/demo.js"></script> -->
<!-- DataTables -->
<script src="{{asset('adminlte')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
        $(document).ready(function() {

            var flash = "{{ Session::has('sukses') }}";
            if (flash) {
                var pesan = "{{ Session::get('sukses') }}"
                swal("Sukses", pesan, "success");
            }

            var gagal = "{{ Session::has('gagal') }}";
            if (gagal) {
                var pesan = "{{ Session::get('gagal') }}"
                swal("Error", pesan, "error");
            }

        });
        $('body').on('click', '.btn-refresh', function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
    })
</script>