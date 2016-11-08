<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <script src="<?php echo base_url() . 'assets/datetime/js/jquery.min.js'; ?>"></script>

        <script src="<?php echo base_url() . 'assets/datetime/js/jquery.timepicker.js'; ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetime/css/jquery.timepicker.css'; ?>" />


        <script src="<?php echo base_url() . 'assets/datetime/lib/jquery.ptTimeSelect.js'; ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetime/lib/jquery.ptTimeSelect.css'; ?>" />


        <script src="<?php echo base_url() . 'assets/datetime/dist/datepair.js'; ?>"></script>
    </head>

    <body>
        <header>

        </header>
        <article>
            <div class="">
                <h2>Date-only Example</h2>

                <p>You can use datepair with just dates, or just times.</p>
                <p id="timeOnlyExample">
                    <input type="text" class="time start" /> to
                    <input type="text" class="time end" />
                </p>

            </div>
            <script>
                $('#timeOnlyExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
                var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);

            </script>
        </article>

    </article>

</article>
</section>
</body>
</html>
