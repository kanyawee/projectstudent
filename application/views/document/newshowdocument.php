<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-aqua-gradient">
            <tr>
                <td><center>ปีการศึกษา</center></td>
        <td  align="center">รหัสนักศึกษา</td>
        <td  align="center">ชื่อนักศึกษา</td>
        <td  align="center">เอกสาร1</td>
        <td  align="center">เอกสาร2</td>
        <td  align="center">เอกสาร3</td>
        <td  align="center">เอกสาร4</td>
        <td  align="center">เอกสาร5</td>
        <td  align="center">เอกสาร6</td>
        <?php if ($function != 0) { ?>
            <td  align="center">จบการทำงาน</td>
        <?php } ?>
        </tr>
        </thead>
        <tbody>
            <?php
//                                        print_r($datastudent);
            if ($datastudent != NULL) {
                foreach ($datastudent as $value) {
                    ?>
                    <tr>
                        <td align="center"><?php echo($value[0]['year']); ?></td>
                        <td align="center"><?php echo($value[0]['id_st']); ?></td>
                        <td><?php echo($value[0]['name_st']); ?> &nbsp;&nbsp;<?php echo($value[0]['lastname_st']); ?></td>
                        <!--//                                                print_r($year);-->
                        <?php for ($i = 0; $i < 6; $i++) { ?>

                            <td>
                                <?php if ($i == 0 && $this->db->where('id_st', $value[0]['id_st'])->where('year', $value[0]['year'])->get('document_1')->row()) {
                                    ?>
                                    <a href="<?php echo base_url('teacher/showdatadocument1') . "/" . ($value[0]['year']) . "/" . ($value[0]['id_st']); ?>"> <center>ส่งแล้ว</center>
                                        <?php
                                    }
                                    foreach ($value as $n) {
                                        if ($n['document_number'] == $i + 1) {
                                            $sever = base_url() . "/uploads/" . $n['document_name'];
                                            ?>

                                            <a target='_blank' href='<?php echo $sever ?>'><center>ส่งแล้ว</center></a>
                                            <?php
                                        }
                                    }
                                    ?>
                            </td>
                        <?php } ?>
                        <?php if ($function != 0) { ?>
                            <td>
                    <center><label class="checkbox-slider--b">
                            <input type="checkbox" class="switch-input" <?php
                                   if ($value[0]['finish'] == 1)
                                       echo("checked");
                                   else
                                       echo""
                                       ?> id="<?php echo $value[0]['id_st'] ?>" name="status" onchange="update(this);" value="<?php
                                   if ($value[0]['finish'] == 1)
                                       echo("0");
                                   else
                                       echo("1")
                                       ?>" >

                        </label> 
                    </center>
                    </td>

                    <?php
                }
                echo "</tr>";
            }
        } else {
            echo NULL;
        }
        ?>
        </tbody>                                   
    </table>

</div>