<?php echo css_asset('login.css'); ?>
<body>
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <?php echo form_open('student/login_system'); ?>
        <h1>เข้าระบบสำหรับนักศึกษา</h1>
        <div class="inset">
            <p>
                <label for="id_st">รหัสนักศึกษา</label>
            <div class="controls">
                <div class="input-icon left">
                    <input type="text" name="id_st" id="id_st"> 
                </div>
            </div>
            </p>
            <p>
                <label for="password">รหัสผ่าน</label>
            <div class="controls">
                <input type="password" name="password" id="password">
            </div>
            </p>
        </div>
        <p class="p-container">
            <span>Forgot password ?</span>
            <input type="submit" name="submit" id="submit" value="เข้าระบบ">
        </p>

        <?php echo form_close(); ?>
    </div>
    <div class="col-lg-12">
        <h1 class="page-header"></h1></div>
        <?php echo js_asset('jquery.js'); ?>
    <!-- Bootstrap Core JavaScript -->
    <?php echo js_asset('bootstrap.min.js'); ?>
