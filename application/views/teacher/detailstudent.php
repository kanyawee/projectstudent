<?php
$student = $student['0'];
$id_st = $student['id_st'];
$name_st = $student['name_st'];
$lastname_st = $student['lastname_st'];
$tell_st = $student['tell_st'];
$email = $student['email'];
$major = $student['major'];
$name_pr = $student['name_pr'];
$relation = $student['relation'];
$tell_pr = $student['tell_pr'];
$file_name = $student['file_name'];
?>  
<div class="content-wrapper">
    <div class="container">
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการข้อมูลนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i>  <a href="<?php echo base_url('teacher/showall'); ?> ">แสดงข้อมูลทั้งหมด</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file-text"></i> แสดงรายละเอียดนักศึกษา
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลรายละเอียดนักศึกษา</h3>
                    </div>
                    <div class="panel-body"> 
                        <table class="table ">
                            <thead>
                                <tr class="bg-aqua-gradient">
                                    <th></th>
                                    <th colspan="3">ข้อมูลทั่วไปของนักศึกษา</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="2">
                                        <?php if ($file_name != null) { ?>
                                            <img src="<?php echo base_url('uploads/') . $file_name ?>"  class="pull-left" alt="Cinque Terre" width="100" height="100"> 
                                        <?php } else { ?>
                                            <img src = "<?php echo base_url('assets/dist/img/icon-user-default.png'); ?>" class = "pull-left" alt = "Cinque Terre" width="100" height="100"/>
                                        <?php } ?>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th width = "20%"></th>
                                    <th >ข้อมูล</th>
                                    <th>รายละเอียดนักศึกษา</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>ชื่อนักศึกษา :</td>  
                                    <td><?php echo $name_st ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>นามสกุล :</td>
                                    <td><?php echo $lastname_st ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>รหัสนักศึกษา :</td>
                                    <td><?php echo $id_st ?></td>
                                </tr>                     
                                <tr>
                                    <td></td>
                                    <td>สาขาวิชา :</td>
                                    <td><?php echo $major ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>เบอร์โทรศัพท์ :</td>
                                    <td><?php echo $tell_st ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>E-mail :</td>
                                    <td><?php echo $email ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr class="bg-aqua-gradient">
                                    <th></th>
                                    <th colspan="3">ชื่อที่อยู่ผู้ที่สามารถติดต่อได้ในกรณีฉุกเฉิน</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>ชื่อ :</td>
                                    <td><?php echo $name_pr ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>เกี่ยวข้องเป็น :</td>
                                    <td><?php echo $relation ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>เบอร์โทรศัพท์ :</td>
                                    <td><?php echo $tell_pr ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr class="bg-aqua-gradient">
                                    <th></th>
                                    <th colspan="3">ข้อมูลสถานประกอบการ</th>

                                </tr>
                            </thead>
                            <?php
                            if (!empty($establish)) {
                                foreach ($establish as $value) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>ปีการศึกษา :</td>
                                            <td><?php echo $value['year'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ชื่อสถานประกอบการ :</td>
                                            <td><?php echo $value['name_es'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ที่อยู่ :</td>
                                            <td><?php echo $value['address_es'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ผู้ติดต่อ :</td>
                                            <td><?php echo $value['person_contect'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ตำแหน่ง :</td>
                                            <td><?php echo $value['position'] ?></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
