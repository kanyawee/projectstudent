<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    รายงานตารางนิเทศ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> รายงานตารางนิเทศของอาจารย์
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">รายงานตารางนิเทศของอาจารย์</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <p>
                                <select class="form-control" id="selectyear" name="selectyear">
                                    <?php
                                    if (!empty($year)) {
                                        foreach ($year as $value):
                                            ?>
                                            <option  
                                                value="<?php echo $value['semester'] . $value['year'] ?> " >
                                                    <?php echo $value['semester'] . "/" . $value['year'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </select>
                            </p>
                        </div>
                        <br>

                        <div id="bored" class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover ">
                                    <thead class="bg-aqua-gradient text-center">
                                    <th>สถานประกอบการ</th>
                                    <th>นักศึกษา</th>
                                    <th>สาขา</th>
                                    <th>อาจารย์นิเทศ</th>
                                    <th>วันที่</th>
                                    <th>เวลา</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($datastudent != null) {
                                            $newbox = array();
                                            foreach ($datastudent as $box) {
                                                $newbox[$box['id_es']][] = $box;
                                            }
                                            ?>
                                            <?php foreach ($newbox as $name) { ?>
                                                <tr>
                                                    <td rowspan = "<?= count($name) ?>" width="20%"><?= $name[0]['name_es'] ?></td>
                                                    <td rowspan = "<?= count($name) ?>" width="20%">
                                                        <?php
                                                        foreach ($student as $key => $value) {
                                                            if ($value['id_es'] == $name[0]['id_es']) {
                                                                echo $value['name_st']
                                                                ?>&nbsp;&nbsp; <?=
                                                                $value['lastname_st'] . "<br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td rowspan = "<?= count($name) ?>" width="20%">
                                                        <?php
                                                        foreach ($student as $key => $value) {
                                                            if ($value['id_es'] == $name[0]['id_es']) {
                                                                echo $value['major'] . "<br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php
                                                    foreach ($name as $row) {
                                                        extract($row);
                                                        ?>
                                                        <td width="20%"><?= $teacher_name ?> &nbsp;&nbsp; <?= $teacher_lastname; ?></td>
                                                        <td><?= $date; ?></td>
                                                        <td width="10%"><?= $time_start; ?>&nbsp;-&nbsp;<?= $time_end; ?></td>

                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                </tr>                                        
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
    $("#selectyear").change(function () {
        var select = $("#selectyear").val();
//        alert(select);
        var year = select.substring(1, 5);
        var semester = select.substring(0, 1);
//        alert(year);
//        alert(semester);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/showorientation'); ?>',
            data: {
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

    $("#select_semester").change(function () {
        var semester = $("#select_semester").val();
//        alert(year);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/showorientation'); ?>',
            data: {
                semester: semester
            },
            success: function (response) {
                console.log(response);
//                alert(response);
                document.getElementById("bored").innerHTML = response;
            }
        });
    });
</script>