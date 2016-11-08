<div class="content-wrapper">
    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" >
                        <h1 class="page-header">
                            ส่งเอกสารฝึกงาน
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('index.php/student/menu'); ?> ">หน้าหลัก</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i><a href="<?php echo base_url('index.php/document/menudocument'); ?>"> เมนูเอกสาร</a> 
                            </li>
                            <li>
                                <i class="fa fa-file-o"></i> แบบแจ้งรายละเอียดที่พัก
                            </li>
                        </ol>
                    </div>
                </div> 

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title" align='center'>แบบแจ้งรายละเอียดที่พัก สถานประกอบการระหว่างการฝึกประสบการณ์วิชาชีพ</h3>
                                </div>
                                <div class="panel-body"> 
                                    <?php echo form_open('document/updatedata'); ?>
                                    <table class="table" id="tabledetail">
                                        <tr>
                                            <td colspan="5">(ผู้ให้ข้อมูล : นักศึกษา)</td>
                                        </tr>
                                        <tr>
                                            <th colspan="5"><b>เรียน  ประธานหลักสูตร</b></th>
                                        </tr>
                                        <tbody>
                                            <?php
                                            $userdata = $userdata[0];
                                            $id_st = $userdata['id_st'];
                                            $name_st = $userdata['name_st'];
                                            $lastname_st = $userdata['lastname_st'];
                                            $major = $userdata['major'];
                                            $address_home=$userdata['address_home'];
                                            $phone = $userdata['phone'];
                                            $fax = $userdata['fax'];
                                            $address_contact = $userdata['address_contact'];
                                            $phone_contact = $userdata['phone_contact'];
                                            $fax_contact = $userdata['fax_contact'];
                                            $name_contact = $userdata['name_contact'];
                                            $lastname_contact = $userdata['lastname_contact'];
                                            $establish=$establish[0];
                                            $name_es = $establish['name_es'];
                                            $address_es = $establish['address_es'];
                                            ?>
                                            <tr>
                                                <td style="width:15%">ชื่อ - นามสกุล : </td>
                                                <td>
                                                    <input class="form-control"  type="text" readonly="" value="<?php echo $name_st ?>">
                                                </td>
                                                <td>เลขรหัสประจำนักศึกษา :</td>
                                                <td>
                                                    <input class="form-control"  type="text" readonly="" value="<?php echo $id_st ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>หลักสูตร : </td>
                                                <td colspan="3">
                                                    <input class="form-control" type="text"  readonly="" value="<?php echo $major ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">ชื่อสถานประกอบการ(ไทย หรือ อังกฤษ) : </td>
                                                <td colspan="2">
                                                    <input class="form-control" type="text" readonly="" value="<?php echo $name_es ?>" >
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">ที่อยู่สถานประกอบการ :</td>
                                                <td colspan="2">
                                                    <textarea style="width:100%" name="address_es" readonly="" id="address_es" > <?php echo $address_es ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><b>ขอแจ้งรายละเอียดเกี่ยวกับที่พักระหว่างการฝึกประสบการณ์ดังนี้</b></td>
                                            </tr>

                                            <tr>
                                                <td colspan="4">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-1 control-label" for="address_home">ที่อยู่ :</h5>
                                                        <div class="col-lg-11">
                                                            <textarea style="width:100%" name="address_home" id="address_home" id="address_home"><?php echo $address_home; ?> </textarea>
                                                        </div>
                                                    </div>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-4 control-label" for="phone">เบอร์โทรศัพท์</h5>
                                                        <div class="col-sm-5">
                                                            <input type="text" style="width:150%" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-2 control-label" for="fax">โทรสาร</h5>
                                                        <div class="col-sm-5">
                                                            <input type="text" style="width:220%" class="form-control" id="fax" name="fax" value="<?php echo $fax; ?>" />
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><b>ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้ในกรณ์ฉุกเฉิน : </b></td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-2 control-label" for="name_contact">ชื่อ</h5>
                                                        <div class="col-sm-5">
                                                            <input type="text" style="width:200%" class="form-control" id="name_contact" name="name_contact" value="<?php echo $name_contact; ?>"/>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-2 control-label" for="lastname_contact">นามสกุล :</h5>
                                                        <div class="col-sm-5">
                                                            <input type="text" style="width:220%" class="form-control" id="lastname_contact" name="lastname_contact" value="<?php echo $lastname_contact;?>"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-1 control-label" for="address_contact">ที่อยู่ :</h5>
                                                        <div class="col-lg-11">
                                                            <textarea style="width:100%" name="address_contact" id="address_contact" required><?php echo $address_contact; ?> </textarea>
                                                        </div>
                                                    </div>                                                        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-4 control-label" for="phone_contact">เบอร์โทรศัพท์</h5>
                                                        <div class="col-sm-5">
                                                            <input type="text" style="width:150%" class="form-control" id="phone_contact" name="phone_contact" value="<?php echo $phone_contact; ?>" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <h5 class="col-sm-2 control-label" for="fax_contact">โทรสาร</h5>
                                                        <div class="col-sm-5">
                                                            <input type="text" style="width:220%" class="form-control" id="fax_contact" name="fax_contact" value="<?php echo $fax_contact; ?>"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="panel-heading">
                                        <b><u>แผนที่แสดงตำแหน่งสถานประกอบการ</u></b>
                                    </div>
                                    <!--<input id="pac-input" class="controls" type="text" placeholder="Search Box">-->
                                    <div id="map" style="height: 300px"></div>
                                    <input type="hidden" id="demo"/>
                                    <div>
                                        <p>
                                        <center><input class="btn btn-primary" type="submit" name="submit" value="บันทึกข้อมูล">
                                            <input class="btn btn-default" type="reset" name="reset" value="ยกเลิก">
                                        </center>
                                        </p>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script>
    var marker
    function initMap() {
        var latLng = {lat: <?php echo $userdata['lat']; ?>, lng: <?php echo $userdata['lng']; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: latLng
        });

        marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: true,
            });
        
         marker.addListener("dragend", function(ev) {

            var chagedPos = latLng;
            //this.bindPopup(chagedPos.toString()).openPopup();
            $("#demo").val(ev.latLng);


        });
        
        map.addListener('click', function(e) {

            placeMarkerAndPanTo(e.latLng, map);
            $("#demo").val(e.latLng);


        });

    }
    
        function placeMarkerAndPanTo(latLng, map) {
        if (marker) {
            //if marker already was created change positon
            marker.setPosition(latLng);
            //alert(latLng);

        } 
        marker.addListener("dragend", function(ev) {

            var chagedPos = latLng;
            //this.bindPopup(chagedPos.toString()).openPopup();
            $("#demo").val(ev.latLng);


        });

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap"
async defer></script>