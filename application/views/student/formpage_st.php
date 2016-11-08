<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <section class="content-header">
                <h1>
                    ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>

                    <li><a href="#">ลงทะเบียน</a></li>
                </ol>
            </section>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10  col-lg-offset-1" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>ลงทะเบียนนักศึกษา</center></h3>
                    </div>
                    <?php if (!empty($msg)) { ?>
                        <?php extract($post); ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>เกิดข้อผิดพลาด!</strong> กรุณากรอกรหัสนักศึกษาใหม่ ค่ะ
                        </div>
                    <?php }
                    ?>
                    <div class="panel-body">
                        <form id="signupForm" method="post" class="form-horizontal" action="<?php echo base_url('home/addstudent'); ?>">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name_st">ชื่อนักศึกษา</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name_st" name="name_st" <?php if (!empty($post)) { ?> value="<?php echo $name_st ?>" <?php } ?>  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="lastname_st">นามสกุล</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="lastname_st" name="lastname_st" <?php if (!empty($post)) { ?> value="<?php echo $lastname_st ?>" <?php } ?>  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="id_st">รหัสนักศึกษา</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="id_st" name="id_st" <?php if (!empty($post)) { ?> value="<?php echo $id_st ?>" <?php } ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="major">เลือกสาขาวิชา</label>
                                <div class="col-sm-5">
                                    <select name="major" id="major"  class="form-control">
                                        <option <?php
                                        if (!empty($post) && $major == "เลือกสาขาวิชา") {
                                            echo "selected";
                                        }
                                        ?> >เลือกสาขาวิชา</option>
                                        <option <?php
                                        if (!empty($post) && $major == "วิทยาการคอมพิวเตอร์") {
                                            echo "selected";
                                        }
                                        ?> >วิทยาการคอมพิวเตอร์</option>
                                        <option <?php
                                        if (!empty($post) && $major == "เทคโนโลยีสารสนเทศ") {
                                            echo "selected";
                                        }
                                        ?> >เทคโนโลยีสารสนเทศ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="tell_st">เบอร์โทรศัพท์</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tell_st" name="tell_st" <?php if (!empty($post)) { ?> value="<?php echo $tell_st ?>" <?php } ?>  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="email">E-mail</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="email" name="email" <?php if (!empty($post)) { ?> value="<?php echo $email ?>" <?php } ?>  />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name_pr">ชื่อผู้ปกครอง/ผู้เกี่ยวข้อง</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name_pr" name="name_pr" <?php if (!empty($post)) { ?> value="<?php echo $name_pr ?>" <?php } ?> />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="relation">ความสัมพันธ์</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="relation" name="relation" <?php if (!empty($post)) { ?> value="<?php echo $relation ?>" <?php } ?>  />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="tell_pr">เบอร์โทรศัพท์</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tell_pr" name="tell_pr" <?php if (!empty($post)) { ?> value="<?php echo $tell_pr ?>" <?php } ?>  />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password">รหัสผู้ใช้งาน</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password" <?php if (!empty($post)) { ?> value="<?php echo $password ?>" <?php } ?>  />
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
            <!-- /.row -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert-danger").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });

    $(document).ready(function() {
        $("#signupForm").validate({
            rules: {
                name_st: "required",
                lastname_st: "required",
                id_st: {
                    minlength: 11,
                    maxlength: 11,
                    required: true,
                    digits: true
                },
                major: {
                    required: true
                },
                tell_st: {
                    digits: true
                },
                email: {
                    required: true,
                    minlength: 6,
                    email: true
                },
                name_pr: {
                    required: true
                },
                tell_pr: {
                    required: true,
                    digits: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                agree: "required"
            },
            messages: {
                name_st: "กรุณากรอกชื่อนักศึกษา",
                lastname_st: "กรุณากรอกนามสกุลนักศึกษา",
                id_st: {
                    required: "กรุณากรอกรหัสนักศึกษา",
                    minlength: "รหัสนักศึกษา ไม่น้อยกว่า 11 ตัว",
                    maxlength: "รหัสนักศึกษา ไม่เกิน 11 ตัว",
                },
                major: {
                    required: "กรุณาเลือกสาขาวิชา"
                },
                tell_st: {
                    required: "กรุณากรอกเบอร์โทรนักศึกษา",
                    equalTo: "รูปแบบไม่ถูกต้อง"
                },
                name_pr: {
                    required: "กรุณากรอกชื่อผู้ปกครองหรือผู้ที่เกี่ยวข้อง"
                },
                tell_pr: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    equalTo: "รูปแบบไม่ถูกต้อง"
                },
                password: {
                    required: "กรุณากรอกรหัสผ่านด้วยค่ะ",
                    minlength: "รหัสผ่าน ไม่น้อยกว่า 6 ตัวอักษร"
                },
                email: "รูปแบบอีเมล์ไม่ถูกต้องค่ะ",
                agree: "รูปแบบอีเมล์ไม่ถูกต้อง"
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }
        });

    });


</script>
<!-- ./wrapper -->

