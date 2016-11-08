<?php
//print_r($datastudent);
if ($datastudent != null) {
    $newbox = array();
    foreach ($datastudent as $box) {
        $newbox[$box['id_es']][] = $box;
    }
    ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-aqua-gradient text-center">
            <th>สถานประกอบการ</th>
            <th>นักศึกษา</th>
            <th>สาขา</th>
            <th>อาจารย์นิเทศ</th>
            <th>วันที่</th>
            <th>เวลา</th>
            </thead>
            <tbody>
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
            
            ?>
        </tbody>
    </table>
</div>
<?php }  else {?>
            <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-aqua-gradient text-center">
            <th>สถานประกอบการ</th>
            <th>นักศึกษา</th>
            <th>สาขา</th>
            <th>อาจารย์นิเทศ</th>
            <th>วันที่</th>
            <th>เวลา</th>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6" align="center"><?php echo "ไม่มีข้อมูล"; ?></td>
                </tr>
        </tbody>
    </table>
</div>
<?php 

}

?>