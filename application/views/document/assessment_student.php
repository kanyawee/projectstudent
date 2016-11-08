<?php
if (!empty($year)) {
    extract($year);
}echo '';
?>
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
                        <i class="fa fa-table"></i> แบบประเมินนักศึกษา
                    </li>
                </ol>
            </div>
        </div>
        <?php
        $student = $student[0];
        $id_st = $student['id_st'];
        $name_st = $student['name_st'];
        $lastname_st = $student['lastname_st'];
        $major = $student['major'];
        $name_es = $student['name_es'];
        ?>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">แบบประเมินนักศึกษา </h3>
                    </div><br>
                    <div><label style="text-indent: 1em;">ชื่อนักศึกษา :</label>&nbsp;&nbsp;&nbsp;<?php echo $name_st ?> &nbsp;&nbsp;&nbsp;<label style="text-indent: 2.5em;">นามสกุล:</label>&nbsp;&nbsp;&nbsp;<?php echo $lastname_st ?> 
                        <label style="text-indent: 1em;">สาชาวิชา :</label> &nbsp;&nbsp;&nbsp;<?php echo $major ?><label style="text-indent: 1em;">ชื่อสถานประกอบการ :</label>&nbsp;&nbsp;&nbsp;<?php echo $name_es ?>
                        <p><label style="text-indent: 1em;">Check List :  เอกสารที่นักศึกษาจะต้องนำส่งให้กับฝ่ายฝึกประสบการณ์วิชาชีพ</label></p>
                        <p style="text-indent: 2.5em;"><i class="fa fa-check"></i> แบบแจ้งรายละเอียดที่พักระหว่างการฝึกประสบการณ์วิชาชีพ</p>
                        <p style="text-indent: 2.5em;"><i class="fa fa-check"></i> แบบแจ้งรายละเอียดงาน ตำแหน่งงาน พนักงานที่ปรึกษา</p>
                        <p style="text-indent: 2.5em;"><i class="fa fa-check"></i> แบบแจ้งแผนการปฏิบัติงานการฝึกประสบการณ์วิชาชีพ</p>
                        <p style="text-indent: 2.5em;"><i class="fa fa-check"></i> แบบแจ้งโครงร่างรายงานการปฏิบัติงาน</p>
                    </div>
                    <?php
                    if (!empty($assessment)) {
                        foreach ($assessment as $value) {
                            extract($value);
                        }
                    } else {
                        echo " ";
                    }
                    ?>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <form id="form" action="<?php echo base_url('assessment/addpoint_assessment_st') . "/" . $id_st; ?>" method="post">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <th>หัวข้อการประเมิน</th>
                                    <th>ระดับความคิดเห็น (1-5 หรือ -)</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>1. การพัฒนาตนเอง</b><br>
                                                <p style="text-indent: 2.5em;">1.1 บุคลิกภาพ</p>
                                            </td>
                                            <td><select name="number1_1" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><p style="text-indent: 2.5em;">1.2 วุฒิภาวะ</p></td>
                                            <td><select name="number1_2" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_2 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">1.3 การปรับตัว
                                            </td>
                                            <td><select name="number1_3" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_3 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><p style="text-indent: 2.5em;"><p style="text-indent: 2.5em;">1.4 การเรียนรู้ </p></p>
                                            </td>
                                            <td><select name="number1_4" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_4 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><p style="text-indent: 2.5em;">1.5 การแสดงความคิดเห็น การแสดงออก</p>
                                            </td>
                                            <td><select name="number1_5" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_5 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">1.6 มนุษยสัมพันธ์</p>
                                            </td>
                                            <td><select name="number1_6" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_6 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">1.7 ทัศนคติ</p>
                                            </td>
                                            <td><select name="number1_7" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_7 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>2. การแสดงความมีส่วนร่วมกับองค์กร</b></td>                                        </td>
                                            <td><select name="number2" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number2 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>3. ความประพฤติ คุณธรรม จริยธรรม และการปฏิบัติ ตามระเบียบ
                                                    <p>วินัยขององค์กร เช่น การลา การขาดงาน แต่งกาย</p>
                                                </b></td>
                                            <td><select name="number3" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number3 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>4. ความรู้ความสามารถ พื้นฐานที่จำเป็นต่อการปฏิบัติงานที่ได้รับ
                                                    <p>มอบหมายให้สำเร็จ</p>
                                                </b></td>
                                            <td><select name="number4" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number4 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>5. ความก้าวหน้าของการจัดทำรายงาน (Work Term Report)
                                                    <p>มอบหมายให้สำเร็จ</p>
                                                </b></td>
                                            <td><select name="number5" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>6. ความพึงพอใจของนักศึกษา</b></td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">6.1 ต่องานที่ได้ปฏิบัติและสถานประกอบการ</p>
                                            </td>
                                            <td><select name="number6_1" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number6_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">6.2 ต่อความเหมาะสมความปลอดภัย ของที่พัก</p>
                                            </td>
                                            <td><select name="number6_2" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number6_2 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">6.3 ต่อความสะดวกปลอดภัยในการเดินทางไป - กลับ</p>
                                            </td>
                                            <td><select name="number6_3" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number6_3 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">6.4 ต่อความเหมาะสมของค่าตอบแทน</p>
                                            </td>
                                            <td><select name="number6_4" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number6_4 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>7. สรุปคุณภาพโดยรวมของนักศึกษา</b></td>
                                            <td><select name="number7" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number7 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="col-lg-6"></div>
                                    <div class=""></div>
                                </div> 
                                <div class="col-md-5 col-md-offset-4 ">

                                    <input type="hidden" name="id_st" id="id_st" value="<?php echo $id_st ?>">
                                    <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                    <button class="btn btn-default" type="reset">ยกเลิก</button>
                                </div>  
                            </form>
                            <div class="col-md-4 col-md-offset-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-6"></div>