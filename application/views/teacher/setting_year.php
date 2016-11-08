<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<link href="<?php echo base_url('/assets/css/titatoggle-dist.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    กำหนดปีการศึกษาและภาคเรียน
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> กำหนดปีการศึกษาและภาคเรียน
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title ">กำหนดปีการศึกษาและภาคเรียน </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1 ">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">แสดงปีการศึกษาและภาคเรียน</h3><button style=" float: right" class="btn btn-info" type="submit" name="submit" onclick="showmodal();">
                                        <i class="fa fa-plus pull-right " aria-hidden="true" onclick="showmodal();">&nbsp;เพิ่ม</i></button>

                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 50px" class="text-center">ปีการศึกษา</th>
                                            <th style="width: 50px" class="text-center">ภาคเรียน</th>
                                            <th style="width: 10%" class="text-center"></th> 
                                        </tr>
                                        <?php
                                        if ($datayear != NULL) {
                                            foreach ($datayear as $key => $value) {
                                                $id_set = $value['id_set'];
                                                $year = $value['year'];
                                                $semester = $value['semester'];
                                                $status = $value['status'];
                                                // print_r($year);
                                                ?>
                                                <tr>
                                                    <td class="text-center" width="40%"><?php echo $year; ?></td>
                                                    <td class="text-center" width="40%"><?php echo $semester; ?></td>
                                                    <td class="text-center" width="17%">
                                                        <?php
                                                        if ($status == 1) {
                                                            ?>
                                                            <button type="button" class="btn btn-success"<?php
                                                            if ($status == 1)
                                                                echo("checked");
                                                            else
                                                                echo""
                                                                ?> id="<?php echo $id_set; ?>" name="status" onclick="update(this);" value="<?php
                                                                    if ($status == 1)
                                                                        echo("0");
                                                                    else
                                                                        echo("1")
                                                                        ?>" >

                                                                เปิด</button>
                                                        <?php }else { ?>
                                                            <button type="button" class="btn btn-danger"<?php
                                                            if ($status == 1)
                                                                echo("checked");
                                                            else
                                                                echo""
                                                                ?> id="<?php echo $id_set; ?>" name="status" onclick="update(this);" value="<?php
                                                                    if ($status == 1)
                                                                        echo("0");
                                                                    else
                                                                        echo("1")
                                                                        ?>" >

                                                                ปิด</button>  
                                                        <?php } ?>

                                                    </td>
                                                            <!--<td><center><button class="btn btn-danger btn-xs" onclick="deleted(<?php echo $id_set; ?>);"><i class="fa fa-trash-o"></i></button></center></td>--> 
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                </div>
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
                <h4 class="modal-title">ตั้งค่าปีการศึกษาและภาคเรียน</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissable" hidden="true">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> แจ้งเตือน!</h4>
                    <p>ปีการศึกษาและภาคเรียน มีในระบบแล้ว กรุณาตรวจสอบอีกทั้งค่ะ</p>
                </div>
                <div class="alert alert-info alert-dismissable" hidden="true">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> แจ้งเตือน!</h4>
                    <p>คุณได้ทำการเพิ่มปีการศึกษาและภาคเรียน เรียบร้อยแล้วค่ะ</p>
                </div>
                <form id="form1" action="#" method="post">
                    <p>
                    <div class="form-group ">
                        <label for="cname" class="">ปีการศึกษา : <span class="required"></span></label>
                        <input class="form-control" type="text" name="year" id="year" required>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="">ภาคเรียนที่ : <span class="required"></span></label>
                        <input class="form-control" type="text" name="semester" id="semester" required>
                    </div>
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" name="submit" onclick="checkvalidate()">บันทึกข้อมูล</button>
                <button class="btn btn-default" type="reset" name="reset" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="dataConfirmModal2"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แจ้งเตือนกันเปิดใช้ปีการศึกษา</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ท่านต้องการเปิดใช้ปีการศึกษานี้</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- <script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script> -->
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= base_url() . 'assets/bootstrap/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
<script type="text/javascript">
                    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                        return arg != value;
                    }, "value must not equal args.");
                    var validator = $("#form1").validate({
                        rules: {
//                            semester: {valueNotEquals: "default"},
//                            year: {valueNotEquals: "default"},
                            semester: "required",
                            year: "required"
                        },
                        messages: {
//                            semester: {valueNotEquals: "กรุณาเลือก ภาคเรียน"},
//                            year: {valueNotEquals: "กรุณาเลือก ปีการศึกษา"},
                            semester: "กรุณากกรอกภาคเรียน",
                            year: "กรุณาปีการศึกษา"
                        }


                    });
                    function showmodal() {
                        $('#dataConfirmModal').modal({show: true});
                    }
                    function checkvalidate() {

                        if (!validator.form()) {

                            return false;
                        } else {
                            $.ajax({
                                url: "../teacher/addyear_semester",
                                type: "POST",
                                data: $("#form1").serialize(),
                                //        dataType:"json",
                                success: function (data) {
//                                    alert(data);
                                    data = JSON.parse(data);
                                    // alert('บันทึกเรียบร้อยแล้วค่ะ');
                                    if (data.info == "success") {
//                                        $('.alert-info').show();
//                                        window.setTimeout(function () {
//                                            $(".alert-info").fadeTo(500, 0).slideUp(500, function () {
//                                                $(this).remove();
//                                            });
//                                        }, 3000);
                                        window.location.replace("setting_year");
                                    }
                                    if (data.info == "duplicate") {
                                        $('.alert-danger').show();
                                        window.setTimeout(function () {
                                            $(".alert-danger").fadeTo(500, 0).slideUp(500, function () {
                                                $(this).remove();
                                            });
                                        }, 3000);
//
                                    }
                                }, error: function (er) {
                                    alert('ท่านได้ทำการตั้งค่าเรียบร้อยแล้ว' + er);
                                }
                            });
                        }
                    }

                    function update(this_a) {
//                        alert(this_a.value);
                        $.post('<?php echo base_url("teacher/status_year/") ?>' + "/" + this_a.id + "/" + this_a.value);
                        if (this_a.value == "1") {
                            $('#' + this_a.id).val("0");
//                            $('#dataConfirmModal2').modal({show: true});
                        } else {
                            $('#' + this_a.id).val("1");
//                            $('#dataConfirmModal2').modal({show: true});

                        }
                        window.location.replace("setting_year");

                    }

</script>
