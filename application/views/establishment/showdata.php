<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>showdata</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/myChoiceStyle.css">
    </head>
    <body>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <nav class="navbar navbar-default" role="navigation">
                        <center><h1> แสดงข้อมูลของสถานประกอบการณ์</h1></center>	
                </div>
                <div class="row-buffer30"></div>
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <div class="row clearfix">
                            <div id="tabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="activeSessions">
                                    <div class="container">
                                        <p>ข้อมูลสถานประกอบการณ์ที่นักศึกษาเคยได้เข้ารับการฝึกประสบการณ์วิชาชีพ:</p>
                                        <div class="table-responsive table-half">

                                            <?php
                                            echo"<table><table border='1' align ='center'>
                    <tr bgcolor='#0CF'>
                        
                        <td align='center'>ลำดับที่</td>
                        <td align='center'>ชื่อ</td>
                        <td align='center'>ที่ตั้งสถานประกอบการณ์</td>
                        <td align='center'>ตำแหน่งงานที่ได้รับมอบหมาย</td>
                        <td align='center'>จำนวนบุคลากร </td>
                        <td align='center'>เบอร์โทรศัพท์</td> 
                        <td align='center'>E-mail</td>
                        <td align='center'>แก้ไข</td>
                        <td align='center'>ลบ</td>
                                      
                        
                    </tr>";

                                            foreach ($query as $row) {
                                                $id_es = $row['id_es'];
                                                $name_es = $row['name_es'];
                                                $address_es = $row['address_es'];
                                                $position = $row['position'];
                                                $peple = $row['peple'];
                                                $tell_es = $row['tell_es'];
                                                $email = $row['email'];

                                                $update = anchor('establishment/update/' . $id_es, 'แก้ไข');

                                                $attributs = "onclick= \"return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')\" ";
                                                $delete = anchor('establishment/deletement/' . $id_es, 'ลบ', $attributs);
                                                echo "<tr>
                        <td>$id_es</td>
                        <td>$name_es</td>
                        <td>$address_es</td>
                        <td>$position</td> 
                        <td>$peple</td> 
                        <td>$tell_es</td> 
                        <td>$email</td> 
                        <td>$update</td>
                        <td>$delete</td>
                    </tr>";
                                                echo"</tabe>";
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="footer">
                <hr>
                <div class="container">
                    <a class="text-muted" href="impressum.html ">uttaradit univercity</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
    <script src="js/libs/jquery-1.10.2.js"></script>
    <!-- Bootstrap JS file -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/libs/handlebars-1.1.2.js"></script>
    <script src="js/libs/ember-1.5.0.js"></script>
    <script src="js/app.js"></script>
    <!-- to activate the test runner, add the "?test" query string parameter -->
    <script src="tests/runner.js"></script>
</html>