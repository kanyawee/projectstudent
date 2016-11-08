   
<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <section class="content-header">
                <h1>
                    ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลสถานประกอบการ</a></li>
                </ol>
            </section>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10  col-lg-offset-1" >
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <form action="<?php echo base_url('establishment/showdataestablish'); ?>" method="post" id="form1">
                        <div class="col-lg-9 text-right">
                            <h5>ค้นหาด้วยปีการศึกษา :</h5>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group"> 
                                <select name="year" id="year"  class="form-control">
                                    <?php foreach ($year as $row) { ?>
                                        <option value="<?= $row['year']; ?>"><?= $row['year']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>                                
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-default" type="submit ">ค้นหา</button>
                        </div>
                    </form>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ชื่อสถานประกอบการ</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทร</th>
                                    <th>เว็บไซต์</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($establish)) {
                                    foreach ($establish as $row) {
//                                        $year = $row['year'];
                                        $name_es = $row['name_es'];
                                        $address_es = $row['address_es'];

                                        $tell_es = $row['tell_es'];
                                        $website = $row['website'];
                                        ?>
                                        <tr>
                                            <td><?= $name_es; ?></td>
                                            <td><?= $address_es; ?></td>

                                            <td><?= $tell_es; ?></td> 
                                            <td><a onclick="window.open('http://<?= $website ?>')" href="#"><?= $website; ?></a></td> 
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
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
                                                $(function () {
                                                    $('#example1').dataTable();
                                                    $('#example2').dataTable({
                                                        "bPaginate": true,
                                                        "bLengthChange": false,
                                                        "bFilter": false,
                                                        "bSort": false,
                                                        "bInfo": true,
                                                        "bAutoWidth": false
                                                    });
                                                });

</script>
