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
            } else {
                ?>
                <tr>
                    <td colspan="4" align="center"><?php echo "ยังไม่มีข้อมูล"; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>