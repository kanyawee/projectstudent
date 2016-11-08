<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="page-header">
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <h4> แสดงชื่อสถานประกอบการทั้งหมด</h4>
                </li>
            </ol>
        </div>
    </div>
    <!-- Main content -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" align='center'>รายชื่อสถานประกอบการ</h3>
                </div>
                <div class="panel-body"> 
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อสถานประกอบการ</th>
                                <td>ที่อยู่</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($establish != NULL) {
                                foreach ($establish as $value) {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $value['name_es']; ?></td>
                                        <td><?= $value['address_es']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2015 <p>มหาวิทยาลัยราชภัฏอุตรดิตถ์ เลขที่ 27 ถ.อินใจมี อ.เมือง จ.อุตรดิตถ์ 53000</strong>
</footer>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<!-- page script -->

<script type="text/javascript">
    $(function() {
        //$('#example1').dataTable();
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": true,
            "bAutoWidth": false
        });
    });

</script>
