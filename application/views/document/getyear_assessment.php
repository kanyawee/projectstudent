<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    ประเมินนักศึกษา
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> กรุณาเลือกปีการประเมิน
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title ">กรุณาเลือกปีการประเมิน</h3>
                    </div>
                    <div class="panel-body"> 
                        <form action="<?php echo base_url('assessment/showassessment'); ?>" method="get">
                            <div class="col-md-4 col-md-offset-4 ">
                                <div class="form-group ">
                                    <label for="cname" class="">ปีการศึกษา : <span class="required"></span></label>
                                    <select name="year" id="year"  class="form-control">
                                        <?php foreach ($year as $row) { ?>

                                            <option value="<?= $row['year']; ?>"><?= $row['year']; ?></option>

                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <button class="btn btn-primary" type="submit" name="submit">แสดงข้อมูล</button>
                                <button class="btn btn-default" type="reset" name="reset">ยกเลิก</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
