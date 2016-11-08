<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการข้อมูลอาจารย์นิเทศ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แก้ไขข้อมูลอาจารย์นิเทศ
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $teacher = $teacher[0];
        $teacher_id = $teacher['teacher_id'];
        $teacher_name = $teacher['teacher_name'];
        $teacher_lastname = $teacher['teacher_lastname'];
        $phone = $teacher['phone'];
        $password = $teacher['password'];
        ?>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title ">แก้ไขข้อมูลอาจารย์นิเทศ</h3>
                    </div>
                    <div class="panel-body"> 
                        <form action="<?php echo base_url('index.php/teacher/update_teacher'); ?>" method="post">
                            <div class="col-md-6 col-md-offset-3 ">
                                <div class="form-group ">
                                    <label for="cname" class="">ลำดับที่ : <span class="required"></span></label>
                                    <input class="form-control" name="teacher_id" id="teacher_id"  type="text" readonly="" value="<?php echo $teacher_id ?>"/>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="">ชื่อ : <span class="required"></span></label>
                                    <input class="form-control" name="teacher_name" id="teacher_name"  type="text"   value="<?php echo $teacher_name ?>"/>
                                </div>
                                <div class="form-group ">
                                    <label for="clastname" class="">นามสกุล : <span class="required"></span></label>
                                    <input class="form-control" name="teacher_lastname" id="teacher_lastname"  type="text" value="<?php echo $teacher_lastname ?>" />
                                </div>
                                <div class="form-group ">
                                    <label for="clastname" class="">เบอร์โทร : <span class="required"></span></label>
                                    <input class="form-control" name="phone" id="phone"  type="text" value="<?php echo $phone ?>" />
                                </div>

                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <button class="btn btn-primary" type="submit" name="submit">บันทึกข้อมูล</button>
                                <button class="btn btn-default" type="reset" name="reset">ยกเลิก</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
