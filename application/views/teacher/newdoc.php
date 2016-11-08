
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
                ?> 
                <?php foreach ($newbox as $name) { ?>
                    <tr>
                        <td id="name_es" rowspan = "<?= count($name) ?>" width="8%"><center><?= $name[0]['semester'] . "/" . $name[0]['year'] ?></center></td>
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