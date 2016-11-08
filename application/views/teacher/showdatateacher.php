<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<link href="<?php echo base_url('/assets/css/titatoggle-dist.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการข้อมูลอาจารย์นิเทศ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงข้อมูลอาจารย์
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">แสดงข้อมูลอาจารย์</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <a href="#">

                                <button  style=" float: right" class="btn btn-info" type="submit" name="submit" onclick="addmodal();">
                                    <span class="fa fa-user-plus">เพิ่ม</span></button>
                            </a>
                            <table class="table table-bordered table-hover table-striped">

                                <td align='center'>ลำดับที่</td>
                                <td align='center'>ชื่อ</td>
                                <td align='center'>นามสกุล</td>
                                <td align='center'>เบอร์โทร</td>
                                <td align='center'>สิทธิ์การใช้งาน</td>
                                <td align='center'>แก้ไข</td>
                                <td align='center'>ลบ</td>
                                </tr>
                                <?php
                                $i = 1;
                                foreach ($datateacher as $row) {
                                    $teacher_id = $row['teacher_id'];
                                    $teacher_name = $row['teacher_name'];
                                    $teacher_lastname = $row['teacher_lastname'];
                                    $phone = $row['phone'];
                                    $function = $row['function'];
                                    $update = anchor('teacher/formupdate/' . $teacher_id, '<button  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>');
                                    $delete = "<button  class='btn btn-danger btn-xs' onclick='deleted($teacher_id)'><i class='fa fa-trash-o'></i></button>";
                                    ?>
                                    <tr>
                                        <td><center><?= $i++ ?></center></td>
                                    <td><?= $teacher_name; ?></td>
                                    <td><?= $teacher_lastname; ?></td>
                                    <td><?= $phone; ?></td> 
                                    <td><center><label class="checkbox-slider--b ">
                                            <input type="checkbox" class="switch-input" <?php
                                            if ($function == 1)
                                                echo("checked");
                                            else
                                                echo""
                                                ?> id="<?php echo $teacher_id; ?>" name="status" onchange="update(this);" value="<?php
                                                   if ($function == 1)
                                                       echo("0");
                                                   else
                                                       echo("1")
                                                       ?>" >
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                        </label> 
                                        <?php
                                        if ($function == 1) {
                                            echo "สิทธิ์ผู้ดูแล";
                                        } else {
                                            echo "สิทธิ์ผู้ใช้งาน";
                                        }
                                        ?>
                                    </center>
                                    </td>
                                    <td><?= $update; ?></td>
                                    <td><?= $delete; ?></td>
                                    </tr>
                                <?php } ?>
                                </tabe>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dataConfirmModal1"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><center>เพิ่มข้อมูลอาจารย์นิเทศ</center></h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <div class="panel-body"> 
                    <div class="alert alert-danger alert-dismissable" hidden="true">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> แจ้งเตือน!</h4>
                        <p>ผู้ใช้ไม่ได้ถูกต้อง หรือข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้งค่ะ </p>
                    </div>
                    <form id="signupForm" method="post" class="form-horizontal" action="<?php echo base_url('teacher/addteacher'); ?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="teacher_name">ชื่ออาจารย์ :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="teacher_name" name="teacher_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="teacher_lastname">นามสกุล :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="teacher_lastname" name="teacher_lastname"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="phone">เบอร์โทรศัพท์ :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="phone" name="phone"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="username">ชื่อผู้ใช้</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="username" name="username" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="password">รหัสผ่าน</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <center><button type="button" class="btn btn-primary" onclick="checkvalidate();" >บันทึกข้อมูล</button>
                                <button type="reset" class="btn btn-default">ยกเลิก</button></center>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="dataConfirmModal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="del"></h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p id="but"></p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" >ตกลง</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="dataConfirmModal2"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ยืนยันการลบข้อมูล</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ยืนยันการลบข้อมูลอาจารย์</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
//    $(document).ready(function () {
    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "value must not equal args.");
    var validator = $("#signupForm").validate({
        rules: {
            teacher_name: "required",
            teacher_lastname: "required",
            phone: {
                required: true,
                digits: true
            },
            username: {
                required: true,
                minlength: 5,
                maxlength: 20,
                remote: {
                    url: '../teacher/teacherUsername',
                    type: "post",
                    data:
                            {
                                username: function () {
                                    return $("#username").val();
                                }
                            }
                }
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required"
        },
        messages: {
            teacher_name: "กรุณากรอกชื่ออาจารย์",
            teacher_lastname: "กรุณากรอกนามสกุลอาจารย์",
            phone: {
                digits: "กรุณากรอกเป็นตัวเลข",
                required: "กรุณากรอกหมายเลขโทรศัพท์",
                equalTo: "รูปแบบไม่ถูกต้อง"

            },
            username: {
                required: "กรุณากรอกชื่อผู้ใช้งาน",
                minlength: "ชื่อผู้ใช้ ไม่น้อยกว่า 5 ตัว",
                remote: "ชื่อผู้ใช้นี้ ถูกใช้งานแล้ว"
            },
            password: {
                required: "กรุณากรอกรหัสผ่านด้วยค่ะ",
                minlength: "รหัสผ่าน ไม่น้อยกว่า 5 ตัว"
            },
            email: "รูปแบบอีเมล์ไม่ถูกต้องค่ะ",
            agree: "รูปแบบอีเมล์ไม่ถูกต้อง"
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });
//    });

    function addmodal() {
        $('#dataConfirmModal1').modal({show: true});
    }

    function checkvalidate() {

        if (!validator.form()) {
            return false;
        } else {
            $.ajax({
                url: "../teacher/addteacher",
                type: "POST",
                data: $("#signupForm").serialize(),
                //        dataType:"json",
                success: function (data) {
//                    alert(data);
                    data = JSON.parse(data);
//                    console.log(data);
//                        location.reload(true);
                    if (data.info == "success") {
//                                        $('.alert-info').show();
//                                        window.setTimeout(function () {
//                                            $(".alert-info").fadeTo(500, 0).slideUp(500, function () {
//                                                $(this).remove();
//                                            });
//                                        }, 3000);
                        window.location.replace("showdatateacher");
                    }
                    if (data.info == "duplicate_username") {
                        $('.alert-danger').show();
                        window.setTimeout(function () {
                            $(".alert-danger").fadeTo(500, 0).slideUp(500, function () {
                                $(this).remove();
                            });
                        }, 3000);
//
                    }
                }, error: function (er) {
                    alert('เกิดข้อผิดพลาดกรุณาลองใหม่' + er);
                }
            });
        }
    }
//    function addteacher() {
////        alert('aaa');
//        if (!validator.Form()) {
//            alert('aaaaa');
//            return fales;
//        } else {
//            $.ajax({
//                url: "../teacher/addteacher",
//                type: "POST",
//                data: $("#signupForm").serialize(),
//                //        dataType:"json",
//                success: function(jd) {
//                    console.log(jd);
////                        location.reload(true);
//                }, error: function(er) {
//                    alert('สถานประกอบนี้มีในระบบแล้ว' + er);
//                }
//            });
//        }
//    }


    function deleted(id) {
        $('#dataConfirmModal2').modal({show: true});
        $(".modal-body #modal_id").val(id);
        $('#dataConfirmModal2').on('click', '#dataConfirmOK', function (e) {
            $.post("<?php echo base_url('teacher/delete'); ?>",
                    {
                        "id": id
                    }, function (data) {
                location.reload(true);
//                console.log(data);
                alert(id);

            });

        });
//    alert(id);
    }

    function update(this_a) {
        $.post('<?php echo base_url("teacher/updatefunction/") ?>' + "/" + this_a.id + "/" + this_a.value);
        var c = "แจ้งเตือนการเปลี่ยนสิทธิ์การใช้งาน";
        var d = "คุณต้องเปลี่ยนสิทธิ์การใช้งานเป็น สิทธิ์ผู้ใช้ทั่วไป";
        var e = "คุณต้องเปลี่ยนสิทธิ์การใช้งานเป็น สิทธิ์ผู้ดูแล";
        var f = "สิทธิ์ผู้ดูแล";
        if (this_a.value == "1") {
            $('#' + this_a.id).val("0");
            $('#dataConfirmModal').modal({show: true});
            $("#del").html(c);
            $("#but").html(e);
            $("#status").html(f);
        } else {
            $('#' + this_a.id).val("1");
            $('#dataConfirmModal').modal({show: true});
            $("#del").html(c);
            $("#but").html(d);
        }

    }
</script>