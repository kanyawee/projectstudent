<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    แสดงการส่งเอกสาร
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> แสดงเอกสาร
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ดูเอกสารทั้งหมด</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-5">
                            </div>
                            <div class="col-lg-4">
                                <label class=" pull-right">ค้นหาด้วยปีการศึกษาและภาคเรียน</label>
                            </div><!-- /input-group -->                        
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="selectyear" name="selectyear">
                                        <?php foreach ($year as $value): ?>
                                            <option  
                                            <?php
                                            if (!empty($datastudent)) {
                                                foreach ($datastudent as $val) {
//                                                        print_r($value);
                                                    if ($val[0]['year'] == $value['year']) {
                                                        echo "selected";
                                                    }
                                                }
                                            }
                                            ?>
                                                value="<?php echo $value['semester'] . "/" . $value['year'] ?> " >
                                                    <?php echo $value['semester'] . "/" . $value['year'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                                
                            </div>
                            <div class="box-body">
                                <div id="bored"class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-aqua-gradient">
                                                <tr>
                                                    <td><center>ปีการศึกษา</center></td>
                                            <td  align="center">รหัสนักศึกษา</td>
                                            <td  align="center">ชื่อนักศึกษา</td>
                                            <td  align="center">เอกสาร1</td>
                                            <td  align="center">เอกสาร2</td>
                                            <td  align="center">เอกสาร3</td>
                                            <td  align="center">เอกสาร4</td>
                                            <td  align="center">เอกสาร5</td>
                                            <td  align="center">เอกสาร6</td>
                                            <?php if ($function != 0) { ?>
                                                <td  align="center">จบการทำงาน</td>
                                            <?php } ?>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
//                                        print_r($datastudent);
                                                if ($datastudent != NULL) {
                                                    foreach ($datastudent as $value) {
                                                        ?>
                                                        <tr>
                                                            <td align="center"><?php echo($value[0]['year']); ?></td>
                                                            <td align="center"><?php echo($value[0]['id_st']); ?></td>
                                                            <td><?php echo($value[0]['name_st']); ?> &nbsp;&nbsp;<?php echo($value[0]['lastname_st']); ?></td>
                                                            <!--//                                                print_r($year);-->
                                                            <?php for ($i = 0; $i < 6; $i++) { ?>

                                                                <td>
                                                                    <?php if ($i == 0 && $this->db->where('id_st', $value[0]['id_st'])->where('year', $value[0]['year'])->get('document_1')->row()) {
                                                                        ?>
                                                                        <a href="<?php echo base_url('teacher/showdatadocument1') . "/" . ($value[0]['year']) . "/" . ($value[0]['id_st']); ?>"> <center>ส่งแล้ว</center>
                                                                            <?php
                                                                        }
                                                                        foreach ($value as $n) {
                                                                            if ($n['document_number'] == $i + 1) {
                                                                                $sever = base_url() . "/uploads/" . $n['document_name'];
                                                                                ?>

                                                                                <a target='_blank' href='<?php echo $sever ?>'><center>ส่งแล้ว</center></a>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </td>
                                                            <?php } ?>
                                                            <?php if ($function != 0) { ?>
                                                                <td>
                                                        <center><label class="checkbox-slider--b">
                                                                <input type="checkbox" class="switch-input" <?php
                                                                       if ($value[0]['finish'] == 1)
                                                                           echo("checked");
                                                                       else
                                                                           echo""
                                                                           ?> id="<?php echo $value[0]['id_st'] ?>" name="status" onchange="update(this);" value="<?php
                                                                       if ($value[0]['finish'] == 1)
                                                                           echo("0");
                                                                       else
                                                                           echo("1")
                                                                           ?>" >

                                                            </label> 
                                                        </center>
                                                        </td>

                                                        <?php
                                                    }
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo NULL;
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
        </div>
    </div>
</div>

<script src="<?= base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= base_url() . 'assets/bootstrap/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
<script>
                                                                               function update(this_a) {
                                                                                   $.post('<?php echo base_url("document/updatefinish/") ?>' + "/" + this_a.id + "/" + this_a.value);

                                                                                   if (this_a.value == "1") {
                                                                                       $('#' + this_a.id).val("0");

                                                                                   } else {
                                                                                       $('#' + this_a.id).val("1");
                                                                                   }

                                                                               }

                                                                               $("#selectyear").change(function () {
                                                                                   var select = $("#selectyear").val();
                                                                                   var year = select.substring(2, 6);
                                                                                   var semester = select.substring(0, 1);
//                                                                            alert(year);
//                                                                            alert(semester);
                                                                                   $.ajax({
                                                                                       type: 'post',
                                                                                       url: '<?php echo base_url('teacher/getdatadocument'); ?>',
                                                                                       data: {
                                                                                           year: year,
                                                                                           semester: semester
                                                                                       },
                                                                                       success: function (response) {
                                                                                           console.log(response);
                                                                                           //                alert(response);
                                                                                           document.getElementById("bored").innerHTML = response;
                                                                                       }
                                                                                   });
                                                                               });

</script>