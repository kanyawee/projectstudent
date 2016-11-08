<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/selectmilti/css/kendo.common.min.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/selectmilti/css/kendo.default.min.css'; ?>" />
        <!--<link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />-->

        <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/selectmilti/js/kendo.all.min.js'; ?>"></script>
    </head>
    <body>
        <div id="example" role="application">
            <div class="demo-section k-content">
                <select id="optional_" multiple="multiple" data-placeholder="Select attendees...">
                    <?php foreach ($datateacher as $row): ?>
                        <option  value="<?php echo $row['teacher_id'] ?> " >
                            <?php echo $row['teacher_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button class="k-button" id="get">Send Invitation</button>
            </div>

            <style>
                .demo-section label {
                    display: block;
                    margin: 15px 0 5px 0;
                }
                #get {
                    float: right;
                    margin: 25px auto 0;
                }
            </style>
            <script>
                $(document).ready(function () {
                    var optional = $("#optional_").kendoMultiSelect({
                        autoClose: false
                    }).data("kendoMultiSelect");

                    $("#get").click(function () {
                        alert("Attendees:\nOptional: " + optional.value());
                    });
                });
            </script>


        </div>
    </body>
</html>