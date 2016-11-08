<link href="<?php echo base_url() . "assets/plugins/datatables/dataTables.bootstrap.css"; ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการข้อมูลสถานประกอบการ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงข้อมูลสถานประกอบการ
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">จัดการข้อมูลสถานประกอบการทั้งหมด</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <table  id="example2" class="table table-bordered table-hover table-striped">
                                <thead class="bg-aqua-gradient ">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อสถานประกอบการ</th>
                                        <th>ที่อยู่สถานประกอบการ</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($establsih as $row) {
                                        $id_es = $row['id_es'];
                                        $name_es = $row['name_es'];
                                        $address_es = $row['address_es'];
                                        $tell_es = $row['tell_es'];
                                        $website = $row['website'];

                                        $link = anchor('teacher/showDetailestablish/' . $id_es, "$name_es");
                                        $update = anchor('teacher/getform_update/' . $id_es, '<button  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>');

//                                        $attributs = "onclick= \"return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')\" ";
                                        $delete = "<button  class='btn btn-danger btn-xs' onclick='deleted($id_es)'><i class='fa fa-trash-o'></i></button>";
                                        ?>
                                        <tr id="es<?php $id_es ?>">
                                            <td  align="center"><?php echo $i++; ?></td>
                                            <td><?php echo $name_es; ?></td>
                                            <td><?php echo $address_es; ?></td>
                                            <td align="center"><?php echo $update; ?></td>
                                            <td align="center"><?php echo $delete; ?></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><!--/.box-body -->
                    </div><!--/.box -->
                </div><!--/.col -->
            </div><!--/.row -->
        </div>
    </div>
</div>
<div id="dataConfirmModal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ยืนยันการลบข้อมูล</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ยืนยันการลบข้อมูลสถานประกอบการ</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": false,
            "bInfo": true,
            "bAutoWidth": false,
            "searching": true
        });
    });
</script>

<script>
    function deleted(id) {
        $('#dataConfirmModal').modal({show: true});

        $(".modal-body #modal_id").val(id);
        $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
            $.post("<?php echo base_url('teacher/delete_establis'); ?>",
                    {
                        "id": id
                    }, function (data) {
                location.reload(true);
//                console.log(data);

            });

        });
    }
</script>
