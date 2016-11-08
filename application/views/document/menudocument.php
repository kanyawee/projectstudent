
<div class="content-wrapper">
    <div class="container">
        <h1 class="page-header"></h1>
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <ol class="breadcrumb">
                    <li class="active">
                        <h4> &nbsp; ส่งเอกสารฝึกงาน</h4>
                    </li>
                </ol>
            </div>
        </div>
        <?php
        $alert1 = "<label style='color: #0066ff; font-weight: bold;'>ส่งแล้ว</label>";
        ?>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">เมนูเอกสาร</h3>
                    </div>    

                    <div class="panel-body"> 
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 20%">ลำดับ</th>
                                        <th>เอกสาร</th>
                                        <th>ส่งเอกสาร</th>
                                        <th>ดูเอกสาร</th>
                                        <th>ระยะเวลาการส่งเอกสาร</th>
                                    </tr>
                                    <tr>
                                        <td>เอกสารหมายเลข 1</td>
                                        <td>แบบแจ้งรายละเอียดที่พัก</td>
                                        <td id="status1">
                                            ยังไม่เปิด
                                        </td>
                                        <td><?php
                                            $document = $document;
                                            if ($document != NULL) {
                                                ?>
                                                <a href="<?php echo base_url('document/showdatafdocument1'); ?>" class="badge bg-info">
                                                    ดูเอกสาร
                                                </a>
                                                <?php
                                            } else {
                                                echo "ไม่มีเอกสาร";
                                            }
                                            ?>
                                        </td>
                                        <td id="date1"></td>

                                    </tr>
                                    <tr>
                                        <td>เอกสารหมายเลข 2</td>
                                        <td>แบบแจ้งแผนปฏิบัตงานการฝึกประสบการณ์วิชาชีพ</a></td>

                                        <td id="status2">
                                            ยังไม่เปิด
                                        </td>
                                        <td  id="n2">ไม่มีเอกสาร</td>
                                        <td id="date2"></td>
                                    </tr>
                                    <tr>
                                        <td id="document_three">เอกสารหมายเลข 3</td>
                                        <td>แบบแจ้งโครงร่างรายงานการปฏิบัติงาน</td>
                                        <td id="status3">
                                            <!--<a href="#" class="badge bg-blue" id="uploaddocument3" onclick="pop_upload('3')">อัปโหลด</a>-->
                                        </td>
                                        <td id="n3">ไม่มีเอกสาร</td>
                                        <td id="date3"></td>
                                    </tr>
                                    <tr>
                                        <td id="document_four">เอกสารหมายเลข 4</td>
                                        <td>แบบแจ้งยืนยันส่งรายงานการปฏิบัติงาน</td>
                                        <td id="status4">
                                            <!--<a href="#" class="badge bg-blue" id="uploaddocument4" onclick="pop_upload('4')">อัปโหลด</a>-->
                                        </td>
                                        <td id="n4">ไม่มีเอกสาร</td>
                                        <td id="date4"></td>
                                    </tr>
                                    <tr>
                                        <td>เอกสารหมายเลข 5</td>
                                        <td>แบบแจ้งรายละเอียดเกี่ยวกับการปฏิบัติงาน</td>
                                        <td id="status5">
                                            <!--<a href="#" class="badge bg-blue"  id="uploaddocument5" onclick="pop_upload('5')">อัปโหลด</a>-->
                                        </td>
                                        <td id="n5">ไม่มีเอกสาร</td>
                                        <td id="date5"</td>
                                    </tr>
                                    <tr>
                                        <td>เอกสารหมายเลข 6</td>
                                        <td>แบบแจ้งรายละเอียดงาน ตำแหน่ง พนักงานที่ปรึกษา </td>
                                        <td id="status6">
                                            <!--<a href="#" class="badge bg-blue"  id="uploaddocument6" onclick="pop_upload('6')">อัปโหลด</a>-->
                                        </td>
                                        <td  id="n6">ไม่มีเอกสาร</td>
                                        <td id="date6"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <h1 class="page-header"></h1>
</div>
<!-- Modal -->                                 
<div id="element_to_pop_up"><center><h4>อัพโหลดเอกสาร</h4></center>
    <span class="b-close" id="close">x </span>
    <?php echo form_open_multipart('', array('id' => 'upload_file')); ?>

    <div class="col-md-6 col-md-offset-3">
        <p><b>อัพโหลดเฉพาะไฟล์ pdf</b></p>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <input type="file" name="userfile" id="file" required onchange="return validateFileExtension(this)"/>
    </div>
    <input type="hidden" id = "doc_number" name="docment_number" value=" ">
    <br><br>
    <div id="btadd"></div>
    <div class="col-md-6 col-md-offset-3" >
        <center><input type="submit" value="Upload" id="document2" ></center>
    </div> 


    <?php form_close() ?>
</div>
<footer class="main-footer">
    <div class="container">
        <strong >Copyright &copy; 2014-2015 <p>มหาวิทยาลัยราชภัฏอุตรดิตถ์ เลขที่ 27 ถ.อินใจมี อ.เมือง จ.อุตรดิตถ์ 53000</p></strong>
    </div><!-- /.container -->
</footer>
</body>

<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<link href="<?php echo base_url('assets/css/poup.css') ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('assets/js/jquery.bpopup.min.js'); ?>"></script>
<script>

            $(document).ready(function () {
                status(1);
                status(2);
                status(3);
                status(4);
                status(5);
                status(6);

            });
            function status(id) {
//                alert(id);
                $.post("<?php echo base_urL('document/chack_status'); ?>",
                        {
                            "id": id
                        }, function (data) {
//                    console.log(data);
//                    alert(data);
                    data = jQuery.parseJSON(data)
                    status1 = data[0].status;
                    number = data[0].number_document;
                    date = data[0].startdate;
////                    console.log(status1);
                    console.log(number);
//                    var a ="alert('ยังไม่เปิดให้ส่งเอกสาร)";
                    if (status1 != 0) {
                        if (number == 1) {
                            var z = "<a href='<?php echo base_url('document/chackshowdata'); ?>' class='badge bg-blue'>กรอกข้อมูล</a>";
                            $("#status" + id).html(z);
                            var y = data[0].startdate.substring(6, 10);
                            var year = parseInt(y) + 543;
                            var y2 = data[0].startdate.substring(19);
                            var year2 = parseInt(y2) + 543;
                            $("#date" + id).html(data[0].startdate.substring(0, 6) + year + data[0].startdate.substring(10, 19) + year2);
                        } else if (number == 2) {
                            var d = " <a href='#' class='badge bg-blue' id='uploaddocument2' class='upload' onclick=pop_upload('2')> อัปโหลด</a>";
                            $("#status" + id).html(d);
                            var y = data[0].startdate.substring(6, 10);
                            var year = parseInt(y) + 543;
                            var y2 = data[0].startdate.substring(19);
                            var year2 = parseInt(y2) + 543;
                            $("#date" + id).html(data[0].startdate.substring(0, 6) + year + data[0].startdate.substring(10, 19) + year2);
                        } else if (number == 3) {
                            var e = " <a href='#' class='badge bg-blue' id='uploaddocument3' class='upload' onclick=pop_upload('3')> อัปโหลด</a>";
                            $("#status" + id).html(e);
                            var y = data[0].startdate.substring(6, 10);
                            var year = parseInt(y) + 543;
                            var y2 = data[0].startdate.substring(19);
                            var year2 = parseInt(y2) + 543;
                            $("#date" + id).html(data[0].startdate.substring(0, 6) + year + data[0].startdate.substring(10, 19) + year2);
                        } else if (number == 4) {
                            var f = " <a href='#' class='badge bg-blue' id='uploaddocument4' class='upload' onclick=pop_upload('4')> อัปโหลด</a>";
                            $("#status" + id).html(f);
                            var y = data[0].startdate.substring(6, 10);
                            var year = parseInt(y) + 543;
                            var y2 = data[0].startdate.substring(19);
                            var year2 = parseInt(y2) + 543;
                            $("#date" + id).html(data[0].startdate.substring(0, 6) + year + data[0].startdate.substring(10, 19) + year2);
                        } else if (number == 5) {
                            var g = " <a href='#' class='badge bg-blue' id='uploaddocument5' class='upload' onclick=pop_upload('5')> อัปโหลด</a>";
                            $("#status" + id).html(g);
                            var y = data[0].startdate.substring(6, 10);
                            var year = parseInt(y) + 543;
                            var y2 = data[0].startdate.substring(19);
                            var year2 = parseInt(y2) + 543;
                            $("#date" + id).html(data[0].startdate.substring(0, 6) + year + data[0].startdate.substring(10, 19) + year2);
                        } else if (number == 6) {
                            var h = " <a href='#' class='badge bg-blue' id='uploaddocument6' class='upload' onclick=pop_upload('6')> อัปโหลด</a>";
                            $("#status" + id).html(h);
                            var y = data[0].startdate.substring(6, 10);
                            var year = parseInt(y) + 543;
                            var y2 = data[0].startdate.substring(19);
                            var year2 = parseInt(y2) + 543;
                            $("#date" + id).html(data[0].startdate.substring(0, 6) + year + data[0].startdate.substring(10, 19) + year2);
                        }
                    } else {
                        $("#status" + id).html("ยังไม่เปิด");
                        $("#date" + id).html(data[0].startdate);
                    }
                });
            }

            function validateFileExtension(fld) {
                if (!/(\.pdf)$/i.test(fld.value)) {
                    alert("ไฟล์ไม่ถูกต้อง กรุณาเลือกใหม่");
                    fld.form.reset();
                    fld.focus();
                    return false;
                }
                return true;
            }
            function pop_upload(id) {
                // alert(id);
                $("#doc_number").val(id);
                $('#element_to_pop_up').bPopup();

            }
            // pop_up
            $(function () {

                var i;
                for (i = 1; i < 7; i++) {


                    // From jQuery v.1.7.0 use .on() instead of .bind()
                    $("#uploaddocument" + i).bind('click', function (e) {
                        //alert ('uploaddocument'+i);
                        // Prevents the default action to be triggered. 
                        e.preventDefault();

                        // Triggering bPopup when click event is fired
                        $('#element_to_pop_up').bPopup();

                    });
                }
                $("#upload_file").submit(function (e) {
                    e.preventDefault();// not reload form
                    $.ajax({
                        url: "../document/do_upload",
                        type: "POST",
                        data: new FormData(this), //{id:$('input:text').val()}
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (jd)
                        {
//                            console.log(jd);
                            $("#file").hide();
                            $("#document2").hide();
                            $("#btadd").html("<center><label style='color: #0066ff; font-weight: bold;'>บันทึกเอกสารสำเร็จ</label></center>");
                            $("#aleradd").html("<center><label style='color: #0066ff; font-weight: bold;'>ส่งแล้ว</label></center>");
//                                                                getstatus();
                        }
                        , error: function (er) {
                            alert('อัปโหลดเอกสารไม่สำเร็จ' + er);
                        }
                    });
                });

                Read(2);
                Read(3);
                Read(4);
                Read(5);
                Read(6);

            });

            function Read(id) {
                $.post("<?php echo base_url('document/readpdf'); ?>",
                        {
                            "id": id
                        }, function (data) {
                    data = jQuery.parseJSON(data)
                    iddoc = data[0].document_number;
//                    console.log(iddoc);
                    if (iddoc != null) {
                        var pdf = "<a href=<?php echo base_url('document/showpdf') ?>" + '/' + id + "  class='badge bg - info' >ดูเอกสาร</a>";
                        $("#n" + id).html(pdf);
                    } else {
                        $("#n" + id).html("ไม่มีเอกสาร");
                    }

                });
            }




</script>

