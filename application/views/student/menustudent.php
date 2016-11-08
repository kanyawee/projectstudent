
<?php echo css_asset('bootstrap.min.css'); ?>
<!-- Custom Fonts -->
<?php echo css_asset('font-awesome.min.css'); ?>
<body>
    <!-- Page Heading -->
    <div class="content-wrapper">
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header" style="color: #000;">
                    ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ
                </h1>
                <ol class="breadcrumb">
                    <a href="<?php echo base_url('index.php/student/menu') ?>">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> เมนูหลัก
                        </li>
                    </a>
                </ol>
            </div>
        </div>

        <!-- /.row -->
        <div class="col-lg-12 " >
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <a href="<?php echo base_url('index.php/student/datastudent') ?>">
                        <div class="panel panel-primary aligncenter">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-pencil fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-left">
                                        <div><h4>ข้อมูลส่วนตัวนักศึกษา</h4></div>
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
                    <a href="<?php echo base_url('index.php/student/selectestablish') ?>">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-left">
                                        <div><h4>เลือกสถานประกอบการณ์</h4></div>
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
                    <a href="<?php echo base_url('index.php/establishment/addformes') ?>">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-google fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-left">
                                        <div><h4>ขอเพิ่มสถานประกอบการณ์ใหม่</h4></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="panel-footer">
                            </div>                            
                        </div>
                    </a>
                </div>            

                <div id="document"class="col-lg-4 col-md-3">
                    <?php
                    if ($this->db->where('status', 1)->get('control_status')->num_rows() > 0) {
                        ?><a href="<?php echo base_url('index.php/document/menudocument'); ?>"><?php } else { ?>
                            <a href="#" onclick="alert('ยังไม่เปิดให้ส่งเอกสารค่ะ')">
                            <?php } ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-left">
                                            <div><h4>ส่งเอกสาร</h4></div>
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
</body>
<?php echo js_asset('jquery.js'); ?>
<!-- Bootstrap Core JavaScript -->
<?php echo js_asset('bootstrap.min.js'); ?>

