<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Advanced form elements</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- daterange picker -->
        <link href="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker-bs3.css'; ?>" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Color Picker -->
        <link href="<?= base_url() . 'assets/plugins/colorpicker/bootstrap-colorpicker.min.css'; ?>" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="<?= base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css'; ?>" rel="stylesheet"/>

    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

            </header>
            <!-- Left side column. contains the logo and sidebar -->


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Advanced Form Elements
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Advanced Elements</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Date picker</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Date range -->
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div>
                    </div><!-- /.box -->
            </div><!-- /.col (right) -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>


<!-- jQuery 2.1.4 -->
<script src="<?= base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= base_url() . 'assets/bootstrap/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?= base_url() . 'assets/plugins/input-mask/jquery.inputmask.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/input-mask/jquery.inputmask.extensions.js'; ?>" type="text/javascript"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker.js'; ?>" type="text/javascript"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() . 'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'; ?>" type="text/javascript"></script>

<!-- Page script -->
<script type="text/javascript">
    $(function() {
        //Datemask dd/mm/yyyy
//        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
//        //Datemask2 mm/dd/yyyy
//        $("#datemask2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
//        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
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
        function(start, end) {
            $('#reportrange span').html(start.format('DD MM, YYYY') + ' - ' + end.format('DD MM, YYYY'));
        }
        );

    });
</script>

</body>
</html>
