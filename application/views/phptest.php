<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tag-it! Example</title>

        <!-- These few CSS files are just to make this example page look nice. You can ignore them. -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tagit/css/reset-fonts.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tagit/css/base-min.css'; ?>">
        <link href="<?php echo base_url() . 'assets/tagit/_static/master.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php // echo base_url() . 'assets/tagit/_static/subpage.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php // echo base_url() . 'assets/tagit/_static/examples.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/tagit/css/jquery.tagit.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/tagit/css/tagit.ui-zendesk.css'; ?>" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery-ui.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo base_url() . 'assets/tagit/js/tag-it.js'; ?>" type="text/javascript" charset="utf-8"></script>

        <script>
            $(function () {
                var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];

                //-------------------------------
                // Single field
                //-------------------------------
                $('#singleFieldTags').tagit({
                    availableTags: sampleTags,
                    // This will make Tag-it submit a single form value, as a comma-delimited field.
                    singleField: true,
                    singleFieldNode: $('#mySingleField')
                });


            });
        </script>

    </head>
    <body>

        <a href="http://github.com/aehlke/tag-it"><img style="position: absolute; top: 0; right: 0; border: 0;" src="http://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png" alt="Fork me on GitHub" /></a>

        <div id="wrapper"> 
            <div id="content">
                <h3>Single Input Field</h3>
                <form>
                    <p>
                        we leave it visible here so you can see how it is manipulated by the widget:
                        <input name="tags" id="mySingleField" value="Apple, Orange" disabled="true"> <!-- only disabled for demonstration purposes -->
                    </p>
                    <ul id="singleFieldTags"></ul>
                    <input type="submit" value="Submit">
                </form>

            </div>
        </div>
    </body>
</html>

