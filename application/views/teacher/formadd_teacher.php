<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
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
                        <i class="fa fa-table"></i> เพิ่มข้อมูลอาจารย์นิเทศ
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title ">เพิ่มข้อมูลอาจารย์นิเทศ</h3>
                    </div>
                    <div class="panel-body">
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
                                    <input type="text" class="form-control" id="username" name="username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password">รหัสผ่าน</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4"><br>
                                    <button type="submit" class="btn btn-primary" id="data-confirm">บันทึกข้อมูล</button>
                                    <button type="reset" class="btn btn-default">ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $("#signupForm").validate({
            onkeyup: false,
            rules: {
                teacher_name: "required",
                teacher_lastname: "required",
                phone: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
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
                    required: "กรุณากรอกเว็บไซต์",
                    minlength: "ความยาวไม่น้อยกว่า 10 ตัว",
                    maxlength: "ความยาวไม่เกิน 10 ตัว",
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

    });



</script>
