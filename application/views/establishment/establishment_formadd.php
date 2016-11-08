<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<div class="content-wrapper">
    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" >
                        <ol class="breadcrumb">
                            <li class="active">
                                <h4><i class="fa fa-edit"></i> เพิ่มสถานประกอบการณ์ใหม่</h4>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-10  col-lg-offset-1" >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><center>เพิ่มสถานประกอบการณ์ใหม่</center></h3>
                            </div>
                            <div class="panel-body">
                                <form id="signupForm" method="post" class="form-horizontal" action="#">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="firstname">ปีการศึกษา *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="year" name="year" readonly="" <?php if ($semester_year != NULL) { ?> value="<?php echo $semester_year[0]['year']; ?>" <?php } ?>  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="firstname">ภาคเรียนที่ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="semester" name="semester" readonly="" <?php if ($semester_year != NULL) { ?> value="<?php echo $semester_year[0]['semester']; ?>" <?php } ?>/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="name_es">ชื่อสถานประกอบการ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="name_es" name="name_es"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="address_es">ที่อยู่สถานประกอบการ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="address_es" name="address_es"  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="website">เว็บไซต์ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="website" name="website" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="email">อีเมล์ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="email" name="email"  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="tell_es">เบอร์โทรศัพท์ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="tell_es" name="tell_es" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="peple">จำนวนบุคลากร *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="peple" name="peple"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="person_contect">ชื่อผู้ติดต่อ *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="person_contect" name="person_contect" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="position">ตำแหน่ง *</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="position" name="position" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4"><br>
                                            <button type="button" class="btn btn-primary" onclick="checkvalidate()">บันทึกข้อมูล</button>
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
    </div>
</div>

<!-- Modal -->
<div id="dataConfirmModal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ยืนยันการบันทึกข้อมูล</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ต้องการบันทึกหรือไม่</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="dataConfirmModal2"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แจ้งเตือนการกรอกข้อมูล</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>กรุณากรอกข้อมูลให้เรียบร้อยก่อน</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">

    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "value must not equal args.");
    var validator = $("#signupForm").validate({
        rules: {
            term: {valueNotEquals: "0"},
            year: {valueNotEquals: "0"},
            name_es: {
                required: true,
                remote: {
                    url: "<?php echo base_url('establishment/getestablish'); ?>",
                    type: "post",
                    data: {
                        username: function () {
                            return $("#name_es").val();
                        }
                    }
                }
            },
            address_es: {
                required: true
            },
            website: {
                required: true,
                //                        website: true
            },
            email: {
                required: true,
                minlength: 6,
                email: true
            },
            tell_es: {
                required: true,
                digits: true
            },
            peple: {
                required: true
            },
            person_contect: {
                required: true
            },
            position: {
                required: true
            }
        },
        messages: {
            term: {valueNotEquals: "กรุณาเลือก ภาคเรียน"},
            year: {valueNotEquals: "กรุณาเลือก ปีการศึกษา"},
            name_es: {
                required: "กรุณากรอกชื่อสถานประกอบการ",
//                required:"ชื่อสถานประกอบการนี้มีในระบบแล้วค่ะ"
            },
            address_es: {
                required: "กรุณากรอกที่อยู่สถานประกอบการ",
                minlength: "Address should be more than 10 characters",
            },
            website: {
                required: "กรุณากรอกเว็บไซต์"

            },
            tell_es: {
                required: "กรุณากรอกเบอร์โทรศัพท์",
                digits: "เบอร์โทรไม่ถูกต้อง"
//                equalTo:
            },
            peple: {
                required: "กรุณากรอกจำนวนบุคลากร"
            },
            person_contect: {
                required: "กรุณากรอกชื่อผู้ติดต่อ"
            },
            position: {
                required: "กรุณากรอกตำแหน่งงาน"
            },
            email: "กรุณาหรอกที่อยู่อีเมล์ค่ะ",
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
    function checkvalidate() {

//        if ($("#name_es").val() == "") {
//            alert("กรุณาเลือกสถานประกอบการก่อน");
//            return false;
//        }
        if (!validator.form()) {
            $('#dataConfirmModal2').modal({show: true});
//            alert("กรุณากรอกข้อมูลให้เรียบร้อยด้วยค่ะ");
            return false;
        } else {
//            $('#dataConfirmModal').modal({show: true});
//            $('#dataConfirmOK').click(function (e) {
                $.ajax({
                    url: "../establishment/addestablishment",
                    type: "POST",
                    data: $("#signupForm").serialize(),
                    //        dataType:"json",
                    success: function (jd) {
                        console.log(jd);
                        window.location.replace("addformes");
                    }, error: function (er) {
                        alert('สถานประกอบนี้มีในระบบแล้ว' + er);
                    }
                });
//            });
        }

    }

//---------------------------------confirm data----------------------//

//    $('#data-confirm').click(function(ev) {
    //            var href = $(this).attr('href');
    //            $('#dataConfirmModal').find('.modal-body').text($(this).attr('#defaultForm'));
    //            $('#dataConfirmOK').attr('href', href);
//        $('#dataConfirmModal').modal({show: true});
//        $('#dataConfirmOK').click(function(e) {
//            $.ajax({
//                url: "../establishment/addestablishment",
//                type: "POST",
//                data: $("#signupForm").serialize(),
//                //        dataType:"json",
//                success: function(jd) {
//                    console.log(jd);
//                    window.location.replace("addformes");
//                }, error: function(er) {
//                    alert('สถานประกอบนี้มีในระบบแล้ว' + er);
//                }
//            });
//        });
//    });

</script>
