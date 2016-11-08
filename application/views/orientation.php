<link href="<?php echo base_url() . '/assets/css/datepicker.css'; ?>" rel="stylesheet" media="screen">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>-->

<link href="<?php echo base_url() . 'assets/tagitnew/Bootstrap.css' ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() . 'assets/tagitnew/tagit.css' ?>" rel="stylesheet" type="text/css" />
<!-- <?php
//print_r($datastudent);
$newbox = array();
foreach ($datastudent as $box) {
    $newbox[$box['id_es']][] = $box;
}
?> -->

<div class="content-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="page-header">
                    กำหนดตารางนิเทศ
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo base_url('teacher/menu'); ?> " >หน้าหลัก</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> กำหนดตารางนิเทศของอาจารย์
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">กำหนดตารางนิเทศของอาจารย์</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        extract($newbox);
                        ?>
                        <h5>ปีการศึกษา<span style="padding-left:20px"><?php // echo $newbox[0]['year'];                                                                                                     ?></span></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <th><center>สถานประกอบการ</center></th>
                                <th><center>กำหนดวันเทศ</center></th>
                                <th><center>กำหนดเวลา</center></th>
                                <th colspan="2"><center>อาจารย์นิเทศ</center></th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($newbox as $compname) { ?>
                                    <form id="form1<?= $compname[0]['id_es'] ?>" name="form1" action="#" method="post">
                                        <tr id="or<?= $compname[0]['id_es'] ?>">
                                            <td rowspan = "<?= count($compname) ?>" width="20%"><?= $compname[0]['name_es'] ?></td>
                                            <?php
                                            foreach ($compname as $row) {
                                                extract($row);
                                                print_r($row);
                                                ?>
                                                <td width="15%"><center>
                                                <div class="hero-unit" >
                                                    <input type="hidden" id="id_es" name="id_es[]" value="<?php echo $row['id_es']; ?>">
                                                    <input class="input-medium dp-applied" type="text" data-provide="datepicker" id="date_<?= $id_es; ?>" name="date"  data-date-language="th-th" style=" width: 90%" required/>
                                                </div>
                                            </center>
                                            </td>
                                            <td width="20%"><center>
                                                <p id="timeOnlyExample" >
                                                    <input  type="text" id = "start_<?= $id_es; ?>" class="time start" style=" width: 30%" required/> to
                                                    <input type="text" id= "end_<?= $id_es; ?>" class="time end" style=" width: 30%" required />
                                                </p>
                                            </center>
                                            </td>
                                            <td>
                                                <span id="num<?= $id_es; ?>"></span>
                                            </td>   
                                            <td width="15%">
                                            <center>
                                                <input type="button" id="update<?= $id_es; ?>" value="แก้ไข" hidden="true"/>
                                                <input type="button" id="add<?= $id_es; ?>" onclick="addfield(<?= $id_es; ?>);"value="เพิ่ม" />
                                                        <input type="button" onclick = "sendData(<?= $id_es; ?>)" id="submitTags<?= $id_es; ?>" value="บันทึก"/>
                                            </center>
                                            </td>
                                            </tr>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                    <?php
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
<!----------------------tag-it-------------------------------------->
<script src="<?php echo base_url() . 'assets/tagitnew/jquery.1.7.2.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/tagitnew/jquery-ui.1.8.20.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/tagitnew/tagit-themeroller.js' ?>"></script>

<!-----------------------date--------------------------------------->
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker-thai.js'); ?>"></script><button class="btn-group-xs"
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.th.js') ?>"></script>
    <!-----------------------time--------------------------------------->
    <script src="<?php echo base_url() . 'assets/datetime/js/jquery.timepicker.js'; ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetime/css/jquery.timepicker.css'; ?>" />
    <script src="<?php echo base_url() . 'assets/datetime/lib/jquery.ptTimeSelect.js'; ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datetime/lib/jquery.ptTimeSelect.css'; ?>" />
    <script src="<?php echo base_url() . 'assets/datetime/dist/datepair.js'; ?>"></script>

    <script>

                                            //                                            function addtag(id) {
                                            ////                                                        alert(id);
                                            //                                                var form = $("#form1" + id).serializeArray();
                                            //                                                var input = $("input#text");
                                            //                                                var instance = $("<ul class=\"tags\"></ul>");
                                            //                                                $("input#text" + id).after(instance);
                                            //
                                            //                                                input.hide().after(instance);
                                            //                                                //Initialize tagit
                                            //                                                instance.tagit({
                                            //                                                    tagSource: "<?php echo base_url('index.php/teacher/getteachername') ?>",
                                            //                                                    tagsChanged: function () {
                                            //
                                            //                                                        //Get the tags
                                            //                                                        var tags = instance.tagit('tags');
                                            //                                                        var tagString = [];
                                            //                                                        var newst = [];
                                            //                                                        //Pull out only value
                                            //                                                        for (var i in tags) {
                                            //                                                            tagString.push(tags[i].value);
                                            //                                                            newst.push(tags[i].label);
                                            //                                                            // console.log(tags[i]);
                                            //                                                        }
                                            //                                                        //Put the tags into the input, joint by a ','
                                            //                                                        $("input#text" + id).val(tagString.join(','));
                                            //                                                        $("input#alarm" + id).val(newst.join(','));
                                            //                                                        //console.log($('.tagit-input').val());
                                            //                                                        // $.ajax({
                                            //                                                        //   type : post;
                                            //                                                        // });
                                            //
                                            //                                                        var uniquekey = {
                                            //                                                            name: "uniquekey",
                                            //                                                            value: $("input#text" + id).val()
                                            //                                                        };
                                            //                                                        form.push(uniquekey);
                                            //
                                            //                                                    }
                                            //
                                            //                                                });
                                            //
                                            //                                                $('#add' + id).prop('onclick', null).off('click');
                                            //                                                $('#add' + id).hide('onclick');
                                            //                                                $('#update' + id).show();
                                            //                                                $("#submitTags" + id).click(function () {
                                            //                                                    $("#but" + id).html($("input#alarm" + id).val());
                                            //
                                            //                                                    $.ajax({
                                            //                                                        url: "../teacher/addorientation",
                                            //                                                        type: "POST",
                                            //                                                        data: form,
                                            //                                                        success: function (response) {
                                            //
                                            //                                                            //                                                                                   document.getElementById('reservation3').value = d;
                                            //                                                            //                                                                                    document.getElementById("date").innerHTML="แก้ไข";
                                            //                                                            //                                                                            console.log(response);
                                            //                                                            //
                                            //                                                            console.log(response);
                                            //                                                        }
                                            //                                                    });
                                            //                                                });
                                            //                                            }

                                            function addfield(id) {
                                                //                                                        $("#1").html("<select name='teacher_id[]'><option>เลือกอาจารย์นิเทศ</option>< /select>")

                                                $("#num" + id).append("<p><center id =><select name='teacher_"+id+"[]' id='teacher_"+id+"[]'>"
                                                        + "<option>เลือกอาจารย์นิเทศ</option>"
                                                        + "<?php
                                foreach ($datateacher as $row):
                                    echo "<option  value=" . $row['teacher_id'];
                                    ?>"
                                                            + ">"
                                                            + "<?php
                                    echo $row['teacher_name'];
                                    echo "</option>";
                                endforeach;
                                ?>"
                                                        );

                                            }

                                            function delect(id) {
                                                alert(id);
                                            }

                                            function sendData(id){
                                                console.log($("#date_10").val());
                                                console.log($("#start_10").val());
                                                console.log($("#end_10").val());
                                                console.log($("select[id='teacher_10']").map(function(){return $(this).val();}).get());
                                                console.log($( "#teacher_10 option:selected" ).map(function(){return $(this).val();}).get());
                                            }





                                            $('#timeOnlyExample .time').timepicker({
                                                'showDuration': true,
                                                'timeFormat': 'g:ia'
                                            });
                                            var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
                                            var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);

    </script>
    <!-- ทดสอบแสดง -->
    <!--<script>
      $(document).ready(function(){
        $.ajax({
          url:"../teacher/get_teacher",
          type: "POST",
          data:{TYPE:"datatch"},
          dataType:"JSON",
          success: function (datateacher) {
            var opt;
                                            $.each(datateacher,function(key,val){
              opt=  val['teacher_name'];
              console.log(val['teacher_name']);
      $("#nametech").append(val['teacher_name']);
                                            });
    
    
          },error: function(err){
                                console.log(err);
         }
        });
      });
    </script>-->
