<?php echo css_asset('map.css'); ?>
<body>
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
                                    <i class="fa fa-file-o"></i> แก้ไขแบบแจ้งรายละเอียดที่พัก
                                </li>
                            </ol>
                        </div>
                    </div>  
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
                                            $username = $userdata['username'];
                                            $major = $userdata['major'];
                                            $name_es = $userdata['name_es'];
                                            $address_es = $userdata['address_es'];
                                            $number = $userdata['number'];
                                            $road = $userdata['road'];
                                            $alley = $userdata['alley'];
                                            $district = $userdata['district'];
                                            $county = $userdata['county'];
                                            $city = $userdata['city'];
                                            $postcode = $userdata['postcode'];
                                            $phone = $userdata['phone'];
                                            $fax = $userdata['fax'];
                                            $number_contact = $userdata['number_contact'];
                                            $road_contact = $userdata['road_contact'];
                                            $alley_contact = $userdata['alley_contact'];
                                            $district_contact = $userdata['district_contact'];
                                            $county_contact = $userdata['county_contact'];
                                            $city_contact = $userdata['city_contact'];
                                            $postcode_contact = $userdata['postcode_contact'];
                                            $phone_contact = $userdata['phone_contact'];
                                            $fax_contact = $userdata['fax_contact'];
                                            $name_contact = $userdata['name_contact'];
                                            $lastname_contact = $userdata['lastname_contact'];
                                            ?>

                                            <tr>
                                                <td colspan="3">ชื่อ - นามสกุล : 
                                                    <input  style="width:70%" type="text" value="<?php echo $name_st ?> &nbsp;<?php echo $lastname_st ?>">
                                                </td>
                                                <td colspan="2">เลขรหัสประจำนักศึกษา :
                                                    <input  style="width:60%" type="text"  value="<?php echo $id_st ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">หลักสูตร : 
                                                    <input  style="width:75%" type="text"  value="<?php echo $major ?>">
                                                </td>
                                                <td colspan="2">ภาควิชา : 
                                                    <input  style="width:83%" type="text"  value="<?php echo $username ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">ชื่อสถานประกอบการ(ไทย หรือ อังกฤษ) : 
                                                    <input  style="width:67.5%" type="text" name="name_es" value="<?php echo $name_es ?>">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">ที่อยู่สถานประกอบการ :</td>
                                                <td colspan="3">
                                                    <textarea style="width:99%" name="address_es" id="address_es"  > <?php echo $address_es ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><b>ขอแจ้งรายละเอียดเกี่ยวกับที่พักระหว่างการฝึกประสบการณ์ดังนี้</b></td>
                                            </tr>

                                            <tr>
                                                <td width="3%"></td>
                                                <td >เลขที่ : 
                                                    <input   style="width:50%" type="text" name="number" value="<?php echo $number ?>">
                                                </td>
                                                <td >ถนน : 
                                                    <input   style="width:75%" type="text" name="road" value="<?php echo $road ?>">
                                                </td>
                                                <td>ซอย : 
                                                    <input   style="width:75%" type="text" name="alley"  value="<?php echo $alley ?>">
                                                </td>
                                                <td>ตำบล : 
                                                    <input  style="width:75%" type="text" name="district"  value="<?php echo $district ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td >อำเภอ : 
                                                    <input  style="width:50%" type="text"  name="county"  value="<?php echo $county ?>">
                                                </td>
                                                <td colspan="2" align="center">จังหวัด :
                                                    <input  style="width:50%" type="text" name="city"  value="<?php echo $city ?>">
                                                </td>
                                                <td>รหัสไปรษณีย์ :
                                                    <input  style="width:54%" type="text"  name="postcode"  value="<?php echo $postcode ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2">โทรศัพท์ :
                                                    <input  style="width:50%" type="text" name="phone" value="<?php echo $phone ?>">
                                                </td>
                                                <td colspan="2">โทรสาร : 
                                                    <input  style="width:84%" type="text" name="fax" value="<?php echo $fax ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><b>ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้ในกรณ์ฉุกเฉิน : </b></td>

                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="2">ชื่อ : <input style="width:90%"  type="text" name="name_contact" value="<?php echo $name_contact ?>"></td>
                                                <td colspan="2">นามสกุล : <input style="width:82.5%"  type="text" name="lastname_contact" value="<?php echo $lastname_contact ?>"></td>
                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td >เลขที่ : <input style="width:50%"  type="text" name="number_contact" value="<?php echo $number_contact ?>"></td>
                                                <td >ถนน : <input style="width:75%" type="text" name="road_contact"  value="<?php echo $road_contact ?>"></td>
                                                <td>ซอย : <input style="width:75%" type="text" name="alley_contact" value="<?php echo $alley_contact ?>"></td>
                                                <td>ตำบล : <input style="width:76%" type="text" name="district_contact"  value="<?php echo $district_contact ?>"></td>
                                            </tr>
                                            <tr>
                                                <td ></td>
                                                <td >อำเภอ : 
                                                    <input style="width:60%" type="text" name="county_contact"  value="<?php echo $county_contact ?>">
                                                </td>
                                                <td colspan="2" align="center">จังหวัด : 
                                                    <input style="width:75%" type="text" name="city_contact" value="<?php echo $city_contact ?>">
                                                </td>
                                                <td>รหัสไปรษณีย์ : 
                                                    <input style="width:54%" type="text" name="postcode_contact"  value="<?php echo $postcode_contact ?>">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2">โทรศัพท์ :
                                                    <input style="width:75%" type="text" name="phone_contact"  value="<?php echo $phone_contact ?>">
                                                </td>
                                                <td colspan="2">โทรสาร : 
                                                    <input style="width:84%" type="text" name="fax_contact" value="<?php echo $fax_contact ?>">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="panel-heading">
                                        <u>แผนที่แสดงตำแหน่งสถานประกอบการ</u>
                                    </div>
                                    <div id='map'></div>
                                    <div class="col-md-4 col-md-offset-4">
                                        <p><button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                            <button class="btn btn-default" type="reset">ยกเลิก</button>
                                        </p>

                                    </div>
                                    <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div> 
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div id="map"></div>
        </div>
    </div>
    <?php echo js_asset('jquery.js'); ?>
    <!-- Bootstrap Core JavaScript -->
    <?php echo js_asset('bootstrap.min.js'); ?>
    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 17.6248033, lng: 100.0983203},
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
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
                markers = [];

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

                    // Create a marker for each place.
                    map.addListener('click', function(e) {
                        placeMarkerAndPanTo(e.latLng, map);
                    });

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
            var marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
            map.panTo(latLng);
        }



    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
    async defer></script>

