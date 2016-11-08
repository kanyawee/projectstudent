<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <nav class="navbar navbar-default" role="navigation">
                    <h1> <center>:รายละเอียดข้อมูลนักศึกษา:</center></h1>	
                </nav>
            </div> 
        </div>
    </div>
    <?php
    //print_r($student);
    echo"<table border='0' align ='center'>";

    echo "<tr width='50%'><td>รหัสนักศึกษา</td>
                        <td>ชื่อนักศึกษา</td>
                        <td>นามสกุล</td>
                        <td>เบอร์โทรศัพท์</td>
                        <td>ชื่อสถานประกอบการณ์</td>
                        <td>ปีการศึกษา</td>
                    </tr>";

    foreach ($student as $row) {
        $id_st = $row['id_st'];
        $name_st = $row['name_st'];
        $lastname_st = $row['lastname_st'];
        $tell_st = $row['tell_st'];
        $establish = $row['name_es'];
        $year = $row['year'];

        echo "
                    <tr>
                       <td> $id_st</td>
                       <td> $name_st</td>
                       <td> $lastname_st</td>
                       <td> $tell_st</td>
                       <td> $establish</td> 
                       <td>$year</td>
                    </tr>";
    }
    echo "</table>";
    ?>  
</form>
