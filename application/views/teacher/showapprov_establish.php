<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    การอนุมัติสถานประกอบการ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงการอนุมัติสถานประกอบการ
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">อนุมัติสถานประกอบการ</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">  
                                <thead class="bg-aqua-gradient">
                                <th align='center' width="12%">รหัสนักศึกษา</th>
                                <th align='center' width="20%">ชื่อ-นามสกุล</th>
                                <th align='center' width="12%">เบอร์โทร</th>
                                <th align='center' width="30%">สถานประกอบการ</th>
                                <th align='center' width="15%"></th>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($datastudent != null) {
                                        $i = 1;
                                        if (!empty($datastudent[0]['year'])) {
                                            $this->session->set_userdata('year', $datastudent[0]['year']);
                                        }
                                        foreach ($datastudent as $row) {
                                            $id_st = $row['id_st'];
                                            $name_st = $row['name_st'];
                                            $lastname_st = $row['lastname_st'];
                                            $tell_st = $row['tell_st'];
                                            $name_es = $row['name_es'];
                                            $id_es = $row['id_es'];
                                            $status = $row['status'];
                                            $attributs = "onclick= \"return confirm('คุณต้องการ ยกเลิก ข้อมูลหรือไม่ ?')\" ";
                                            echo "<tr id='$id_st'>
                        <td>$id_st</td>
                        <td>$name_st $lastname_st</td>
                        <td>$tell_st</td>";
                                            ?>
                                        <td><?php echo $name_es ?> &nbsp; <i id="Detail"class="glyphicon glyphicon-exclamation-sign fancybox" href="#inline<?= $id_st ?>>"></i>
                                            <div id="inline<?= $id_st ?>" style="display: none;width: 500px;">
                                                <div id="element_to_pop_up"><center><h4>รายละเอียดสถานประกอบการ</h4></center>
                                                    <div>
                                                        <table class="table table-bordered " id="tabledetail">
                                                            <thead>
                                                                <tr class="colorpicker-visible">
                                                                    <th width="40%">ข้อมูล</th>
                                                                    <th>รายละเอียด</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>ชื่อสถานประกอบการณ์</td>
                                                                    <td><?= $name_es ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ที่อยู่</td>
                                                                    <td><?= $row['address_es'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>เว็บไซต์ </td>
                                                                    <td><?= $row['website'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>E-mail</td>
                                                                    <td><?= $row['email'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>เบอร์โทรศัพท์</td>
                                                                    <td><?= $row['tell_es'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>จำนวนบุคลากร</td>
                                                                    <td><?= $row['peple'] ?> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div></td>
                                        <td width="20%" id="but<?= $id_st ?>">
                                            <?php if ($status == 1) { ?>
                                                <a  href="#" onclick="approvedata(<?= $id_st ?>, 'apr')">
                                                    <button class="btn approve" id="approve"> ยกเลิกอนุมัติ </button> 
                                                </a>
                                            <?php } ?>

                                            <?php if ($status == 0) { ?>
                                                <a href="#" onclick="approvedata(<?= $id_st ?>, 'ap')">
                                                    <button class="btn btn-skyer">อนุมัติ</button>
                                                </a> 
                                                <a href="#" onclick="approvedata(<?= $id_st ?>, 'del_modal')">
                                                    <button class="btn btn-dangery">ไม่อนุมัติ</button>
                                                </a> 
                                            </td>
                                            <?php
                                        }
                                        ?>


                                        <?php
                                        echo "</tr>";
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" align="center">
                                            <?php echo "ไม่มีข้อมูล"; ?>
                                        </td>
                                    </tr>

                                <?php }
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
                <p>คุณต้องการยกเลิกหรือไม่</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/fancy/source/jquery.fancybox.js?v=2.1.5'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancy/source/jquery.fancybox.css?v=2.1.5'); ?>" media="screen" />
<script>
                                                    $(document).ready(function () {
                                                        $('.fancybox').fancybox();
                                                    });

                                                    function approvedata(id, action) {
                                                        if (action == "del_modal") {
                                                            //alert('deleted');
                                                            $('#dataConfirmModal').modal({show: true});

                                                            $(".modal-body #modal_id").val(id);
                                                            $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
                                                                //console.log('deleted',id);
                                                                approvedata(id, 'del');
                                                            });
                                                        }

                                                        $.post("<?= base_url() . $this->uri->segment(1) . '/approve'; ?>",
                                                                {
                                                                    "id": id,
                                                                    "action": action
                                                                }, function (data, status) {
//                                                        console.log(data);
                                                            data = JSON.parse(data);
                                                            console.log(data.info);
                                                            if (data.info == "approved") {
                                                                //console.log("OK! update table");
                                                                var s = "<a href='#' onclick=approvedata(" + id + ",'ap')>"
                                                                s += "<button class='btn btn-skyer'>อนุมัติ</button> </a> "
                                                                s += " <a href='#' onclick=approvedata(" + id + ",'del_modal')>"
                                                                s += " <button class='btn btn-dangery'>ไม่อนุมัติ</button></a> "
                                                                $("#but" + id).html(s);

                                                            }
                                                            if (data.info == "deleted") {
                                                                $("#" + id).html("");
                                                            }

                                                            if (data.info == "approve") {
                                                                var a = "<a href='#' onclick=approvedata(" + id + ",'apr') >"
                                                                a += "<button class ='btn approve' id ='approve'> ยกเลิกอนุมัติ </button></a>"
                                                                $("#but" + id).html(a);
                                                            }

                                                        });
                                                    }

</script>

<footer class="main-footer">
    <div class="container">
        <strong >Copyright &copy; 2014-2015 <p>มหาวิทยาลัยราชภัฏอุตรดิตถ์ เลขที่ 27 ถ.อินใจมี อ.เมือง จ.อุตรดิตถ์ 53000</p></strong>
    </div><!-- /.container -->
</footer>
</body>
</html>