<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ข้อมูลสถานประกอบการ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <a href="<?php echo base_url('index.php/teacher/dataestablishall'); ?>">ข้อมูลสถานประกอบการทั้งหมด</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงข้อมูลสถานประกอบการ
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title" >ข้อมูลรายละเอียดสถานประกอบการ</h3>
                    </div>
                    <?php
                    $dataupdate = $dataupdate[0];
                    $teacher_id = $dataupdate['teacher_id'];
                    $teacher_name = $dataupdate['teacher_name'];
                    $teacher_lastname = $dataupdate['teacher_lastname'];
                    $phone = $dataupdate['phone'];
                    ?>     
                    <div class="panel-body"> 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">ข้อมูลอาจารย์นิเทศ</th>
                                </tr>
                                <tr>
                                    <th width = "30%">ข้อมูล</th>
                                    <th>รายละเอียดอาจารย์</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ชื่ออาจารย์ : </td>
                                    <td><?php echo $teacher_name ?></td>
                                </tr>
                                <tr>
                                    <td>นามสกุล :</td>
                                    <td><?php echo $teacher_lastname ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทร :</td>
                                    <td><?php echo $phone ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>