<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    สถานประกอบการณ์
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <?php echo anchor('student/home', 'หน้าหลัก'); ?> 
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงข้อมูลสถานประกอบการณ์
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>ข้อมูลสถานประกอบการณ์</h2>
                <div class="table-responsive">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <?php
                            echo"
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>       <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
