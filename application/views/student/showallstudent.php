<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <section class="content-header">
                <h1>
                    ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักศึกษา</a></li>
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
                    <?php if($student !=NULL){
                        extract($student);
                    }  else {
                        echo NULL;
                    }
                    ?>
                    <form action="<?php echo base_url() . 'index.php/home/showdataall' ?>" method="post" id="form1">
                        <div class="col-lg-6 text-right">
                            <h5>ค้นหาด้วยปีการศึกษาและสาขาวิชา :</h5>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select name="year" id="year"  class="form-control" value="<?php echo $row['year']; ?>">
                                    <?php foreach ($year as $row) { ?>
                                        <option value="<?= $row['year']; ?>"><?= $row['year']; ?></option>

                                    <?php }
                                    ?>
                                </select>
                            </div>                                
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group"> 
                                <select name="major" id="major"  class="form-control">
                                    <option value="all">เลือกทั้งหมด</option>
                                    <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                    <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                </select>
                            </div>                                
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-default" type="submit ">ค้นหา</button>
                        </div>
                    </form>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ปีการศึกษา</th>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ-นามสกุล</th>
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
                                        $year=$row['year'];

                                        echo "<tr>
                        <td>$year</td>
                        <td>$id_st</td>
                        <td>$name_st $lastname_st</td>
                        <td>$major</td> 
                        <td>$name_es</td>
                       
             </tr>";
                                    } echo " ";
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
    $(function() {
//        $('#example1').dataTable();
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
//    });
//    $('#form1').submit(function() {
//        alert('dddd');
//        $.ajax({
//            url: "../student/showdataall",
//            type: "POST",
//            data: new FormData(this), //{id:$('input:text').val()}
//            contentType: false,
//            cache: false,
//            processData: false,
//            success: function(jd)
//        });
    })


</script>