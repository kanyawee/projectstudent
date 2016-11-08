<footer class="main-footer">
    <div class="container">
        <strong >Copyright &copy; 2014-2015 <p>มหาวิทยาลัยราชภัฏอุตรดิตถ์ เลขที่ 27 ถ.อินใจมี อ.เมือง จ.อุตรดิตถ์ 53000</p></strong>
    </div><!-- /.container -->
</footer>
</div>
</div><!-- ./wrapper -->
</body>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>'></script>
<!-- AdminLTE for demo purposes -->
<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatable/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatable/responsive.bootstrap.min.js'); ?>"></script>

</html>
<script>
    $(function() {
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>