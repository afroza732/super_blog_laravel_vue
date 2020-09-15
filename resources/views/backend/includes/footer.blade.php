<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">Ambala.It</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.4
    </div>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<script src="{{ asset('/') }}/backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/') }}/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/') }}/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('/') }}/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('/') }}/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('/') }}/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/') }}/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('/') }}/backend/plugins/moment/moment.min.js"></script>
<script src="{{ asset('/') }}/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/') }}/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('/') }}/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/') }}/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/') }}/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/') }}/backend/dist/js/demo.js"></script>
<!-- datatables -->
<script src="{{ asset('/') }}/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="{{ asset('/') }}/backend/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('/') }}/backend/jquery-validation/additional-methods.min.js"></script>
<!-- jquery-sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- jquery-notify -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "autoWidth": false
        , });
    });
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?'
                , text: "Delete this data!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!'
                        , 'Your file has been deleted.'
                        , 'success'
                    )
                }
            })
        });
    });

</script>
<script>
    $('#image').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

</script>
</body>
</html>
