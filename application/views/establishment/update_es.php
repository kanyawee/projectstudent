<div class="content-wrapper">
    <div class="container">
        <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" >
                        <h1 class="page-header">
                            ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('index.php/student/menu'); ?>">หน้าหลัก</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> แก้ไขสถานประกอบการ
                            </li>
                        </ol>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-10  col-lg-offset-1" >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><center>แก้ไขข้อมูลสถานประกอบการ</center></h3>
                            </div>
                            <div class="panel-body"> 
                                <form id="form1" name="form1" method="post" action="<?php echo base_url() . 'index.php/establishment/update' ?>">
                                    <div class="form-group">
                                        <label>ลำดับที่:</label>
                                        <input type="text" class="form-control" name="id_es" id="id_es"  value="<?php echo $establish['id_es']; ?>" readonly/>
                                    </div>


                                    <div class="form-group">
                                        <label>ชื่อสถานประกอบการณ์ :</label>
                                        <input class="form-control" name="name_es" id="name_es" value="<?php echo $establish['name_es']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>ที่อยู่ :</label>
                                        <input class="form-control"   name="address_es" id="address_es" value="<?php echo $establish['address_es']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>เว็บไซต์ :</label>
                                        <input class="form-control"  name="website" id="website"value="<?php echo $establish['website']; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail :</label>
                                        <input class="form-control"  name="email" id="email"value="<?php echo $establish['email']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>เบอร์โทร :</label>
                                        <input class="form-control" name="tell_es"value="<?php echo $establish['tell_es']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>จำนวนบุคลากร : </label>
                                        <input class="form-control" name="peple" value="<?php echo $establish['peple']; ?>"/>
                                    </div>
                                    <div class="col-md-4  col-lg-offset-4">
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
</div>
