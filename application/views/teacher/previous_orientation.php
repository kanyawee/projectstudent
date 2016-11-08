
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!--<a class="pull-right" href="#"><img src = "<?php echo base_url('assets/images/back.gif'); ?>"  alt = "User Image"/></a>-->

                <h1 class="page-header">
                    ตารางนิเทศย้อนหลัง
                </h1>
                <div class="pull-right">


                </div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> ตารางนิเทศย้อนหลัง
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ตารางนิเทศย้อนหลัง</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <form id="form_year" method="post" action="<?php base_url('teacher/previous_orientation'); ?>">
                                <select class="form-control" id="selectyear" name="selectyear">
                                    <?php foreach ($year as $value): ?>
                                        <option  
                                        <?php
                                        if (!empty($teacher)) {
                                            foreach ($teacher as $val) {
                                                if ($val['year'] == $value['year']) {
                                                    echo "selected";
                                                }
                                            }
                                        }
                                        ?>
                                            value="<?php echo $value['semester'] . $value['year'] ?> " >
                                                <?php echo $value['semester'] . "/" . $value['year'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="select_teacher"  name="selectteacher">
                                <option value="0">กรุณาเลือกอาจารย์...</option>
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
                                        <?php echo $row['teacher_name'] ?>&nbsp;&nbsp;<?php echo $row['teacher_lastname'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                        </div>

                        <div id="bored" class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover ">
                                    <thead class="bg-aqua-gradient">
                                    <th class=" text-center">ปีการศึกษา</th>
                                    <th class=" text-center" >อาจารย์นิเทศ</th>
                                    <th class=" text-center">สถานประกอบการ</th>
                                    <th class=" text-center">ที่อยู่</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($teacher != NULL) {
                                            $newbox = array();
                                            $i = 0;
                                            foreach ($teacher as $box) {
                                                $newbox[$box['teacher_id']][] = $box;
                                            }
                                            foreach ($newbox as $name) {
                                                ?>
                                                <tr>
                                                    <td id="name_es" rowspan = "<?= count($name) ?>" width="8%"><center><?= $name[0]['semester']."/".$name[0]['year'] ?></center></td>
                                            <td rowspan = "<?= count($name) ?>" width="20%"><?= $name[0]['teacher_name'] ?> &nbsp;&nbsp; <?= $name[0]['teacher_lastname'] ?></td>
                                            <?php
                                            foreach ($name as $key => $value) {
                                                ?>
                                                <td width="20%"><?= $value['name_es']; ?></td>
                                                <td width="30%"><?= $value['address_es']; ?></td>

                                                </tr>
                                                <?php
                                            }
                                            ?>                                        
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6" align="center"> <?php echo "ไม่มีข้อมูล"; ?></td>
                                        </tr>
                                        <?php
                                    }
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
</div>
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<script>
    $("#select_teacher").change(function () {
        var teacher = $("#select_teacher").val();
        var select = $("#selectyear").val();
        var year = select.substring(1, 5);
        var semester = select.substring(0, 1);
//                alert(teacher);
//                alert(semester);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/previous_orientation'); ?>',
            data: {
                id: teacher,
                year: year,
                semester: semester
            },
            success: function (response) {
                console.log(response);
//                alert(response);
                document.getElementById("bored").innerHTML = response;
            }
        });
    });
    $("#selectyear").change(function () {
        var select = $("#selectyear").val();
        var teacher = $("#select_teacher").val();
        var year = select.substring(1, 5);
        var semester = select.substring(0, 1);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/previous_orientation'); ?>',
            data: {
                year: year,
                semester: semester,
                id: teacher
            },
            success: function (response) {
                console.log(response);
                document.getElementById("bored").innerHTML = response;
            }
        });
    });

</script>

