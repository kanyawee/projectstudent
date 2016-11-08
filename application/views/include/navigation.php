<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url('teacher/home'); ?>" class="logo">
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg" ><img alt="logo" style="width:35%; height: 35%;" src="<?php echo base_url('assets/img/uttaditt.gif'); ?>"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <span class="a1"><b>ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ</b></span><br>
                <span class="a2"><b>Management Training System of Professional Experience</b></span>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu"></li>
                        <li class="dropdown user user-menu">

                            <a><i class="fa fa-user">
                                    <?php echo $teacher_name; ?> &nbsp;&nbsp;<?php echo $teacher_lastname ?></i></a>
                        <li class="dropdown user user-menu">
                            <a href="<?php echo base_url('/login/logout') ?>">ออกจากระบบ</a>
                        </li>
                    </ul>   
                </div>

                <!--                <div class="navbar-custom-menu">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown notifications-menu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <span><?php echo $teacher_name ?> &nbsp;&nbsp;<?php echo $teacher_lastname; ?></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="header"><?php
                if ($function != 1) {
                    echo "อาจารย์นิเทศ";
                } else {
                    echo "ผู้ดูแลระบบ";
                }
                ?>
                                                </li>
                                                <li>
                                                     inner menu: contains the actual data 
                                                    <ul class="menu">
                                                        <li>
                                                            <a href="<?php echo base_url('/login/logout') ?>">
                                                                <i class="fa fa-users text-aqua"></i> ออกจากระบบ
                                                            </a>
                                                        </li>
                
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>-->
            </nav>
        </header>