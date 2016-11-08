<link rel="stylesheet" href="<?php echo base_url() . 'assets/recoverpass/css/reset.css'; ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'assets/recoverpass/css/style.css'; ?>">
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    รีเช็ตรหัสผ่าน
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> รีเช็ตรหัสผ่าน
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title ">รีเช็ตรหัสผ่าน</h3>
                    </div>
                    <div class="panel-body"> 

                        <div class="module form-module">
                            <div>

                            </div>
                            <div class="form">
                                <h2 class="text-center">กรุณาใส่ Username </h2><br>
                                <label>กรุณากรอกชื่อผู้ใช้ที่ต้องการรีเซ็ตรหัสผ่าน</label><br><br>
                                <form id="formresetpass" action="" method="post">
                                    <input type="text" name="username" id="username"placeholder="Username" required/>
                                    <!--<input type="text" name="email" id="email" placeholder="Email" required/>-->
                                </form>
                                <button type="button" onclick="seddata()">ส่งข้อมูล</button><br><br>
                                
                                <div id="newpass" class="text-center"></div><br>
                                <div class="text-center">
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='<?php echo base_url() . 'assets/js/jquery.min.js'; ?>'></script>
    <!--<script src='<?php echo base_url() . 'assets/recoverpass/js/vLmRVp.js'; ?>'></script>-->
<script src="<?php echo base_url() . 'assets/recoverpass/js/index.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script type="text/javascript">
                                                                    function seddata() {
                                                                        console.log($("#formresetpass").serialize());
                                                                        $.ajax({
                                                                            url: "<?php echo base_url('teacher/chackreset'); ?>",
                                                                            type: "POST",
                                                                            data: $("#formresetpass").serialize(),
                                                                            //        dataType:"json",
                                                                            success: function (data) {
                                                                                $('#newpass').html(data);
//                                                    alert("คุณกำลังทำการเปลี่ยนรหัสผ่าน");
//                                                                                var obj = jQuery.parseJSON(data);
////                                                    data = jQuery.parseJSON(data)
////                                                                                password = obj.password;
//                                                                                if (obj != null) {
//                                                                                    $("#newpass").html(obj);
//                                                                                }
//                                                    alert(password);
                                                                                console.log(data);
                                                                            }, error: function (er) {
//                                                                                alert('มีข้อผิดพลาดกรุณาลองใหม่ค่ะ' + er);
                                                                            }
                                                                        });
                                                                    }
</script>
