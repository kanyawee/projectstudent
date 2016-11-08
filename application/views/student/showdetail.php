<link href="<?php echo base_url('assets/css/jquerysctipttop.css') ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="container">
        <h1 class="page-header"></h1>
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <ol class="breadcrumb">
                    <li class="active">
                        <h4> &nbsp; ข้อมูลส่วนตัวนักศึกษา</h4>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลรายละเอียดนักศึกษา</h3>
                    </div>
                    <div class="panel-body"> 
                        <table class="table table-bordered">
                            <thead >
                                <tr >
                            <form action="<?php echo base_url('student/do_upload'); ?>" id="upload_file">
                                <th class="bg-info">ข้อมูลทั่วไปของนักศึกษา</th>                                    
                                <th class="bg-info">
                                    <div id="queue"></div>
                                    <div>อัพโหลดรูปภาพ : <input id="imagefile" type="file" name="userfile"  required onchange="return validateFileExtension(this)"/></div>
                                    <div id="container"></div>
                                </th>
                                <th class="bg-info"><input type="submit" value="อัปโหลด" id="submit-btn"><div id="btadd"></div></th>
                            </form>    
                            </tr>
                            <tr >
                                <th width = "30%">ข้อมูล</th>
                                <th colspan="2">รายละเอียดนักศึกษา <?php extract($this->session->userdata()); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>ชื่อนักศึกษา :</td>
                                    <td colspan="2"><?php echo $name_st; ?></td>                                             
                                </tr>
                                <tr>
                                    <td>นามสกุล :</td>
                                    <td colspan="2"><?php echo $lastname_st ?></td>
                                </tr>
                                <tr>
                                    <td>รหัสนักศึกษา :</td>
                                    <td colspan="2"><?php echo $id_st ?></td>
                                </tr>
                                <tr>
                                    <td>สาขาวิชา :</td>
                                    <td colspan="2"><?php echo $major ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทรศัพท์ :</td>
                                    <td colspan="2"><?php echo $tell_st ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail :</td>
                                    <td colspan="2"><?php echo $email ?></td>
                                </tr>
                            </tbody>
                            <thead class="bg-info">
                                <tr>
                                    <th colspan="3">ชื่อที่อยู่ผู้ที่สามารถติดต่อได้ในกรณีฉุกเฉิน</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ชื่อ :</td>
                                    <td colspan="2"><?php echo $name_pr ?></td>
                                </tr>
                                <tr>
                                    <td>เกี่ยวข้องเป็น :</td>
                                    <td colspan="2"><?php echo $relation ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทรศัพท์ :</td>
                                    <td colspan="2"><?php echo $tell_pr ?></td>
                                </tr>
                            </tbody>
                            <tbody  id="establish"  >
                                <tr class="bg-info" >
                                    <td colspan="3" ><b>ข้อมูลสถานประกอบการ</b></td>
                                </tr>
                                <?php
                                if (!empty($establish)) {
                                    foreach ($establish as $value) {
//                                        print_r($establish);
                                        ?>

                                        <tr>
                                            <td>ปีการศึกษา :</td>
                                            <td colspan="2"><?php echo $value['year'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อสถานประกอบการ :</td>
                                            <td colspan="2"><?php echo $value['name_es'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>ที่อยู่ :</td>
                                            <td colspan="2"><?php echo $value['address_es'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>เว็บไซต์ :</td>
                                            <td colspan="2"><?php echo $value['website'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td colspan="3"><?php echo $value['tell_es'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <form id="form1" action="<?php echo base_url('student/formupdate'); ?>" method="post">
                            <div class="col-md-4 col-md-offset-4 ">
                                <button class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>

                            </div>
                        </form>
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
<div id="Modal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แจ้งเตือนการเลือกไฟล์รูปภาพ</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ไฟล์ไม่ถูกต้อง กรุณาเลือกใหม่</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.progress.js') ?>"></script>
<script>
                                        $(document).ready(function () {
                                            window.setTimeout(function () {
                                                $(".btadd").fadeTo(500, 0).slideUp(500, function () {
                                                    $(this).remove();
                                                });
                                            }, 3000);
                                        });

                                        function validateFileExtension(fld) {
                                            if (!/(\.png|\.gif|\.jpg|\.jpeg)$/i.test(fld.value)) {
                                                $('#Modal').modal({show: true});
                                                fld.form.reset();
                                                fld.focus();
                                                return false;

                                            }
                                            return true;

                                        }

                                        // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>



//                                        $('#image-file').bind('change', function () {
//                                            alert('Hi');
//                                            alert('This file size is: ' + this.files[0].size / 1024 / 1024 + "MB");
//                                        });

                                        // pop_up
                                        $("#upload_file").submit(function (e) {
                                            var oFile = document.getElementById("imagefile").files[0];
//                                            alert(oFile);
                                            if (oFile.size > 2097152) // 2 mb for bytes.
                                            {
                                                alert("รูปภาพมีขนาดเกิน 2mb! ไม่สามารถอัพโหลดได้ ");
                                                return false;
                                            }
//                                            return true;
                                            e.preventDefault(); // not reload form
                                            $.ajax({
                                                url: "../student/do_upload",
                                                type: "POST",
                                                data: new FormData(this), //{id:$('input:text').val()}
                                                contentType: false,
                                                cache: false,
                                                processData: false,
                                                success: function (jd)
                                                {
                                                    $('#submit-btn').hide(); //hide submit button
                                                    $("#btadd").html("<center><label style='color: #0066ff; font-weight: bold;'>อัพโหลดเรียบร้อย</label></center>");
                                                    alert("อัพโหลดเสร็จแล้ว");
//                                                location.reload(true);
//                                                $('#loading-img').show(); //hide submit button
                                                }
                                                , error: function (er) {
                                                    alert('อัปโหลดเอกสารไม่สำเร็จ' + er);
                                                }
                                            });
                                        });

//                                    setTimeout(function() {
//                                        progress.percent(100);
//                                    }, 4000);




</script>
