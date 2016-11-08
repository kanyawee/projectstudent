<link href="<?php echo base_url() . '/assets/css/datepicker.css'; ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url() . 'assets/tagitnew/Bootstrap.css' ?>" rel="stylesheet" type="text/css" />
<!-- <?php
//print_r($datastudent);
$newbox = array();
$i = 0;
foreach ($datastudent as $box) {
    $newbox[$box['id_es']][] = $box;
}
?> -->
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    กำหนดตารางนิเทศ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> กำหนดตารางนิเทศของอาจารย์
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">กำหนดตารางนิเทศของอาจารย์</h3>
                    </div>

                    <div class="panel-body">
                        <?php
                        extract($newbox);
                        ?>
                        <h5>ปีการศึกษา<span style="padding-left:20px"><?php
                                if ($selectYear != NULL) {
                                    echo $selectYear['semester']."/".$selectYear['year'];
                                }
                                ?></span>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="bg-aqua-gradient">
                                <th ><center>สถานประกอบการ</center></th>
                                <th ><center>นักศึกษา / ที่ปรึกษา</center></th>
                                <th ><center>วันที่</center></th>
                                <th ><center>เวลา</center></th>
                                <th  colspan="2"><center>อาจารย์นิเทศ</center></th>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($newbox as $compname) {
                                        extract($compname);
                                        ?>
                                        <?php
                                        foreach ($establish as $key => $establish_name) {
                                            if ($establish_name['id_es'] == $compname[0]['id_es']) {
                                                ?>
                                            <form id="form1_<?= ++$i; ?>" name="form1" action="#" method="post">
                                                <tr id="or_<?= $i; ?>">
                                                    <td width="15%"><?= $establish_name['name_es'] ?></td>
                                                    <td width="20%">      
                                                        <p>
                                                            <?php
                                                            foreach ($datateacher as $key => $value_th) {
                                                                foreach ($student as $key => $val_st) {
                                                                    if ($val_st['id_es'] == $establish_name['id_es'] && $val_st['teacher_id'] == $value_th['teacher_id']) {
                                                                        ?>
                                                                    <p><?php echo $val_st['name_st']; ?> &nbsp;&nbsp;<?php echo $val_st['lastname_st']; ?></p>
                                                                    <p><?php echo $value_th['teacher_name']; ?> &nbsp;&nbsp;<?php echo $value_th['teacher_lastname']; ?></p>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        </p>
                                                    </td>
                                                    <?php
                                                    foreach ($compname as $row) {
                                                        extract($row);
//                                                print_r($row);
                                                        ?>
                                                        <td width="5%"><center>
                                                        <div class="hero-unit" >
                                                            <?php
                                                            $this->db->select('*');
                                                            $this->db->from('orientation');
//                                                    $this->db->join('orientation_teacher', 'orientation_teacher.id_orien = orientation.id_orien');
                                                            $this->db->where('orientation.id_es', $id_es);
                                                            $this->db->where('orientation.year', $selectYear['year']);
                                                            $data = $query = $this->db->get()->result_array();
                                                            ?>
                                                            <input type="hidden" id="id_es<?= $i; ?>" name="id_es"  value="<?php echo $id_es; ?>" >
                                                            <?php if (!empty($data)) { ?>
                                                                <p><?php echo $data[0]['date']; ?></p>
                                                            <?php } else { ?>
                                                                <input class="input-medium dp-applied" type="text" <?php if (!empty($data)) { ?> value="<?php echo $data[0]['date']; ?>" <?php } ?> data-provide="datepicker" id="date_<?= $i; ?>" name="date"  data-date-language="th-th" style=" width_e: 90%" required/>
                                                            <?php } ?>
                                                        </div>
                                                    </center>
                                                    </td>
                                                    <td width="20%">
                                                    <center>
                                                        <?php if ($data != NULL) { ?> 
                                                            <p><?php echo $data[0]['time_start']; ?>&nbsp;&nbsp; - &nbsp;<?php echo $data[0]['time_end']; ?></p>
                                                        <?php } else {
                                                            ?>
                                                            <p id="timeOnlyExample" >
                                                                <input  type="text" id = "start_<?= $i; ?>" <?php if (!empty($data)) { ?> value="<?php echo $data[0]['time_start']; ?>" <?php } ?> class="time start" name="start" style=" width: 30%" required/> -
                                                                <input type="text" id= "end_<?= $i; ?>" <?php if (!empty($data)) { ?> value="<?php echo $data[0]['time_end']; ?>" <?php } ?>class="time end" name="end" style=" width: 30%" required />
                                                            </p>
                                                            <?php
                                                        }
                                                        ?>

                                                    </center>
                                                    </td>
                                                    <td width="17%">
                                                        <?php if (!empty($data)) { ?>
                                                            <?php
                                                            $this->db->select('*');
                                                            $this->db->from('orientation_teacher');
                                                            $this->db->where('orientation_teacher.id_orien', $data[0]['id_orien']);
                                                            $data1 = $query = $this->db->get()->result_array();
                                                            ?>
                                                            <?php foreach ($datateacher as $row): ?>
                                                                <?php
                                                                foreach ($data1 as $value2) {
                                                                    if ($value2['teacher_id'] == $row['teacher_id']) {
                                                                        ?>
                                                                        <p><?php echo $row['teacher_name']; ?> &nbsp;&nbsp;<?php echo $row['teacher_lastname']; ?></p>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                        <span id="num<?= $i; ?>">

                                                            <div <?php if ($data != NULL) { ?> style="display:none;" <?php } ?> class="demo-section k-content">

                                                                <select  id="optional_<?= $i; ?>" multiple="multiple" name="teacher" data-placeholder="กรุณาเลือกอาจารย์...">
                                                                    <?php foreach ($datateacher as $row): ?>
                                                                        <option  
                                                                        <?php
                                                                        if (!empty($data)) {
                                                                            foreach ($data1 as $value2) {
                                                                                if ($value2['teacher_id'] == $row['teacher_id']) {
                                                                                    echo "selected";
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                            value="<?php echo $row['teacher_id'] ?> " >
                                                                                <?php echo $row['teacher_name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                            </div>

                                                        </span>

                                                    </td>   
                                                    <td width="10%">
                                                    <center>
                                                        <?php if ($data != NULL) { ?>
                                                                                                                                                                                                                            <!--<a><i class="fa fa-floppy-o " style="font-size:20px;color:blue;" onclick="save_update(<?= $i; ?>)"  ></i></a>-->

                                                            <!--<input class="btn btn-info" type="button" onclick="save_update(<?= $i; ?>)"  value="บันทึก" />-->
                                                            <input class="btn btn-primary " type="button" onclick="deleted_all(<?= $id_es; ?>)"  value="ยกเลิก"/>
                                                        <?php } else { ?>
                                                            <!--<i class="fa fa-floppy-o " style="font-size:20px;color:blue;" id="add<?= $i; ?>"></i>-->
                                                            <input class="btn btn-info" type="button" id="add<?= $i; ?>"  value="บันทึก"/>
                                                        <?php } ?>
                                                    </center>
                                                    </td>
                                                    </tr>
                                                </form>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
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
                <p id="num">ยืนยันการลบข้อมูล</p>
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
<!--<script src="<?php // echo base_url() . 'assets/tagitnew/jquery-ui.1.8.20.min.js'                                                                                                                                                                                                              ?>"></script>-->
<!--<script src="<?php // echo base_url() . 'assets/tagitnew/tagit-themeroller.js'                                                                                                                                                                                                              ?>"></script>-->

<!-----------------------date--------------------------------------->
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker-thai.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.th.js') ?>"></script>
<!-----------------------time--------------------------------------->
<script src="<?php echo base_url() . 'assets/datetime/js/jquery.timepicker.js'; ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetime/css/jquery.timepicker.css'; ?>" />
<script src="<?php echo base_url() . 'assets/datetime/lib/jquery.ptTimeSelect.js'; ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetime/lib/jquery.ptTimeSelect.css'; ?>" />
<script src="<?php echo base_url() . 'assets/datetime/dist/datepair.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url() . 'assets/selectmilti/css/kendo.common.min.css'; ?>" />
<link rel="stylesheet" href="<?php echo base_url() . 'assets/selectmilti/css/kendo.default.min.css'; ?>" />
<script src="<?php // echo base_url() . 'assets/js/jquery.min.js';                                                                                                                                                                                                             ?>"></script>
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
                                                    //                var form = $("#form1_<?= $j ?>").serializeArray();
                                                    var teacher = optional.value();
                                                    //                var form = $("#form1_<?= $j ?>").serializeArray();
                                                    //                form.push(optional1);
                                                    $("#add<?= $j ?>").click(function () {
                                                        $.ajax({
                                                            type: "POST",
                                                            data: {id: teacher, data: $("#form1_<?= $j ?>").serializeArray()},
                                                            cache: false,
                                                            url: "../teacher/addorientation",
                                                            success: function (data) {
                                                                console.log(data);
                                                                location.reload(true);
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

                                            function deleted(id) {
                                                var a = "คุณต้องการลบรายชื่ออาจารย์นิเทศหรือไม่";
                                                $('#dataConfirmModal').modal({show: true});
                                                $(".modal-body #modal_id").val(id);
                                                $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
                                                    $.ajax({
                                                        type: "POST",
                                                        data: {id: id},
                                                        cache: false,
                                                        url: "../teacher/deleted_orien",
                                                        success: function (data) {
//                                                                        console.log(data);
//                                                                        alert(data);
                                                            location.reload(true);
                                                        }
                                                    });
                                                });
                                            }

                                            function deleted_all(id) {
                                                $('#dataConfirmModal').modal({show: true});

                                                $(".modal-body #modal_id").val(id);
                                                $('#dataConfirmModal').on('click', '#dataConfirmOK', function (e) {
                                                    $.post("<?php echo base_url('teacher/delete_all'); ?>",
                                                            {
                                                                "id": id
                                                            }, function (data) {
                                                        location.reload(true);
//                console.log(data);

                                                    });

                                                });
                                            }

                                            //        function sendData(id) {
                                            //            console.log($("#date_10").val());
                                            //            console.log($("#start_10").val());
                                            //            console.log($("#end_10").val());
                                            //            console.log($("select[id='teacher_10']").map(function () {
                                            //                return $(this).val();
                                            //            }).get());
                                            //            console.log($("#teacher_10 option:selected").map(function () {
                                            //                return $(this).val();
                                            //            }).get());
                                            //        }

                                            $('#timeOnlyExample .time').timepicker({
                                                'minTime': '8:00am',
                                                'maxTime': '16:00pm',
                                                'step': '15',
//                                                                    'showDuration': true,
                                                'format': 'H:i'
                                            }
                                            );
                                            var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
                                            var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);


</script>

