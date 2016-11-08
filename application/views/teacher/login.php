<head>
    <meta charset="UTF-8">
    <title>เช้าระบบ</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>">
    <link rel='stylesheet prefetch' href='<?php echo base_url('assets/css/font.css'); ?>'>
    <link rel='stylesheet prefetch' href='<?php echo base_url('assets/css/font-awesome.min.css'); ?>'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body class="skin-blue layout-top-nav">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper-login">
        <section class="content">
            <div class="row">
                <div class="col-md-4  col-lg-offset-4" >
                    <div class="form-container">
                        <div style="width: 360px;" class="form style-1">
                            <header class="header" style="color: black; size: 30%; ">
                                <b>ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ</b>
                            </header>
                            <form class="active" id = "teacher" action="<?php echo base_url('login/login_system_teacher'); ?>" method="post">
                                <h1 id="teacher_login">เข้าระบบ</h1><br>
                                <p1>
                                    <?php if ($message <> null) echo $message; ?>
                                </p1>
                                <div class="form-group">
                                    <input type="text" id="username" name="username"placeholder="Username" required="required"/>
                                    <label for="username">Username</label>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" placeholder="Password" required="required"/>
                                    <label for="password">Password</label>
                                    <div class="line"></div>
                                </div>
                                <button class="button">Login</button>
                            </form>
                            <div class="text-right">
                                <a href="<?php echo base_url('home/addform'); ?>">ลงทะเบียน</a> &nbsp;||&nbsp;<a href="<?php echo base_url('home/home'); ?>">หน้าหลัก</a>
                            </div>               
                        </div>
                    </div>
                </div>                            
                <!-- /.row -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <script src='<?php echo base_url('assets/js/jquery.min.js'); ?>'></script>
    <script src='<?php echo base_url('assets/js/bootstrap.min.js'); ?>'></script>
    <script src='<?php echo base_url('assets/js/index.js'); ?>'></script>

</body>
</html>