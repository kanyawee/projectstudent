<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ข้อมูลนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <!--                    <li class="active">
                                            <i class="fa fa-table"></i> <a href="<?php echo base_url('index.php/teacher/selectdata'); ?>">ค้นหาข้อมูลนักศึกษา</a>
                                        </li>-->
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงข้อมูลนักศึกษา
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลนักศึกษาทั้งหมด</h3>
                    </div>
                    <div class="panel-body"> 
<!--                        <div class="col-md-7"></div>
                        <div class="col-md-2">
                            <select class="form-control" id="selectyear" name="selectyear">
                                <option value="all">ปีการศึกษา</option>
                                <?php foreach ($year as $value): ?>
                                    <option  
                                        value="<?php echo $value['semester'] . "/" . $value['year'] ?> " >
                                            <?php echo $value['semester'] . "/" . $value['year'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3"> 
                            <p>
                                <select class="form-control" id="selectmajor" name="selectmajor">
                                    <option  value="all">กรุณาเลือกสาขา</option>
                                    <option  value="วิทยาการคอมพิวเตอร์"> วิทยาการคอมพิวเตอร์</option>
                                    <option  value="เทคโนโลยีสารสนเทศ"> เทคโนโลยีสารสนเทศ</option>
                                </select>
                            </p>
                        </div>-->

                        <div id="bored" class="col-lg-12">
                            <div class="table-responsive">
                                <table id="example2"  class="table table-bordered table-hover table-striped">
                                    <thead class="bg-aqua-gradient">
                                        <tr>
                                            <th align='center'>ลำดับ</th>
                                            <th align='center'>รหัสนักศึกษา</th>
                                            <th align='center'>ชื่อ-นามสกุล</th>
                                            <th align='center'>เบอร์โทร</th>
                                            <th align='center'>สาขาวิชา</th>
                                            <th align='center'>แก้ไข</th>
                                            <th align='center'>ลบ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    foreach ($datastudent as $row) {
                                        $id_st = $row['id_st'];
                                        $name_st = $row['name_st'];
                                        $lastname_st = $row['lastname_st'];
                                        $tell_st = $row['tell_st'];
                                        $major = $row['major'];
                                        $link = anchor('teacher/detailstudent/' . $id_st, "$name_st" . "&nbsp;&nbsp;&nbsp;" . " $lastname_st");
                                        $update = anchor('teacher/updatestudent/' . $id_st, '<button  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>');
                                        $delete = "<button  class='btn btn-danger btn-xs' onclick='deleted($id_st)'><i class='fa fa-trash-o'></i></button>";
                                        ?>
                                        <tr id='but<?= $id_st ?>'>
                                            <td align="center"><?= $i++; ?></td>
                                            <td align="center"><?= $id_st ?></td>
                                            <td><?= $link ?></td>
                                            <td align="center"><?= $tell_st ?></td> 
                                            <td><?= $major ?></td>
                                            <td align="center"><?= $update ?></td>
                                            <td align="center"><?= $delete ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <p>ยืนยันการลบข้อมูลนักศึกษา</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<!--<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>-->
<!-- DATA TABES SCRIPT -->

<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": false,
            "bInfo": true,
            "bAutoWidth": false
        });
    });

    function deleted(id) {
        $('#dataConfirmModal').modal({show: true});

        $(".modal-body #modal_id").val(id);
        $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
            $.post("<?php echo base_url('teacher/delete_student'); ?>",
                    {
                        "id": id
                    }, function (data) {
                location.reload(true);
//                console.log(data);
//                alert(data);

            });
        });
    }


    $("#selectyear").change(function () {
        var select = $("#selectyear").val();
        var major = $("#selectmajor").val();
        var year = select.substring(2, 6);
        var semester = select.substring(0, 1);
//        alert(year);
//        alert(semester);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/showall'); ?>',
            data: {
                year: year,
                semester: semester,
                major: major
            },
            success: function (response) {
                console.log(response);
                document.getElementById("bored").innerHTML = response;
            }
        });
    });
    $("#selectmajor").change(function () {
        var major = $("#selectmajor").val();
        var select = $("#selectyear").val();
        var year = select.substring(2, 6);
        var semester = select.substring(0, 1);
//        alert(year);
//        alert(semester);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/showall'); ?>',
            data: {
                year: year,
                semester: semester,
                major: major
            },
            success: function (response) {
                console.log(response);
                document.getElementById("bored").innerHTML = response;
            }
        });
    });

</script>