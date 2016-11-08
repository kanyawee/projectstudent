<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    แสดงรายชื่อนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> รายชื่อนักศึกษาที่ดูแล
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">รายชื่อนักศึกษาที่ดูแล</h3>
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
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>สาขา</th>
                                    <th>สถานประกอบการ</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if ($dataall != NULL) {
                                            foreach ($dataall as $value) {
                                                ?>
                                                <tr>
                                                    <td width="20%"><?= $value['id_st']; ?></td>
                                                    <td width="20%"><?= $value['name_st']; ?> &nbsp;&nbsp;<?= $value['lastname_st'] ?></td>
                                                    <td width="20%"><?= $value['major']; ?></td>
                                                    <td width="20%"><?= $value['name_es']; ?></td>
                                                <tr>
                                                </tr>                                        
                                                <?php
                                            }
                                        } else { ?>
                                                <tr>
                                                    <td colspan="4"><?php echo "ยังไม่มีข้อมูล"; ?></td>
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
        var year = select.substring(1, 5);
        var semester = select.substring(0, 1);
//        alert(year);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('teacher/show_advisors'); ?>',
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
</script>