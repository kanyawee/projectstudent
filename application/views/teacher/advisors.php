<link href="<?php echo base_url() . '/assets/css/datepicker.css'; ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url() . 'assets/tagitnew/Bootstrap.css' ?>" rel="stylesheet" type="text/css" />
?>" rel="stylesheet" type="text/css" />-->
<?php
//print_r($datastudent);
$newbox = array();
$i = 0;
foreach ($datastudent as $box) {
    $newbox[$box['id_st']][] = $box;
}
?> 
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    กำหนดอาจารย์ที่ปรึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> กำหนดอาจารย์ที่ปรึกษา
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">กำหนดอาจารย์ที่ปรึกษา</h3>
                    </div>

                    <div class="panel-body">
                        <h5>ปีการศึกษา<span style="padding-left:20px"><?php
                                if ($selectYear != NULL) {
                                    echo $selectYear['semester']."/".$selectYear['year'];
                                }
                                ?></span></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="bg-aqua-gradient">
                                <th><center>รหัสนักศึกษา</center></th>
                                <th><center>ชื่อ - นามสกุล</center></th>
                                <th><center>สาขา</center></th>
                                <th><center>อาจารย์ที่ปรึกษา</center></th>
                                <th></th>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($newbox as $student) {
//                                        print_r($student);
                                        ?>
                                    <form id="form1_<?= ++$i; ?>" name="form1" action="#" method="post">
                                        <tr id="or_<?= $i; ?>">
                                            <td width="20%" align='center'><?= $student[0]['id_st']; ?>
                                                <input type="hidden" id="id_st<?= $i; ?>" name="id_st" value="<?= $student[0]['id_st']; ?>" >
                                            </td>
                                            <td width="20%"><?= $student[0]['name_st'] ?> &nbsp;&nbsp;<?= $student[0]['lastname_st'] ?></td>
                                            <td width="20%"><?= $student[0]['major'] ?></td>
                                            <td>
                                                <?php foreach ($datateacher as $row): ?>
                                                    <?php
                                                    foreach ($student as $value) {
                                                        if ($value['teacher_id'] == $row['teacher_id']) {
                                                            ?>
                                                            <p><?php echo $row['teacher_name']; ?> &nbsp;&nbsp;<?php echo $row['teacher_lastname'] ?></p>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                                <span id="num<?= $i; ?>">

                                                    <div <?php if ($student[0]['teacher_id'] != 0) { ?> style="display:none;" <?php } ?> class="demo-section k-content">

                                                        <select  id="optional_<?= $i; ?>" multiple="multiple" name="teacher" data-placeholder="กรุณาเลือกอาจารย์...">
                                                            <?php foreach ($datateacher as $row): ?>
                                                                <option  
                                                                <?php
                                                                if (!empty($student[0]['teacher_id'])) {
                                                                    foreach ($student as $value) {
                                                                        if ($value['teacher_id'] == $row['teacher_id']) {
                                                                            echo "selected";
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                                    value="<?php echo $row['teacher_id'] ?> " >
                                                                    <?php echo $row['teacher_name'] ?> &nbsp;&nbsp;<?php echo $row['teacher_lastname'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>

                                                </span>

                                            </td>   
                                            <td width="10%">
                                        <center>
                                            <?php if ($student[0]['teacher_id'] != 0) { ?>
                                                                                                                                                                                                                <!--<a><i class="fa fa-floppy-o " style="font-size:20px;color:blue;" onclick="save_update(<?= $i; ?>)"  ></i></a>-->

                                                <!--<input class="btn btn-info" type="button" onclick="save_update(<?= $i; ?>)"  value="บันทึก" />-->
                                                <input class="btn btn-primary " type="button" onclick="deleted_all(<?= $student[0]['id_st']; ?>)"  value="ยกเลิก"/>
                                            <?php } else { ?>
                                                <!--<i class="fa fa-floppy-o " style="font-size:20px;color:blue;" id="add<?= $i; ?>"></i>-->
                                                <input class="btn btn-info" type="button" id="add<?= $i; ?>"  value="บันทึก"/>
                                            <?php } ?>
                                        </center>
                                        </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                                </tbody>
                            </table>
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
                <h4 class="modal-title">ยืนยันการลบข้อมูล</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p id="num">ยืนยันการยกเลิก</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!----------------------tag-it-------------------------------------->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() . 'assets/selectmilti/css/kendo.common.min.css'; ?>" />
<link rel="stylesheet" href="<?php echo base_url() . 'assets/selectmilti/css/kendo.default.min.css'; ?>" />
<script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/selectmilti/js/kendo.all.min.js'; ?>"></script>

<script>

<?php
$k = 0;
for ($j = 1; $j <= $i; $j++) {
    ?>

                                                        $(document).ready(function () {
                                                            var optional = $("#optional_<?= $j ?>").kendoMultiSelect({
                                                                autoClose: false
                                                            }).data("kendoMultiSelect");
                                                            var teacher = optional.value();

                                                            $("#add<?= $j ?>").click(function () {
                                                                //                                                                console.log($("#form1_<?= $j ?>").serializeArray());
                                                                $.ajax({
                                                                    type: "POST",
                                                                    data: {id: teacher, data: $("#form1_<?= $j ?>").serializeArray()},
                                                                    cache: false,
                                                                    url: "../teacher/add_advisors",
                                                                    success: function (data) {
                                                                        console.log(data);
                                                                        location.reload(true);
                                                                        //                                                                        alert(data);
                                                                        //                                                                    location.reload(true);
                                                                    }
                                                                });
                                                            });
                                                        });
<?php } ?>



                                                    function save_update(id) {
                                                        var optional = $("#optional_" + id).kendoMultiSelect({
                                                            autoClose: false
                                                        }).data("kendoMultiSelect");
                                                        var teacher = optional.value();
                                                        $.ajax({
                                                            type: "POST",
                                                            data: {id: teacher, data: $("#form1_" + id).serializeArray()},
                                                            cache: false,
                                                            url: "../teacher/uadate_orientation",
                                                            success: function (data) {
//                                                                    console.log(data);
//                                                                    alert(data);
                                                                location.reload(true);
                                                            }
                                                        });
                                                    }
//
//                                                    function deleted(id) {
//                                                        var a = "คุณต้องการลบรายชื่ออาจารย์นิเทศหรือไม่";
//                                                        $('#dataConfirmModal').modal({show: true});
//                                                        $(".modal-body #modal_id").val(id);
//                                                        $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
//                                                            $.ajax({
//                                                                type: "POST",
//                                                                data: {id: id},
//                                                                cache: false,
//                                                                url: "../teacher/deleted_orien",
//                                                                success: function (data) {
////                                                                        console.log(data);
////                                                                        alert(data);
//                                                                    location.reload(true);
//                                                                }
//                                                            });
//                                                        });
//                                                    }

                                                    function deleted_all(id) {
                                                        $('#dataConfirmModal').modal({show: true});
//                                                        $(".modal-body #modal_id").val(id);
                                                        $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
                                                            $.post("<?php echo base_url('teacher/delete_advisors'); ?>",
                                                                    {
                                                                        "id": id
                                                                    }, function (data) {
//                                                                        alert(data);
                                                                location.reload(true);
//                console.log(data);

                                                            });

                                                        });
                                                    }

</script>

