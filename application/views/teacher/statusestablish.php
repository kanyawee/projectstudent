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
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
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
                        <td align='center'>เบอร์โทร</td>
                        <td align='center'>สาขาวิชา</td>
                        <td align='center'>ชื่อบริษัท</td>
                        <td aling='center' conls='2'>สถานะ</td>
                    </tr>";

                                foreach ($query as $row) {
                                $id_st = $row['id_st'];
                                $name_st = $row['name_st'];
                                $lastname_st = $row['lastname_st'];
                                $tell_st = $row['tell_st'];
                                $email = $row['email'];
                                $major = $row['major'];


                                $link = anchor('teacher/detailstudent/' . $id_es, "$name_es");
                                $update = anchor('student/formupdate/' . $id_st, '<button  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>');

                                $attributs = "onclick= \"return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')\" ";
                                $delete = anchor('student/delete/' . $id_st, '<button  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>', $attributs);

                                echo "<tr>
                        <td>$id_st</td>
                        <td>$name_st</td>
                        <td>$lastname_st</td>
                        <td>$tell_st</td>
                        <td>$major</td>
                        <td>$link</td> 
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
            </div>
        </div>
    </div>
</div>
