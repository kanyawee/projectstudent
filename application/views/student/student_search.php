<div class="table-responsive">
    <table id="example2"  class="table table-bordered table-hover table-striped">
        <thead class="bg-aqua-gradient">
            <tr>
                <th align='center'>ลำดับ</th>
                <th align='center'>รหัสนักศึกษา</th>
                <th align='center'>ชื่อ-นามสกุล</th>
                <th align='center'>เบอร์โทร</th>
                <th align='center'>สาขาวิชา</th>
                <th align='center'>แก้ไข</th>
                <th align='center'>ลบ</th>
            </tr>
        </thead>
        <?php
        $i = 1;
        if ($datastudent != NULL) {
            foreach ($datastudent as $row) {
                $id_st = $row['id_st'];
                $name_st = $row['name_st'];
                $lastname_st = $row['lastname_st'];
                $tell_st = $row['tell_st'];
                $major = $row['major'];


                $link = anchor('teacher/detailstudent/' . $id_st, "$name_st $lastname_st");
                $update = anchor('teacher/updatestudent/' . $id_st, '<button  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>');

                //                                    $attributs = "onclick= \"return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')\" ";
                $delete = "<button  class='btn btn-danger btn-xs' onclick='deleted($id_st)'><i class='fa fa-trash-o'></i></button>";
                ?>
                <tr id='but<?= $id_st ?>'>
                    <td align="center"><?= $i++ ?></td>
                    <td align="center"><?= $id_st ?></td>
                    <td><?= $link ?></td>
                    <td align="center"><?= $tell_st ?></td> 
                    <td><?= $major ?></td>
                    <td align="center"><?= $update ?></td>
                    <td align="center"><?= $delete ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6" class="text-center">
                    <?php echo "ไม่มีข้อมูลที่ค้นหา"; ?>
                </td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
</div>

