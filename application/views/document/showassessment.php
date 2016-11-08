<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ประเมินนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> ประเมินนักศึกษาและรายงานคะแนนการประเมิน
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">ประเมินนักศึกษาและรายงานคะแนนการประเมิน</h3></center>
                    </div>
                    <div class="panel-body"> 
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control" id="selectyear" name="selectyear">
                                    <?php foreach ($year as $value): ?>
                                        <option  
                                        <?php
                                        if (!empty($detail_st)) {
                                            foreach ($detail_st as $key => $val) {
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
                        <div id="bored"class="col-lg-12">
                            <form id="form1" name="form1" action="<?php echo base_url('document/addorientation'); ?>" method="post">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="bg-aqua-gradient">
                                        <th>ที่ฝึกงาน</th>
                                        <th>ชื่อนักศึกษา</th>
                                        <th>1.1</th>
                                        <th>1.2</th>
                                        <th>1.3</th>
                                        <th>1.4</th>
                                        <th>1.5</th>
                                        <th>1.6</th>
                                        <th>1.7</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6.1</th>
                                        <th>6.2</th>
                                        <th>6.3</th>
                                        <th>6.4</th>
                                        <th>7</th>
                                        <th>เฉลี่ย</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($detail_st != NULL) {
                                                foreach ($detail_st as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $value['name_es'] ?></td>
                                                        <td><a href="<?php echo base_url('assessment/form_assessment_st/') . "/" . $value['year'] . "/" . $value['id_st'] ?>"><?= $value['name_st'] ?>&nbsp;&nbsp;<?= $value['lastname_st'] ?></td>

                                                        <?php
                                                        $colum = array(
                                                            'number1_1',
                                                            'number1_2',
                                                            'number1_3',
                                                            'number1_4',
                                                            'number1_5',
                                                            'number1_6',
                                                            'number1_7',
                                                            'number2',
                                                            'number3',
                                                            'number4',
                                                            'number5',
                                                            'number6_1',
                                                            'number6_2',
                                                            'number6_3',
                                                            'number6_4',
                                                            'number7',
                                                            'avg'
                                                        );

                                                        $score = $value['score'];
                                                        //print_r($score);

                                                        for ($i = 0; $i <= 16; $i++) {
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
                                            }
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
            url: '<?php echo base_url('assessment/showassessment'); ?>',
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