<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap 3.3.4 -->
        <link href="http://localhost/projectstudent/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="http://localhost/projectstudent/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://localhost/projectstudent/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="http://localhost/projectstudent/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="http://localhost/projectstudent/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="skin-blue layout-top-nav">
        <div class="wrapper">
            <header class="main-header">               
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">

                                <?php
                                $id_st = $user['id_st'];
                                $name_st = $user['name_st'];
                                $lastname_st = $user['lastname_st'];
                                ?>
                                <!-- User Account: style can be found in dropdown.less -->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image"/>
                                        <span class="hidden-xs"><?php echo $name_st ?> &nbsp;&nbsp; <?php echo $lastname_st ?></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image" />
                                            <p>

                                                <small><?php
                                                    echo $id_st;
                                                    echo "</br>";
                                                    echo $name_st;
                                                    echo $lastname_st;
                                                    ?></small>
                                            </p>
                                        </li>

                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo base_url('/index.php/student/menu') ?>" class="btn btn-default btn-flat">เมนูหลัก</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo base_url('index.php/student/logout') ?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Control Sidebar Toggle Button -->

                            </ul>
                        </div><!-- /.navbar-custom-menu -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>