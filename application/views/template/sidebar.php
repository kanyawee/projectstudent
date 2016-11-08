<aside class="main-sidebar">
    <?php
    $user = $this->session->userdata('user');
//    extract($user);
    ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php if (empty($user) != NULL) { ?>
            <div id="user" hidden="true"></div>
        <?php } else { ?><div class="user-panel" id="user">
                <div class="pull-left image">
                    <?php if ($user['file_name'] == NULL) { ?>
                        <img src = "<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class = "img-circle" alt = "User Image"/>
                    <?php } else { ?>
                    <img src="<?php echo base_url('uploads/') . '/' . $user['file_name']; ?>" class="img-circle" alt="User Image" />
                    <?php } ?>

                </div>
                <div class="pull-left info">
                    <p><?php echo $user['name_st'] ?> &nbsp;&nbsp; <?php echo $user['lastname_st'] ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div><?php } ?>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo base_url('student/datastudent') ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>ข้อมูลส่วนตัวนักศึกษา</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>  
            <li class="treeview">
                <a href="<?php echo base_url('establishment/selectestablish') ?>">
                    <i class="fa fa-laptop"></i>
                    <span>เลือกสถานประกอบการ</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>


            <li class="treeview">
                <a href="<?php echo base_url('establishment/addformes') ?>">
                    <i class="fa fa-edit"></i> <span>เพิ่มสถานประกอบการใหม่</span>
                </a>
            </li>

            <li class="treeview">
                <?php
                if ($this->db->where('status', 1)->get('control_status')->num_rows() > 0) {
                    ?><a href="<?php echo base_url('document/menudocument'); ?>"><?php } else { ?>
                        <a href="#" onclick="loadmodal()">
                        <?php } ?>
                        <i class="fa fa-table"></i> <span>ส่งเอกสารฝึกงาน</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('student/formchangpassword') ?>">
                    <i class="fa fa-laptop"></i>
                    <span>เปลี่ยนรหัสผ่าน</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

        </ul></section>
    <!-- /.sidebar -->
</aside>
<div id="dataConfirmModal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">สถานะการส่งเอกสาร</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ยังไม่เปิดให้ส่งเอกสาร</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal" id="dataConfirmOK">ตกลง</button>
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function loadmodal() {
        $('#dataConfirmModal').modal({show: true});
//        alert("ยังไม่เปิดให้ส่งเอกสารค่ะ");
//        $('#modal').modal();
    }
</script>