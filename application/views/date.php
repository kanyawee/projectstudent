<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    </head>
    <body>

        <h3>TimePicker</h3>
        <input type="text" id="datetimepicker1"/><br><br>


    </body>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetimepicker/jquery.datetimepicker.css'; ?>"/>
    <script src="<?php echo base_url() . 'assets/datetimepicker/jquery.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/datetimepicker/build/jquery.datetimepicker.full.js'; ?>"></script>
    <script>


        $('#datetimepicker1').datetimepicker({
            datepicker: false,
            format: 'H:i',
            step: 5
        });

    </script>
</html>
