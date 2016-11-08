<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
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
                                    <form id="signupForm" method="post" class="form-horizontal"  action="<?php echo base_url('document/adddocument_num1'); ?>">
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
                                                $name_es = $userdata['name_es'];
                                                $address_es = $userdata['address_es'];
                                                $name_pr = $userdata['name_pr'];
                                                $tell_pr = $userdata['tell_pr'];
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
                                                                <textarea style="width:100%" name="address_home" id="address_home" id="address_home"> </textarea>
                                                            </div>
                                                        </div>    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <h5 class="col-sm-4 control-label" for="phone">เบอร์โทรศัพท์</h5>
                                                            <div class="col-sm-5">
                                                                <input type="text" style="width:150%" class="form-control" id="phone" name="phone" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <h5 class="col-sm-2 control-label" for="fax">โทรสาร</h5>
                                                            <div class="col-sm-5">
                                                                <input type="text" style="width:220%" class="form-control" id="fax" name="fax" />
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
                                                                <input type="text" style="width:200%" class="form-control" id="name_contact" name="name_contact" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <h5 class="col-sm-2 control-label" for="lastname_contact">นามสกุล :</h5>
                                                            <div class="col-sm-5">
                                                                <input type="text" style="width:220%" class="form-control" id="lastname_contact" name="lastname_contact" />
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
                                                                <textarea style="width:100%" name="address_contact" id="address_contact" required> </textarea>
                                                            </div>
                                                        </div>                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <h5 class="col-sm-4 control-label" for="phone_contact">เบอร์โทรศัพท์</h5>
                                                            <div class="col-sm-5">
                                                                <input type="text" style="width:150%" class="form-control" id="phone_contact" name="phone_contact" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <h5 class="col-sm-2 control-label" for="fax_contact">โทรสาร</h5>
                                                            <div class="col-sm-5">
                                                                <input type="text" style="width:220%" class="form-control" id="fax_contact" name="fax_contact" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="panel-heading">
                                            <u>แผนที่แสดงตำแหน่งสถานประกอบการ</u>
                                        </div>
                                        <div id="map" style="height: 300px"></div>
                                        <input type="hidden" id="demo" name="map"/>
                                        <div>
                                            <p>
                                            <center><input class="btn btn-primary" type="submit" name="submit" value="บันทึกข้อมูล">
                                                <input class="btn btn-default" type="reset" name="reset" value="ยกเลิก">
                                            </center>
                                            </p>
                                        </div>
                                    </form>
                                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#pac-input').on('keypress', function(e) {
    return e.which !== 13;
});
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
    var marker
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 13.7244426, lng: 100.3529022},
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });


        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('click', function(e) {

            placeMarkerAndPanTo(e.latLng, map);
            $("#demo").val(e.latLng);


        });

        var markers = [];
        // [START region_getplaces]
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.


        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });

        // [END region_getplaces]

    }
    function placeMarkerAndPanTo(latLng, map) {
        if (marker) {
            //if marker already was created change positon
            marker.setPosition(latLng);
            //alert(latLng);

        } else {
            marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: true,
            });


        }
        marker.addListener("dragend", function(ev) {

            var chagedPos = latLng;
            //this.bindPopup(chagedPos.toString()).openPopup();
            $("#demo").val(ev.latLng);


        });

    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
async defer></script>

<script>
    $(document).ready(function() {
        $("#signupForm").validate({
            rules: {
                address_home: {
                    required: true,
                    minlength: 20
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                fax: {
                    required: true
                },
                name_contact: {
                    required: true
                },
                lastname_contact: {
                    required: true
                },
                address_contact: {
                    required: true
                },
                phone_contact: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                fax_contact: {
                    required: true
                },
                agree: "required"
            },
            messages: {
                address_home: "กรุณากรอกที่อยู่ระหว่างฝึกงานด้วยค่ะ",
                minlength: "ความยาวไม่ควรน้อยกว่า 20 ตัว",
                phone: {
                    required: "กรุณากรอกหมายเลขโทรศัพท์",
                    minlength: "กรอกตัวเลขไม่ครบ",
                    maxlength: "ความยาวไม่เกิน 10 ตัว",
                    equalTo: "รูปแบบไม่ถูกต้อง",
                    digits: "กรุณากรอกเป็นตัวเลข"
                },
                fax: {
                    required: "กรุณาหมายเลขโทรสาร"
                },
                name_contact: {
                    required: "กรุณากรอกชื่อผู้ที่สามารถติดต่อได้"
                },
                lastname_contact: {
                    required: "กรุณากรอกนามสกุล"
                },
                address_contact: {
                    required: "กรุณากรอกที่อยู่ผู้ที่สามารถติดต่อได้ด้วยค่ะ"
                },
                phone_contact: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    minlength: "ความยาวไม่เกิน 10 ตัว",
                    maxlength: "ความยาวไม่เกิน 10 ตัว",
                    equalTo: "รูปแบบไม่ถูกต้อง",
                    digits: "กรุณากรอกเป็นตัวเลข"
                },
                fax_contact: {
                    required: "กรุณาหมายเลขโทรสารด้วยค่ะ",
                },
                agree: "รูปแบบอีเมล์ไม่ถูกต้อง"
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }
        });

    });
</script>