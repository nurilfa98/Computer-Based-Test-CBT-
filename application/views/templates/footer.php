<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>AdminLTE Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2021 Skripsi <a href="https://www.youtube.com/rilngegame354" target="_blank">nurilfa98</a>.</strong> All rights
    reserved.
</footer>


</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<!-- <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="<?= base_url() ?>assets/plugins/select2/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="<?= base_url() ?>assets/bower_components/PACE/pace.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/bower_components/select2/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- sweetalert -->
<script src="<?= base_url() ?>assets/plugins/alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/myscript.js"></script>
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-lite.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = <?php echo date('Y') ?>

    document.getElementById("date").innerHTML = " " + day + " " + months[month] + " " + year;
</script>

<!-- page script -->
<script type="text/javascript">
    $(function() {
        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    });
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function() {
        Pace.restart()
    })
    $('.ajax').click(function() {
        $.ajax({
            url: '#',
            success: function(result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
            }
        })
    })

    //Initialize Select2 Elements
    $('.select2').select2();

    $('body').on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $('body').on('shown.bs.modal', '.focusModal', function() {
        $('input:visible:enabled:first', this).focus();
    })
</script>
<!-- page script -->
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
        });

        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        });
    })
</script>

</body>

</html>