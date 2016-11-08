<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    ข้อมูลนักศึกษา
                    <small>สาขาเทคโนโลยีสารสนเทศ</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                    <li class="active">สาขาเทคโนโลยีสารสนเทศ</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">รายชื่อนักศึกษาสาขาเทคโนโลยีสารสนเทศ</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>รหัสนักศึกษา</th>
                                            <th>ชื่อนักศึกษา</th>
                                            <th>นามสกุล</th>
                                            <th>สาขาวิชา</th>
                                            <th>ชื่อสถานประกอบการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($student)) {
                                            foreach ($student as $row) {
                                                $id_st = $row['id_st'];
                                                $name_st = $row['name_st'];
                                                $lastname_st = $row['lastname_st'];
                                                $major = $row['major'];
                                                $name_es = $row['name_es'];

                                                echo "<tr>
                        <td>$id_st</td>
                        <td>$name_st</td>
                        <td>$lastname_st</td>
                        <td>$major</td> 
                        <td>$name_es</td>
                       
             </tr>";
                                            }echo " ";
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
    </div><!-- ./wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2015 <p>มหาวิทยาลัยราชภัฏอุตรดิตถ์ เลขที่ 27 ถ.อินใจมี อ.เมือง จ.อุตรดิตถ์ 53000</strong>
    </footer>
    <div class='control-sidebar-bg'></div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="http://localhost/projectstudent/assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="http://localhost/projectstudent/assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="http://localhost/projectstudent/assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/projectstudent/assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
    </script>