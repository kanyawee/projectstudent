<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการข้อมูลสถานประกอบการ
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
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <center><h3 class="panel-title" >ข้อมูลรายละเอียดสถานประกอบการ</h3></center>
                    </div>
                    <?php
                    $establish = $establish[0];
                    $id_es = $establish['id_es'];
                    $name_es = $establish['name_es'];
                    $address_es = $establish['address_es'];
                    $tell_es = $establish['tell_es'];
                    $email = $establish['email'];
                    $website = $establish['website'];
                    $peple = $establish['peple'];
                    $person_contect = $establish['person_contect'];
                    $position=$establish['position'];
                    ?>     

                    <div class="panel-body"> 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-info" colspan="2">ข้อมูลสถานประกอบการณ์</th>
                                </tr>
                                <tr>
                                    <th width = "30%">ข้อมูล</th>
                                    <th>รายละเอียดนักศึกษา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ชื่อสถานประกอบการณ์ : </td>
                                    <td><?php echo $name_es ?></td>
                                </tr>
                                <tr>
                                    <td>ที่อยู่ :</td>
                                    <td><?php echo $address_es ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทร :</td>
                                    <td><?php echo $tell_es ?></td>
                                </tr>
                                <tr>
                                    <td>เว็บไซต์ :</td>
                                    <td><?php echo $website ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><?php echo $email ?></td>
                                </tr>
                                <tr>
                                    <td>ชื่อผู้ติดต่อ :</td>
                                    <td><?php echo $person_contect ?></td>
                                </tr>
                                <tr>
                                    <td>ตำแหน่ง :</td>
                                    <td><?php echo $position ?></td>
                                </tr>
                                <tr>
                                    <td>จำนวนบุคลากร :</td>
                                    <td><?php echo $peple ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
