<link rel="stylesheet" href="<?php echo base_url() . 'assets/recoverpass/css/reset.css'; ?>">
<link rel='stylesheet prefetch' href='<?php echo base_url() . 'assets/css/font-awesome.min.css'; ?>'>
<link rel="stylesheet" href="<?php echo base_url() . 'assets/recoverpass/css/style.css'; ?>">
<div class="content-wrapper">
    <div class="container">
        <h1 class="page-header"></h1>
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <ol class="breadcrumb">
                    <li class="active">
                        <h1> &nbsp; เปลี่ยนรหัสผ่านนักศึกษา</h1>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">เปลี่ยนรหัสผ่านนักศึกษา</h3>
                    </div>
                    <div  class="panel-body"> 
                        <span id="changpass" ></span>
                        <div class="module form-module">
                            <div>

                            </div>
                            <div class="form">
                                <h2><center>เปลี่ยนรหัสผ่าน</center></h2>
                                <form id="formrecover" action="#" method="post" >
                                    <div id="formpass">
                                        <div class="form-group has-success">
                                            <label class="control-label" style="color:#00c0ef;"><i id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></i> &nbsp;รหัสผ่านใหม่</label>
                                            <input type="password" name="newpassword" id="newpassword"placeholder="new password" required autocomplete="off"/>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="control-label" style="color:#00c0ef;"><i id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></i> &nbsp;ยืนยันรหัสผ่านใหม่</label>
                                            <input type="password" name="confrimpassword" id="confrimpassword" placeholder="confrim password" required autocomplete="off"/>
                                        </div>
                                        <button type="button"onclick="checkvalidate()">ส่งข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="page-header"> </h1>
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url() . 'assets/recoverpass/js/index.js'; ?>"></script>
<script>

                                            $("input[type=password]").keyup(function () {
                                                if ($("#newpassword").val().length >= 6) {
                                                    $("#8char").removeClass("glyphicon-remove");
                                                    $("#8char").addClass("glyphicon-ok");
                                                    $("#8char").css("color", "#00A41E");
                                                } else {
                                                    $("#8char").removeClass("glyphicon-ok");
                                                    $("#8char").addClass("glyphicon-remove");
                                                    $("#8char").css("color", "#FF0004");
                                                }
                                                if ($("#newpassword").val() == $("#confrimpassword").val()) {
                                                    $("#pwmatch").removeClass("glyphicon-remove");
                                                    $("#pwmatch").addClass("glyphicon-ok");
                                                    $("#pwmatch").css("color", "#00A41E");
                                                } else {
                                                    $("#pwmatch").removeClass("glyphicon-ok");
                                                    $("#pwmatch").addClass("glyphicon-remove");
                                                    $("#pwmatch").css("color", "#FF0004");
                                                }
                                            });
                                            var validator = $("#formrecover").validate({
                                                rules: {
                                                    newpassword: {
                                                        required: true,
                                                        minlength: 6
                                                    },
                                                    confrimpassword: {
                                                        required: true,
                                                        minlength: 6,
//                equalTo: '[name="password"]'
                                                    },
                                                    agree: "required"
                                                },
                                                messages: {
                                                    newpassword: {
                                                        required: "กรุณากรอกรหัสผ่าน",
                                                        minlength: "รหัสผ่าน ไม่น้อยกว่า 6 ตัวอักษร"
                                                    },
                                                    confrimpassword: {
                                                        required: "กรุณากรอกยืนยันรหัสผ่าน",
                                                        minlength: "รหัสผ่าน ไม่น้อยกว่า 6 ตัว",
//                equalTo: "กรุณา ป้อนค่า เดียวกันอีกครั้ง"
                                                    }
                                                },
                                            });
                                            function checkvalidate() {
                                                if (!validator.form()) {
                                                    return false;
                                                }
                                                if ($("#newpassword").val() != $("#confrimpassword").val()) {
                                                    alert('กรุณาป้อนค่า เดียวกันอีกครั้ง');
                                                } else {
                                                    $.ajax({
                                                        url: "../student/changnewgpassword",
                                                        type: "POST",
                                                        data: $("#formrecover").serialize(),
                                                        //        dataType:"json",
                                                        success: function (jd) {
                                                            alert("คุณกำลังทำการเปลี่ยนรหัสผ่าน");
                                                            var a = "<lable>คุณได้ทำการเปลี่ยนรหัสผ่านเรียบร้อยแล้ว</lable>";
                                                            if (jd != null) {
                                                                $("#formpass").html(a);
//                                                                alert("คุณได้ทำการเปลี่ยนรัหสผ่านเรียบร้อยแล้ว");
                                                            }
//                                                        alert(jd);
//                                                        console.log(jd);
                                                        }, error: function (er) {
                                                            alert('มีข้อผิดพลาดกรุณาลองใหม่ค่ะ' + er);
                                                        }
                                                    });
//                                                
                                                }
                                            }
</script>