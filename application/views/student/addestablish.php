<link href="<?= base_url('assets/css/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
<script src="<?= base_url('assets/js/jquery-1.10.2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<body>
    <div class="content-wrapper">
        <div class="container">
            <div class="col-lg-12">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="page-header">
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <h4> แสดงการเลือกสถานประกอบการ</h4>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" align='center'>เลือกสถานประกอบการ</h3>
                            </div>
                            <div class="panel-body">
                                <form action="<?php echo base_url('establishment/add_establish'); ?>" method="post" id="form1" hidden="true">
                                    <table class="table ">
                                        <tr>
                                            <?php
                                            if ($semester_year != NULL) {
                                                $semester_year = $semester_year[0];
                                                $year = $semester_year['year'];
                                                $semester = $semester_year['semester'];
                                            }
                                            ?>
                                            <td width = "15%">ปีการศึกษา : <?php
                                                if ($year != NULL) {
                                                    echo $year;
                                                }
                                                ?></td>

                                            <td width = "10%">ภาคเรียน : <?php
                                                if ($semester != NULL) {
                                                    echo $semester;
                                                }
                                                ?></td>
                                            <td width = "25%">กรุณาเลือกสถานประกอบการ</td>
                                            <td width="30%">
                                                <input class="form-control" type="text" id="name_es" name="name_es" required=""/>
                                                <input class="form-control" type="hidden" id="id_es" name="id_es" required=""/>
                                                <input class="form-control" type="hidden" id="year" name="year" value="<?= $year; ?>"/>
                                                <input class="form-control" type="hidden" id="semester" name="semester" value="<?= $semester; ?>"/>
                                            </td>
                                            <td width="15%">
                                                <a href="#" onclick="Detial_es();">ดูสถานประกอบการ</a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><h5 style="color:red;">*หมายเหตุ - กรณีค้นหาชื่อสถานประกอบการณ์ไม่พบให้นักศึกษาเพิ่มสถานประกอบใหม่ <a href="<?php echo base_url('establishment/addformes'); ?>">คลิกที่นี่...</a></h5></td>
                                        </tr>
                                    </table>
                                </form>

                                <div class="callout callout-info" hidden="true" id="wait">
                                    <p>รอการอนุมัติจากอาจารย์ผู้ดูแลการฝึกประสบการณ์วิชาชีพ<p>
                                </div>
                                <div class="callout callout-success" hidden="true" id="success">
                                    <p>สถานประกอบการณ์ของคุณได้รับการอนุมัติแล้ว</p>
                                </div>
                                <table class="table table-bordered " id="tabledetail">
                                    <thead>
                                        <tr>
                                            <th colspan="2">รายละเอียดสถานประกอบการณ์</th>
                                        </tr>
                                        <tr>
                                            <th width="40%">ข้อมูล</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ชื่อสถานประกอบการณ์</td>
                                            <td id="name_es_detail">
                                                <input class="form-control" type="text" id="name_es_detail" name="name_es_detail" required readonly=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ที่อยู่</td>
                                            <td id = "address_es_detail">
                                                <input class="form-control" type="text" id = "address_es_detail" name="address_es_detail" required readonly=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เว็บไซต์ </td>
                                            <td id ="website_es_detail">
                                                <input class="form-control" type="text"  id ="website_es_detail" name="website_es_detail" required readonly=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td id="email_es_detail">
                                                <input class="form-control" type="text"  id="email_es_detail" name="email_es_detail" required readonly=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td id="tell_es_detail">
                                                <input class="form-control" type="text" id="tell_es_detail" name="tell_es_detail" required readonly=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>จำนวนบุคลากร</td>
                                            <td id="peple_es_detail">
                                                <input class="form-control" type="text"  id="peple_es_detail" name="peple_es_detail" required readonly=""/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-4 col-md-offset-4 ">
                                    <button class="btn btn-primary" type="button" name="submit" onclick = "checkvalidate()" >บันทึกข้อมูล</button> 
                                    <button class="btn btn-default" type="reset" name="reset">ยกเลิก</button>                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dataConfirmModal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true" width="100%">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="alert2"></h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p id="alert1"></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="dataConfirmModal1"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4>รายชื่อสถานประกอบการทั้งหมด</h4></center>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>ลำดับที่</th>
                            <th>ชื่อสถานประกอบการ</th>
                            <td>ที่อยู่</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if ($establish != NULL) {
                            foreach ($establish as $value) {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value['name_es']; ?></td>
                                    <td><?= $value['address_es']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script>

                                                                    $(document).ready(function () {
                                                                        $("#form1").hide();
                                                                        // getstatus();
                                                                        chak_finish();

                                                                    });
                                                                    $("#name_es").autocomplete({
                                                                        source: "<?php echo base_url('establishment/getname/?') ?>",
                                                                        minLength: 0,
                                                                        select: function (event, ui) {
                                                                            // console.log(ui.item);
                                                                            $("#id_es").val(ui.item.id);
                                                                            getDetail(ui.item.id);
                                                                        }
                                                                    });

                                                                    function getDetail(id) {
                                                                        $.post("<?php echo base_url('index.php/establishment/getDetail/') ?>/" + id, function (data) {
                                                                            var obj = jQuery.parseJSON(data);
                                                                            $("#name_es_detail").html(obj.name_es);
                                                                            $("#address_es_detail").html(obj.address_es);
                                                                            $("#website_es_detail").html(obj.website);
                                                                            $("#email_es_detail").html(obj.email);
                                                                            $("#tell_es_detail").html(obj.tell_es);
                                                                            $("#peple_es_detail").html(obj.peple);
                                                                        });

                                                                    }

//                                        function getstatus() {
//                                            $.post("<?php echo base_url('index.php/student/getstatus/') ?>/", function (data) {
//                                                var obj = jQuery.parseJSON(data);
//                                                if (obj[0].info == 'true') {
//
//                                                    if (obj[1][0].status == 0) {
//                                                        $("#wait").show();
//                                                        /// show blue wait approve
//                                                    } else if (obj[1][0].status == 1) {
//                                                        $("#success").show();
//                                                        // green approve
//                                                    }
//                                                    getDetail(obj[1][0].id_es);
//                                                    // show green
//
//                                                } else {
//
//                                                    $("#form1").show();
//                                                }
//
//                                            });
//                                        }

//---------------valiadate--------------//
                                                                    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                                                                        return arg != value;
                                                                    }, "value must not equal args.");
                                                                    var validator = $("#form1").validate({
                                                                        rules: {
                                                                            term: {valueNotEquals: "default"},
                                                                            year: {valueNotEquals: "default"},
                                                                            name_st: "required",
                                                                        },
                                                                        messages: {
                                                                            term: {valueNotEquals: "กรุณาเลือก ภาคเรียน"},
                                                                            year: {valueNotEquals: "กรุณาเลือก ปีการศึกษา"},
                                                                            name_es: "กรุณาเลือกสถานประกอบการ"
                                                                        }


                                                                    });
                                                                    function checkvalidate() {

                                                                        if (!validator.form()) {
                                                                            var a = "กรุณาเลือกข้อมูลให้เรียบร้อยก่อน";
                                                                            var x = "แจ้งเตือนการกรอกข้อมูล";
                                                                            //                                                            alert("กรุณาเลือกข้อมูลให้เรียบร้อยก่อน");
                                                                            $('#dataConfirmModal').modal({show: true});
                                                                            $("#alert1").html(a);
                                                                            $("#alert2").html(x);
                                                                            return false;
                                                                        }
                                                                        if ($("#id_es").val() == "") {
                                                                            var b = "กรุณาเลือกสถานประกอบการก่อน";
                                                                            var z = "แจ้งเตือนการกรอกข้อมูล";
                                                                            //                                                            alert("กรุณาเลือกสถานประกอบการก่อน");
                                                                            $('#dataConfirmModal').modal({show: true});
                                                                            $("#alert1").html(b);
                                                                            $("#alert2").html(z);
                                                                            return false;
                                                                        } else {
                                                                            var c = "ยืนยันการบันทึกข้อมูล";
                                                                            var d = "ยืนยันการบันทึกข้อมูล";
                                                                            $('#dataConfirmModal').modal({show: true});
                                                                            $("#alert1").html(c);
                                                                            $("#alert2").html(d);
                                                                            $('#dataConfirmOK').click(function (e) {
                                                                                $.ajax({
                                                                                    url: "../establishment/add_establish",
                                                                                    type: "POST",
                                                                                    data: $("#form1").serialize(),
                                                                                    //        dataType:"json",
                                                                                    success: function (jd) {
                                                                                        console.log(jd);
                                                                                        location.reload(true);
                                                                                    }, error: function (er) {
                                                                                        alert('ไม่สามารถเพิ่มข้อมูลได้ เนื่องจากคุณได้เพิ่มก่อนหน้านี้แล้ว');
                                                                                    }
                                                                                });
                                                                            });
                                                                        }

                                                                    }
                                                                    function Detial_es() {
                                                                        $('#dataConfirmModal1').modal({show: true});
                                                                    }
                                                                    function chak_finish() {
                                                                        $.post("<?php echo base_url('index.php/student/getstatus/') ?>/", function (data) {
                                                                            var obj = jQuery.parseJSON(data);
                                                                            if (obj[0].info == 'true' && obj[1][0].finish == 0) {
                                                                                if (obj[1][0].status == 0) {
                                                                                    $("#wait").show();
                                                                                    /// show blue wait approve
                                                                                } else if (obj[1][0].status == 1) {
                                                                                    $("#success").show();
                                                                                    // green approve
                                                                                }
                                                                                getDetail(obj[1][0].id_es);
                                                                                // show green
                                                                            } else if (obj[0].info == 'false' || obj[1][0].finish == 1) {
                                                                                $("#form1").show();
                                                                            }
                                                                        });
                                                                    }


</script>
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
