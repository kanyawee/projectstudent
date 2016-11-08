<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a class="logo">
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg" ><img alt="logo" style="width:35%; height: 35%;" src="<?php echo base_url('assets/img/uttaditt.gif'); ?>"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <span class="a1"><b>ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ</b></span><br>
                <span class="a2"><b>Management Training System of Professional Experience</b></span>
                <!-- Navbar Right Menu -->

                <div class="navbar-custom-menu">
                   <?php extract($this->session->userdata());  ?>
                        <ul class = "nav navbar-nav">
                            <!--User Account: style can be found in dropdown.less -->
                            <li class = "dropdown user user-menu">
                                <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                                    <?php if ($file_name != null) { ?>
                                        <img id="picter1" src = "<?php echo base_url('uploads').'/'.$file_name;?>" class = "user-image" alt = "User Image"/>
                                        <span class = "hidden-xs"><?php echo $name_st
                                        ?> &nbsp;&nbsp; <?php echo $lastname_st ?></span>
                                    <?php } else { ?>
                                        <img src = "<?php echo base_url('assets/dist/img/user2-160x160.jpg');?><?php echo $file_name ?>" class = "user-image" alt = "User Image"/>
                                        <span class = "hidden-xs"><?php echo $name_st
                                        ?> &nbsp;&nbsp; <?php echo $lastname_st ?></span>
                                    <?php } ?>

                                </a>

                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if ($file_name == NULL) { ?>
                                            <img src = "<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class = "user-image" alt = "User Image"/>
                                            <p>
                                                <small><?php
                                                    echo $id_st;
                                                    echo "</br>";
                                                    echo $name_st;
                                                    ?>&nbsp;&nbsp; &nbsp;&nbsp; 
                                                    <?php echo $lastname_st;
                                                    ?></small>
                                            </p>
                                        <?php } else { ?>
                                            <img src = "<?php echo base_url('uploads/').'/'.$file_name; ?>" class = "img-circle" alt = "User Image" />
                                            <p>
                                                <small><?php
                                                    echo $id_st;
                                                    echo "</br>";
                                                    echo $name_st;
                                                    ?>&nbsp;&nbsp; &nbsp;&nbsp; 
                                                    <?php echo $lastname_st;
                                                    ?></small>
                                            </p>
                                        <?php } ?>

                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url('/student/datastudent') ?>" class="btn btn-default btn-flat">ข้อมูลนักศึกษา</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('/login/logout') ?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    <?php // } ?>                     
                </div>                 

            </nav>
        </header>
