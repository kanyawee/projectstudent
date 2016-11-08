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
            } else {
                ?>
                <tr>
                    <td colspan="19" align="center"><?php echo "ไม่มีข้อมูล"; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>