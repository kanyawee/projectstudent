<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ระบบจัดการข้อมูล <small>การฝึกประสบการณ์วิชาชีพ</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i><a href="<?php echo base_url('indax.php/teacher/menu'); ?>">เมนูหลัก</a> 
                    </li>
                    <li class="active">
                        <i class="fa-anchor"></i><a href="<?php echo base_url('index.php/teacher/dataestablishall'); ?>">แสดงข้อมูลทั้งสถานประกอบการ</a>
                    </li>
                    <li class="active">
                        <i class="fa-archive"></i>รายละเอียดสถานประกอบการ
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลรายละเอียดสถานประกอบการ</h3>
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
                    ?>     
                    <div class="panel-body"> 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">ข้อมูลสถานประกอบการณ์</th>
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
