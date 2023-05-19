<?php
$app = $this->db->query("select * from company_profile")->row();
?>
<footer class="main-footer">
    <strong>Copyright &copy; <?= !empty($app->year) ? $app->year : '' ?> <a
                href="<?= !empty($app->website) ? $app->website : '#' ?>"><?= isset($app) ? $app->company : '' ?></a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
        <?= !empty($app->version) ? '<b>Version </b>' . $app->version : '' ?>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/template/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<!--<script src="<?= base_url(); ?>assets/template/plugins/sparklines/sparkline.js"></script>-->
<!-- JQVMap -->
<!--<script src="<?= base_url(); ?>assets/template/plugins/jqvmap/jquery.vmap.min.js"></script>-->
<!--<script src="<?= base_url(); ?>assets/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/template/dist/js/adminlte.js"></script>

<!--Internal  Sweet-Alert js-->
<script src="<?php echo base_url('assets/template/'); ?>plugins/sweet-alert/dist/js/sweetalert2.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!--<script src="--><? //= base_url(); ?><!--assets/template/dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?= base_url(); ?>assets/template/dist/js/pages/dashboard.js"></script>-->
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url(); ?>assets/js_system/index.js">
</script>

<?php if (isset($js_page)) { ?>
    <script src="<?= base_url('assets/js_system/') . $js_page ?>.js"></script>
<?php } ?>

<script>
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('.select2').select2()
    });

    $(function () {
        // Summernote
        $('#short_desciption').summernote();
        $('#long_desciption').summernote();
        $('#content_article').summernote();
        $('#about_desc').summernote();
        $('#about_vision').summernote();
        $('#about_mision').summernote();


        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

</body>
</html>