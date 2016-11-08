<?php
//print_r($datastudent);
$newbox = array();
$i = 0;
foreach ($teacher as $box) {
    $newbox[$box['teacher_id']][] = $box;
}
?> 
<div class="table-responsive">
    <table class="table table-bordered table-hover ">
        <thead>
        <th class="bg-info text-center">ปีการศึกษา</th>
        <th class="bg-info text-center" >อาจารย์นิเทศ</th>
        <th class="bg-info text-center">สถานประกอบการ</th>
        <th class="bg-info text-center">ที่อยู่</th>
        </thead>
        <tbody>
            <?php foreach ($newbox as $name) { ?>
                <tr>
                    <td id="name_es" rowspan = "<?= count($name) ?>" width="8%"><center><?= $name[0]['year'] ?></center></td>
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
        ?>
        </tbody>


    </table>
</div>