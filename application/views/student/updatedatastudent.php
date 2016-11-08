
<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header" style="color:#000">
                    ข้อมูลส่วนตัวนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('index.php/student/menu'); ?> ">หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <a href="<?php echo base_url('index.php/student/datastudent'); ?> ">ข้อมูลนักศึกษา</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> แก้ไขข้อมูลนักศึกษา
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">แก้ไขข้อมูลรายละเอียดนักศึกษา</h3>
                    </div>
                    <div class="panel-body"> 
                        <form id="form1" name="form1" method="post" action="<?php echo base_url() . 'index.php/student/update' ?>">
                            <table class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="2" class="bg-info">แก้ไขข้อมูลทั่วไปของนักศึกษา</th>
                                    </tr>
                                    <tr >
                                        <th width = "30%">ข้อมูล</th>
                                        <th>รายละเอียดนักศึกษา</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>ชื่อนักศึกษา :</td>
                                        <td><input class="form-control" type="text" name="name_st" id="name_st" value="<?php echo $student->name_st; ?>" /></td>                                             
                                    </tr>
                                    <tr>
                                        <td>นามสกุล :</td>
                                        <td><input class="form-control"ype="text" name="lastname_st" id="lastname_st" value="<?php echo $student->lastname_st; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td>รหัสนักศึกษา :</td>
                                        <td><input class="form-control" type="text" name="id_st" id="id_st" value="<?php echo $student->id_st; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>สาขาวิชา :</td>
                                        <td><select class="form-control" name="major" id="major" value="<?php echo $student->major; ?>">
                                                <option <?php
                                                if ($student->major == "วิทยาการคอมพิวเตอร์") {
                                                    echo"selected";
                                                }
                                                ?>>วิทยาการคอมพิวเตอร์</option>
                                                <option <?php
                                                if ($student->major == "เทคโนโลยีสารสนเทศ") {
                                                    echo"selected";
                                                }
                                                ?>>เทคโนโลยีสารสนเทศ</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>เบอร์โทรศัพท์ :</td>
                                        <td><input class="form-control" type="text" name="tell_st" id="tell_st" value="<?php echo $student->tell_st; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail :</td>
                                        <td><input class="form-control" type="text" name="email" id="email" value="<?php echo $student->email; ?>" /></td>
                                    </tr>
                                </tbody>
                                <thead class="bg-info">
                                    <tr>
                                        <th colspan="2">ชื่อที่อยู่ผู้ที่สามารถติดต่อได้ในกรณีฉุกเฉิน</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ชื่อ :</td>
                                        <td><input class="form-control" type="text" name="name_pr" id="name_pr" value="<?php echo $student->name_pr; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>เกี่ยวข้องเป็น :</td>
                                        <td><input class="form-control" type="text" name="relation" id="relation" value="<?php echo $student->relation; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>เบอร์โทรศัพท์ :</td>
                                        <td><input class="form-control" type="text" name="tell_pr" id="tell_pr" value="<?php echo $student->tell_pr; ?>"></td>
                                </tbody>
                            </table>
                            <div class="col-md-4 col-md-offset-4 ">
                                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                <button class="btn btn-default" type="reset">ยกเลิก</button>
                            </div>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <h1 class="page-header"> </h1>
    </div>
</div>
