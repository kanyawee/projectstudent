<link href="<?php echo base_url() . 'assets/tagitnew/Bootstrap.css' ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() . 'assets/tagitnew/tagit.css' ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <div class="container">
        <h1 class="page-header"></h1>
        <!-- Page Heading -->
        <div class="row " >
            <div class="col-md-10 col-md-offset-1">
                <ol class="breadcrumb">
                    <li class="active">
                        <h4> &nbsp; ส่งเอกสารฝึกงาน</h4>
                    </li>
                </ol>
            </div>
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">เมนูเอกสาร</h3>
                    </div>    
                    <input type="text" id="text" name="tags" value=""/>
                    <br/>
                    <input type="button" id="submitTags" value="Value"/>
                    <br/>
                    <div id="tagName"/>
                    <div class="panel-body"> 
                        <div class="box-body no-padding">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="<?php echo base_url() . 'assets/tagitnew/jquery.1.7.2.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/tagitnew/jquery-ui.1.8.20.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/tagitnew/tagit-themeroller.js' ?>"></script>

<script>

    $(document).ready(function () {

        //The demo tag array
        var availableTags = [
            {value: 1, label: 'tag1'},
            {value: 2, label: 'tag2'},
            {value: 3, label: 'tag3'}];
        $("#submitTags").click(function () {
            $("#tagName").html('The value is :: ' + $("input#text").val());
        });
        //The text input
        var input = $("input#text");

        //The tagit list
        var instance = $("<ul class=\"tags\"></ul>");

        //Store the current tags
        //Note: the tags here can be split by any of the trigger keys
        //      as tagit will split on the trigger keys anything passed  
        var currentTags = input.val();

        //Hide the input and append tagit to the dom
        input.hide().after(instance);

        //Initialize tagit
        instance.tagit({
            tagSource: availableTags,
            tagsChanged: function () {

                //Get the tags            
                var tags = instance.tagit('tags');
                var tagString = [];

                //Pull out only value
                for (var i in tags) {
                    tagString.push(tags[i].value);
                }

                //Put the tags into the input, joint by a ','
                input.val(tagString.join(','));
            }
        });

        //Add pre-loaded tags to tagit
        instance.tagit('add', currentTags);
    });
</script>