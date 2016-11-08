<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/date.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.datePicker.js' ?>"></script>
<div id="container">
      <form name="chooseDateForm" id="chooseDateForm" action="datePickerStartEnd.html#">
        <fieldset>
            <legend>Test date picker form</legend>
            <ol>
                <li>
                    <label for="start-date">Start date:</label>
                    <input name="start-date" id="start-date" class="date-pick dp-applied"><a href="#" class="dp-choose-date" title="Choose date">Choose date</a>
                </li>
                <li>
                    <label for="end-date">End date:</label>
                    <input name="end-date" id="end-date" class="date-pick dp-applied"><a href="#" class="dp-choose-date" title="Choose date">Choose date</a>
                </li>
               
            </ol>
        </fieldset>
    </form>

    <h2>Page sourcecode</h2>
    <pre class="sourcecode">
</div>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() . 'assets/css/datePickertest.css' ?>">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() . 'assets/css/demo.css' ?>">


<script>

    $(function()
    {
        $('.date-pick').datePicker()
        $('#start-date').bind(
                'dpClosed',
                function(e, selectedDates)
                {
                    var d = selectedDates[0];
                    if (d) {
                        d = new Date(d);
                        $('#end-date').dpSetStartDate(d.addDays(1).asString());
                    }
                }
        );
        $('#end-date').bind(
                'dpClosed',
                function(e, selectedDates)
                {
                    var d = selectedDates[0];
                    if (d) {
                        d = new Date(d);
                        $('#start-date').dpSetEndDate(d.addDays(-1).asString());
                    }
                }
        );
    });
</script>