<body class="skin-blue layout-top-nav">
        <header class="main-header">               
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?php echo base_url('home/home'); ?>" class="navbar-brand"><b>CS-</b>IT</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo base_url('home/showrelation'); ?>">ข้อมูลนักศึกษา <span class="sr-only">(current)</span></a></li>
                            <li class="active"><a href="<?php echo base_url('establishment/showallestablish'); ?>">ข้อมูลสถานประกอบการ <span class="sr-only">(current)</span></a></li>
                            <li class="active"><a href="<?php echo base_url('home/addform'); ?>">ลงทะเบียนนักศึกษา <span class="sr-only">(current)</span></a></li>
                            <li><a href="<?php echo base_url('login/Login')?>">เข้าใช้ระบบ</a></li>
                        </ul>
                                                 
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>