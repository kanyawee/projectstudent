<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการข้อมูลอาจารย์นิเทศ
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i><a href="<?php echo base_url('index.php/teacher/menu'); ?>"> เมนูหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <a href="<?php echo base_url('index.php/teacher/dataestablishall'); ?>">ข้อมูลสถานประกอบการทั้งหมด</a>
                    </li>
                    <li class="active">
                        <a><i class="fa-archive"></i>แก้ไขข้อมูลสถานประกอบการ</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">แก้ไขข้อมูลสถานประกอบการ</h3>
                    </div>
                    <div class="panel-body"> 
                        <form id="Form1" method="post" class="form-horizontal" action="<?php echo base_url('teacher/update_establish');?>">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="id_es">รหัส :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="id_es" name="id_es" value="<?php echo $establish['id_es']; ?>" readonly=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name_es">ชื่อสถานประกอบการ :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name_es" name="name_es" value="<?php echo $establish['name_es']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="address_es">ที่อยู่สถานประกอบการ :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="address_es" name="address_es" value="<?php echo $establish['address_es']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="website">เว็บไซต์ :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="website" name="website" value="<?php echo $establish['website']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="email">อีเมล์ :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $establish['email']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="tell_es">เบอร์โทรศัพท์ :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tell_es" name="tell_es" value="<?php echo $establish['tell_es']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="peple">จำนวนบุคลากร :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="peple" name="peple" value="<?php echo $establish['peple']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="person_contect">ชื่อผู้ติดต่อ :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name_contacts" name="person_contect" value="<?php echo $establish['person_contect']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="position">ตำแหน่ง :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="position" name="position" value="<?php echo $establish['position']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4"><br>
                                    <button type="submit" class="btn btn-primary" >บันทึกข้อมูล</button>
                                    <button type="reset" class="btn btn-default">ยกเลิก</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
