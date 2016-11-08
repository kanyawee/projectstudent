<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header" style="color:#000">
                    ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <h4> ข้อมูลนักศึกษา</h4>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลรายละเอียดนักศึกษา</h3>
                    </div>

                    <?php
                    $student = $student['0'];
                    $id_st = $student['id_st'];
                    $name_st = $student['name_st'];
                    $lastname_st = $student['lastname_st'];
                    $tell_st = $student['tell_st'];
                    $email = $student['email'];
                    $major = $student['major'];
                    $name_pr = $student['name_pr'];
                    $relation = $student['relation'];
                    $tell_pr = $student['tell_pr'];
                    ?>     
                    <div class="panel-body"> 
                        <table class="table table-bordered">
                            <thead >
                                <tr>
                                    <th colspan="2" class="bg-info">ข้อมูลทั่วไปของนักศึกษา</th>
                                </tr>
                                <tr >
                                    <th width = "30%">ข้อมูล</th>
                                    <th>รายละเอียดนักศึกษา</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>ชื่อนักศึกษา :</td>
                                    <td><?php echo $name_st ?></td>                                             
                                </tr>
                                <tr>
                                    <td>นามสกุล :</td>
                                    <td><?php echo $lastname_st ?></td>
                                </tr>
                                <tr>
                                    <td>รหัสนักศึกษา :</td>
                                    <td><?php echo $id_st ?></td>
                                </tr>
                                <tr>
                                    <td>สาขาวิชา :</td>
                                    <td><?php echo $major ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทรศัพท์ :</td>
                                    <td><?php echo $tell_st ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail :</td>
                                    <td><?php echo $email ?></td>
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
                                    <td><?php echo $name_pr ?></td>
                                </tr>
                                <tr>
                                    <td>เกี่ยวข้องเป็น :</td>
                                    <td><?php echo $relation ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทรศัพท์ :</td>
                                    <td><?php echo $tell_pr ?></td>
                            </tbody>
                        </table>                       
                    </div>
                </div>
            </div>
        </div>
        <h1 class="page-header"> </h1>
    </div>
</div>
