<?php
//    $menu = {
//        'name' 
//    }
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">กรุณาเลือกเมนู</li>
            <?php
            if ($function == 1) {
                ?>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/home'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>หน้าหลัก</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/setting_year'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>กำหนดปีการศึกษาและภาคเรียน</span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/resetpassword'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>รีเซ็ตรหัสผ่าน</span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/approve_establish'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>อนุมัติสถานประกอบการ</span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/document'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>กำหนดการส่งเอกสาร</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/getdatadocument'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>ดูเอกสารนักศึกษา</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/showdatateacher'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>เพิ่มข้อมูลอาจารย์นิเทศ</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/advisors_teacher'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>กำหนดอาจารย์ที่ปรึกษา</span>
                    </a>
                </li> 
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/get_orientation'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>กำหนดตารางนิเทศ</span>
                    </a>
                </li> 
                <li class="treeview <?php if(isset($subactive)&&($subactive==1||$subactive==2)) echo 'active'; ?>">
                    <a href="#">
                        <i class="fa fa-angle-right"></i> <span>รายงานตารางนิเทศ</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php if(isset($subactive)&&$subactive==1) echo 'class="active"'; ?>><a href="<?php echo base_url('teacher/showorientation'); ?>"><i class="fa fa-circle-o"></i> ตารางนิเทศ</a></li>
                        <li <?php if(isset($subactive)&&$subactive==2) echo 'class="active"'; ?>><a href="<?php echo base_url('teacher/previous_orientation'); ?>"><i class="fa fa-circle-o"></i> ตารางนิเทศย้อนหลัง</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('assessment/showassessment'); ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>ประเมินนักศึกษา</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?php echo base_url('assessment/showassessment_establish') ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>ประเมินสถานประกอบการ</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?php echo base_url('teacher/showall'); ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>จัดการข้อมูลนักศึกษา</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/dataestablishall'); ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>จัดการข้อมูลสถานประกอบการ</span>
                    </a>
                </li>
            <?php } else {
                ?>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/home'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>หน้าหลัก</span>
                    </a>
                </li>
                <li class = "treeview">
                    <a href="<?php echo base_url('teacher/show_advisors'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>รายชื่อนักศึกษา</span>
                    </a>
                </li>
                <li class = "treeview">
                    <a href="<?php echo base_url('teacher/showorientation'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>รายงานตารางนิเทศ</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/getdatadocument'); ?>">
                        <i class="fa fa-angle-right pull-left"></i>
                        <span>ดูเอกสารนักศึกษา</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('assessment/showassessment'); ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>ประเมินนักศึกษา</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?php echo base_url('assessment/showassessment_establish') ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>ประเมินสถานประกอบการ</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('teacher/getformreset_password') ?>">
                        <i class="fa fa-angle-right pull-left"></i> <span>เปลี่ยนรหัสผ่าน</span>
                    </a>
                </li>
            <?php } ?>

        </ul></section>
    <!-- /.sidebar -->
</aside>
