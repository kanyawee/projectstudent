<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ประเมินสถานประกอบการ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i>ประเมินสถานประกอบการและรายงานคะแนนการประเมิน
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>ประเมินสถานประกอบการและรายงานคะแนนการประเมิน</center></h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control" id="selectyear" name="selectyear">
                                    <?php foreach ($year as $value): ?>
                                        <option  
                                        <?php
                                        if (!empty($detail_es)) {
                                            foreach ($detail_es as $key => $val) {
                                                if ($val['year'] == $value['year']) {
                                                    echo "selected";
                                                }
                                            }
                                        }
                                        ?>
                                            value="<?php echo $value['semester'] . "/" . $value['year'] ?> " >
                                                <?php echo $value['semester'] . "/" . $value['year'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>                                
                        </div>
                        <div id="bored" class="col-lg-12">
                            <form id="form1" name="form1" action="<?php echo base_url('document/addorientation'); ?>" method="post">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="bg-aqua-gradient">
                                        <th><center>สถานประกอบการ</center></th>
                                        <td>1.1</td>
                                        <td>1.2</td>
                                        <td>2.1</td>
                                        <td>2.2</td>
                                        <td>2.3</td>
                                        <td>3.1</td>
                                        <td>4.1</td>
                                        <td>4.2</td>
                                        <td>4.3</td>
                                        <td>4.4</td>
                                        <td>4.5</td>
                                        <td>5.1</td>
                                        <td>5.2</td>
                                        <td>5.3</td>
                                        <td>5.4</td>
                                        <td>5.5</td>
                                        <td>5.6</td>
                                        <td>5.7</td>
                                        <td>5.8</td>
                                        <td>6</td>
                                        <td>เฉลี่ย</td>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($detail_es != NULL) {
                                                foreach ($detail_es as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><a href="<?php echo base_url('assessment/form_assessment_es/') . "/" . $value['year'] . "/" . $value['id_es']; ?>"><?= $value['name_es']; ?></td>
                                                        <?php
                                                        $colum = array(
                                                            'number1_1',
                                                            'number1_2',
                                                            'number2_1',
                                                            'number2_2',
                                                            'number2_3',
                                                            'number3_1',
                                                            'number4_1',
                                                            'number4_2',
                                                            'number4_3',
                                                            'number4_4',
                                                            'number4_5',
                                                            'number5_1',
                                                            'number5_2',
                                                            'number5_3',
                                                            'number5_4',
                                                            'number5_5',
                                                            'number5_6',
                                                            'number5_7',
                                                            'number5_8',
                                                            'number6',
                                                            'avg'
                                                        );

                                                        $score = $value['score'];
                                                        //print_r($score);

                                                        for ($i = 0; $i <= 20; $i++) {
                                                            if ($score == null) {
                                                                echo "<td></td>";
                                                            } else {
                                                                echo '<td>' . $score[$colum[$i]] . '</td>';
                                                            }
                                                        }
                                                        ?>
                                                    </tr>                                        
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="22" align="center"><?php echo "ยังไม่มีข้อมูล"; ?></td>
                                                </tr>
                                            <?php }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </form>
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
        var year = select.substring(2, 6);
        var semester = select.substring(0, 1);
//        alert(year);
//        alert(semester);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('assessment/showassessment_establish'); ?>',
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