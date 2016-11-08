<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ข้อมูลนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <?php echo anchor('student/home', 'หน้าหลัก'); ?> 
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงข้อมูลนักศึกษา
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลนักศึกษาทั้งหมด</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <?php
                                echo"                        
                        <td align='center'>รหัสนักศึกษา</td>
                        <td align='center'>ชื่อ-นามสกุล</td>                   
                        <td align='center'>สาขาวิชา</td> 
                        <td align='center'>ชื่อสถานประกอบการณ์</td>
                        <td align='center' cols='3'>สถานะ</td>
                        </tr>";

                                foreach ($query as $row) {
                                    $id_st = $row['id_st'];
                                    $name_st = $row['name_st'];
                                    $lastname_st = $row['lastname_st'];
                                    $major = $row['major'];
                                    $name_es = $row['name_es'];
                                    $link = anchor('teacher/detailstudent/' . $id_st, "$name_es");

                                    echo "<tr>
                        <td>$id_st</td>
                        <td>$name_st.$lastname_st</td>
                        <td>$major</td>
                        <td>$link</td>
                        <td>$status</td>
                                </tr>";
                                    echo"</tabe>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
