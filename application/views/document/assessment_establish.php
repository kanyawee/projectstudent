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
                        <i class="fa fa-table"></i> แบบประเมินสถานประกอบการ
                    </li>
                </ol>
            </div>
        </div>
        <?php
        $this->load->library('session');
        $this->session->userdata('year');
        //print_r($establish);
        $establish = $establish[0];
        $id_es = $establish['id_es'];
        $name_es = $establish['name_es'];
        $id_st = $establish['id_st'];
        ?>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">แบบประเมินสถานประกอบการ</h3>
                    </div><br>
                    <div><label>ชื่อสถานประกอบการ</label> &nbsp;&nbsp;&nbsp;<?php echo $name_es; ?></div>
                    <?php
                    if (!empty($assessment)) {
                        foreach ($assessment as $value) {
                            extract($value);
                        }
                    } else {
                        echo NULL;
                    }
                    ?>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <form id="form1"action="<?php echo base_url('assessment/addpoint_assessment_es '); ?>" method="post">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <th>หัวข้อการประเมิน</th>
                                    <th>ระดับความคิดเห็น (1-5 หรือ -)</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>1. ความเข้าใจในการฝึกประสบการณ์วิชาชีพ</b><br>
                                                <p style="text-indent: 2.5em;">1.1 เจ้าหน้าที่ระดับบริหารและฝ่ายบุคคล</p>
                                            </td>
                                            <td><select name="number1_1" id="one" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number1_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p style="text-indent: 2.5em;">1.2 พนักงานที่ปรึกษา(job supervisor)</p></td>
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
                                            <td><b>2. การจัดการ และสนับสนุน</b><br>
                                                <p style="text-indent: 2.5em;">2.1 การประสานงานด้านการจัดการดูแลนักศึกษาภายใน
                                                <p style="text-indent: 2.5em;">สถานประกอบการระหว่าง ฝ่ายบุคคลและjob supervisor </p>
                                            </td>
                                            <td><select name="number2_1" id="two" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number2_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p style="text-indent: 2.5em;">2.2 การให้คำแนะนะดูแลนักศึกษาของฝ่ายบริหารบุคคล</p>
                                                <p style="text-indent: 2.5em;">(การปฐมนิเทศ การแนะนะระเบียบวินัย การลางาน สวัสดิการ การจ่ายค่าตอบแทน)</p>
                                            </td>
                                            <td><select name="number2_2" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number2_2 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p style="text-indent: 2.5em;">2.3 บุคลากรในสถานประกอบการให้ความสนใจสนับสนุนและ</p>
                                                <p style="text-indent: 2.5em;">ให้ความเป็นกันเองกับนักศึกษา</p>
                                            </td>
                                            <td><select name="number2_3" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number2_3 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>3. ปริมาณงานที่นักศึกษาได้รับ</b>
                                                <p style="text-indent: 2.5em;">3.1 ปริมาณงานที่นักศึกษาได้รับมอบหมาย</p>
                                            </td>
                                            <td><select name="number3_1" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number3_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>4. คุณภาพงาน</b>
                                                <p style="text-indent: 2.5em;">4.1 คุณลักษณะงาน (job description)</p>
                                            </td>
                                            <td><select name="number4_1" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number4_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">4.2 งานที่ได้รับมอบหมายตรงกับสาขาวิชาเอกของนักศึกษา</p>
                                            </td>
                                            <td><select name="number4_2" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number4_2 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">4.3 งานที่ได้รับมอบหมายตรงกับที่บริษัทเสอนไว้</p>
                                            </td>
                                            <td><select name="number4_3" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number4_3 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">4.4 งานที่ได้รับมอบหมายตรงกับความสนใจของนักศึกษา</p>
                                            </td>
                                            <td><select name="number4_4" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number4_4 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">4.5 ความเหมาะสมของหัวข้อรายงานที่นักศึกษาได้รับ</p>
                                            </td>
                                            <td><select name="number4_5" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number4_5 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><b>5. การมอบหมายงานและนิเทศของ Supervisor</b>
                                                <p style="text-indent: 2.5em;">5.1 มี Supervisor ดูแลนักศึกษาตั้งแต่วันแรกที่เข้าทำงาน</p>
                                            </td>
                                            <td><select name="number5_1" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_1 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.2 ความรู้และประสบการณ์วิชาชีพของSupervisor</p>
                                            </td>
                                            <td><select name="number5_2" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_2 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.3 เวลาที่ supervisor ให้แก่นักศึกษาด้านการปฏิบัติงาน</p>
                                            </td>
                                            <td><select name="number5_3" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_3 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.4 เวลาที่ supervisor ให้แก่นักศึกษาด้านการเขียนรายงาน</p>
                                            </td>
                                            <td><select name="number5_4" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_4 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.5 ความสนใจของ supervisor แต่การสอนงาน และสั่งงาน</p>
                                            </td>
                                            <td><select name="number5_5" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_5 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.6 การให้ความสำคัญต่อการประเมินผลการปฏิบัติงาน</p>
                                                <p style="text-indent: 2.5em;">และเขียนรายงานของ supervisor</p>
                                            </td>
                                            <td><select name="number5_6" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_6 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.7 ความพร้อมของอุปกรณ์เครื่องมือสำหรับนักศึกษา</p>
                                                <p style="text-indent: 2.5em;">(พิจารณาในกรณีนักศึกษา Co-op ซึ่งไปปฏิบติงานชั่วคราวเท่านั้น)</p>
                                            </td>
                                            <td><select name="number5_7" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_7 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-indent: 2.5em;">5.8 การจัดทำแผนปฏิบัติงานตลอดระยะเวลาของการปฎิบัติงาน</p>
                                            </td>
                                            <td><select name="number5_8" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number5_8 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><b>6. สรุปคุณภาพโดยรวมของสถานประกอบการแห่งนี้</b></td>
                                            <td><select name="number6" id="year" class="form-control" required >
                                                    <option value=" ">กรอกคะแนน</option>
                                                    <?PHP for ($i = 1; $i < 6; $i++) { ?>
                                                        <option <?php
                                                        if (!empty($value) && $number6 == $i) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?= $i ?>"><?PHP echo $i ?></option>
                                                        <?PHP } ?>
                                                </select></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="id_st" id="id_st" value="<?php echo $id_st; ?>">
                                <input type="hidden" name="id_es" id="id_es" value="<?php echo $id_es; ?>">
                                <div class="col-md-4 col-md-offset-4 ">
                                    <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                    <button class="btn btn-default" type="reset">ยกเลิก</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
