<link href="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker-bs3.css'; ?>" rel="stylesheet" type="text/css" />

<!-- Bootstrap Color Picker -->
<link href="<?= base_url() . 'assets/plugins/colorpicker/bootstrap-colorpicker.min.css'; ?>" rel="stylesheet"/>
<!-- Bootstrap time Picker -->
<link href="<?= base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css'; ?>" rel="stylesheet"/>
<link href="<?php echo base_url('/assets/css/titatoggle-dist.css'); ?>" rel="stylesheet" type="text/css" />
<!--<link href="<?php // echo base_url() . '/assets/css/datepicker.css';                                                                          ?>" rel="stylesheet" media="screen">-->

<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    จัดการสถานะการส่งเอกสาร
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('index.php/teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> จัดการสถานะการส่งเอกสาร
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">จัดการสถานะการส่งเอกสาร</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">

                                <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>เอกสาร</td>
                                    <td align='center'>สถานะ</td>
                                    <td align='center' colspan="3">กำหนดระยะเวลาส่งเอกสาร</td>
                                </tr>
                                <?php
                                $i = 0;

                                foreach ($datadocument as $row) {
                                    $number_document = $row['number_document'];
                                    $name_document = $row['name_document'];
                                    $status = $row['status'];
                                    $startdate = $row['startdate'];
                                    ?>
                                    <tr>
                                        <td><?php echo "เอกสารหมายเลข" . $number_document; ?></td>
                                        <td><?php echo $name_document; ?></td>
                                        <td>
                                            <label class="checkbox-slider--b">
                                                <input type="checkbox" class="switch-input" <?php
                                                if ($status == 1)
                                                    echo("checked");
                                                else
                                                    echo""
                                                    ?> id="<?php echo $number_document; ?>" name="status" onchange="update(this);" value="<?php
                                                       if ($status == 1)
                                                           echo("0");
                                                       else
                                                           echo("1")
                                                           ?>" >
                                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                        </td>
                                    <form class="result"  id="datestart<?= $number_document; ?>" action=" " method="post">
                                        <td colspan="2">
                                        <center>

                                            <div class="form-group">
                                                <div class="input-group">

                                                    <?php if ($startdate != NULL) { ?>
                                                        <p id="<?= ++$i ?>" class="form-control-static <?= $i ?>"><?php echo substr($startdate, 0, 6);
                                                echo substr($startdate, 6) + 543;
                                                echo substr($startdate, 10, 9);
                                                echo substr($startdate, 19) + 543; ?></p>
    <?php } else { ?>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="reservation<?= ++$i ?>" name="startdate" />
    <?php } ?>
                                                    <input type="hidden" id="number_document" name="number_document" value="<?php echo $number_document; ?>"/>

                                                </div><!-- /.input group -->
                                            </div>

                                        </center>
                                        </td>
                                        <td>
                                            <?php if ($startdate != NULL) { ?>
                                                <button type="button" class="btn btn-info" id="updatestartdate<?= $i; ?>" onclick="update_startdate(<?= $i; ?>);">แก้ไข </button>
                                                <button type="submit" class="btn btn-primary" id="date">บันทึก</button>

    <?php } else { ?>
                                                <button type="submit" class="btn btn-primary custom" id="date">บันทึก</button>
                                    <?php } ?>
                                        </td>
                                        </tr>
                                    </form>
    <?php
}
?>
                                </tbody>
                            </table>
                            <div><a href="<?php echo base_url('teacher/getdatadocument'); ?>">เรียกดูนักศึกษาที่ส่งเอกสาร</a></div>
                            <!--                            <div class="form-group">
                                                            <div class="col-md-4 col-md-offset-4"><br>
                                                                <button type="button" class="btn btn-primary" id="date" >บันทึกข้อมูล</button>
                                                                <button type="reset" class="btn btn-default">ยกเลิก</button>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="dataConfirmModal"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">สถานการส่งเอกสาร</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>เปิดการส่งเอกสาร</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="dataConfirmModal1"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">สถานการส่งเอกสาร</h4>
                <div id="Dataok"></div>
            </div>
            <div class="modal-body">
                <p>ปิดการส่งเอกสาร</p>
                <input type="hidden" name="modal_id" id="modal_id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</body>
<script src="<?= base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= base_url() . 'assets/bootstrap/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?= base_url() . 'assets/plugins/input-mask/jquery.inputmask.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/input-mask/jquery.inputmask.extensions.js'; ?>" type="text/javascript"></script>
<!-- date-range-picker -->
<script src="<?= base_url() . 'assets/plugins/daterangepicker/momentdate.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/daterangepicker/moment-with-locales.min.js' ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker.js'; ?>" type="text/javascript"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() . 'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'; ?>" type="text/javascript"></script>



<!-- Page script -->
<script type="text/javascript">



                                                    $(function () {
                                                        //Date range picker
<?php
$k = 0;
for ($j = 1; $j <= $i; $j++) {
    ?>
                                                            moment.locale('th');
                                                            $('#reservation<?= $j ?>').daterangepicker();

<?php }
?>
                                                        //Date range as a button
                                                        $('#daterange-btn').daterangepicker(
                                                                {
                                                                    ranges: {
                                                                        'Today': [moment(), moment()],
                                                                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                                                        'Last 7 Days': [moment().subtract('days', 6), moment()],
                                                                        'Last 30 Days': [moment().subtract('days', 29), moment()],
                                                                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                                                                    },
                                                                    startDate: moment().subtract('days', 29),
                                                                    endDate: moment()
                                                                },
                                                                function (start, end) {
                                                                    $('#reportrange span').html(start.format('DD MM, YYYY') + ' - ' + end.format('DD MM, YYYY'));
                                                                }
                                                        );

                                                    });


                                                    function update(this_a) {
                                                        $.post('<?php echo base_url("teacher/updateStatus/") ?>' + "/" + this_a.id + "/" + this_a.value);

                                                        if (this_a.value == "1") {
                                                            $('#' + this_a.id).val("0");
                                                            $('#dataConfirmModal').modal({show: true});

                                                        } else {
                                                            $('#' + this_a.id).val("1");

                                                            $('#dataConfirmModal1').modal({show: true});
                                                        }

                                                    }
//
//                                                            $(this).on("submit", function (e) {
//                                                                var d = document.getElementsByName("startdate")[<?= $k ?>].value;
//                                                                var c = document.getElementsByName("number_document")[<?= $k ?>].value;
//                                                                //var d = document.getElementsByName("startdate").id;
//                                                                //                                                var d = this.value;
//                                                                var id = $("form").attr('id');
//                                                                $.ajax({
//                                                                    url: "../teacher/adddate",
//                                                                    type: "POST",
//                                                                    data: {id: id, date: d},
//                                                                    success: function (response) {
//                                                                        alert(id);
//                                                                    }
//                                                                });
<?php for ($k = 1; $k <= $i; $k++) { ?>
                                                        $('#datestart<?= $k ?>').submit(function (e) {
                                                            var d = $('#reservation<?= $k ?>').val();
                                                            var $this = $(this);
                                                            if (!$this.next(".result").data('loaded')) {
                                                                var id = $this.next().find("input[name=number_document]").val();
                                                                $.ajax({
                                                                    url: "../teacher/adddate_seddocument",
                                                                    type: "POST",
                                                                    data: {id: id, date: d},
                                                                    success: function (response) {
                                                                        window.location.replace("document");
    //                                                                alert(response);
                                                                        //                                                                                   document.getElementById('reservation3').value = d;
                                                                        //                                                                                    document.getElementById("date").innerHTML="แก้ไข";
                                                                        //                                                                            console.log(response);
                                                                        //                                                                            alert(response);
                                                                    }
                                                                });
                                                            }
                                                            //                                               e.preventDefault();
                                                        });





<?php } ?>
                                                    function update_startdate(id) {
                                                        var oldclass = $('.' + id);
                                                        var input = $('<input />', {
                                                            'type': 'text',
                                                            'class': 'form-control pull-right ' + id,
                                                            'id': 'reservation' + id,
                                                            'name': 'startdate',
                                                            'value': oldclass.text()

                                                        });
                                                        $('#updatestartdate' + id).prop('onclick', null).off('click');
                                                        oldclass.replaceWith(input);
                                                        $('#reservation' + id).daterangepicker();
                                                        $('#reservation' + id).parent().prepend("<div class='input-group-addon'><i class='fa fa-calendar'></i></div>");
//                                                $('#reservation' + id).children("button#updatestartdate").attr("onclick", "null");
                                                    }
</script>
