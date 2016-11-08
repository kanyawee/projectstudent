<div class="content-wrapper">
    <?php if ($function != 0) { ?>
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1 class="page-header">
                        เมนูหลัก
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title ">กรุณาเลือกเมนู</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 " >
                                <div class="row"><br>
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('teacher/approve_establish'); ?>">
                                            <div class="panel panel-primary aligncenter">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>อนุมัติสถานประกอบการ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>        
                                                <div class="panel-footer">
                                                    <span class="pull-left"></span>
                                                </div>       
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('index.php/teacher/document') ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>กำหนดการส่งเอกสาร</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('index.php/teacher/showdatateacher') ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>เพิ่มข้อมูลอาจารย์นิเทศ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>            

                                    <div id="document"class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('teacher/get_orientation'); ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>กำหนดตารางนิเทศ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                    <div class="clearfix"></div>
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('assessment/showassessment') ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>ประเมินนักศึกษา</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>            

                                    <div id="document"class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('assessment/showassessment_establish'); ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>ประเมินสถานประกอบการ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                    <div class="clearfix"></div>
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('teacher/showall'); ?> ">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>จัดการข้อมูลนักศึกษา</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>            

                                    <div id="document"class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('index.php/teacher/dataestablishall'); ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-pencil fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>จัดการข้อมูลสถานประกอบการ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                    <div class="clearfix"></div>
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1 class="page-header">
                        เมนูหลัก
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title ">กรุณาเลือกเมนู</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 " >
                                <div class="row"><br>
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('teacher/show_advisors'); ?>">
                                            <div class="panel panel-primary aligncenter">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-file-text fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>รายชื่อนักศึกษา</h4></div>
                                                        </div>
                                                    </div>
                                                </div>        
                                                <div class="panel-footer">
                                                    <span class="pull-left"></span>
                                                </div>       
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('teacher/showorientation'); ?>">
                                            <div class="panel panel-primary aligncenter">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-file-text fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>รายงานตารางนิเทศ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>        
                                                <div class="panel-footer">
                                                    <span class="pull-left"></span>
                                                </div>       
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('teacher/getdatadocument') ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-file-text fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>ดูเอกสารนักศึกษา</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>            

                                    <div id="document"class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('assessment/showassessment') ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-file-text fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>ประเมินนักศึกษา</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <a href="<?php echo base_url('assessment/showassessment_establish'); ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-file-text fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>ประเมินสถานประกอบการ</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                    <div class="clearfix"></div>
                                                </div>                            
                                            </div>
                                        </a>
                                    </div> 
                                    <div id="document"class="col-lg-4 col-md-3">
                                        <a href="<?php echo base_url('teacher/getformreset_password') ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-file-text fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left">
                                                            <div><h4>เปลี่ยนรหัสผ่าน</h4></div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                                <div class="panel-footer">
                                                </div>                            
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>









