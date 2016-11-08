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
                                            $address_home = $userdata['address_home'];
                                            $phone = $userdata['phone'];
                                            $fax = $userdata['fax'];
                                            $address_contact = $userdata['address_contact'];
                                            $phone_contact = $userdata['phone_contact'];
                                            $fax_contact = $userdata['fax_contact'];
                                            $name_contact = $userdata['name_contact'];
                                            $lastname_contact = $userdata['lastname_contact'];
                                            $establish = $establish[0];
                                            $name_es = $establish['name_es'];
                                            $address_es = $establish['address_es'];
                                            ?>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="2">ชื่อ - นามสกุล : <span style="padding-left:40px"><?php echo $name_st ?> &nbsp;&nbsp;<?php echo $lastname_st ?></span>
                                                </td>
                                                <td colspan="2">เลขรหัสประจำนักศึกษา : <span style="padding-left:40px"><?php echo $id_st ?></span>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="4">หลักสูตร : <span style="padding-left:40px"><?php echo $major ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="4">ชื่อสถานประกอบการ(ไทย หรือ อังกฤษ) : <span style="padding-left:40px"><?php echo $name_es ?></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="2">ที่อยู่สถานประกอบการ :</td>
                                                <td colspan="4"><span style="padding-left:40px"><?php echo $address_es ?></span>
                                            </tr>
                                            <tr>
                                                <td colspan="5">ขอแจ้งรายละเอียดเกี่ยวกับที่พักระหว่างการฝึกประสบการณ์ดังนี้</td>
                                            </tr>

                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="3">ที่อยู่ : <span style="padding-left:20px"><?php echo $address_home ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="2">โทรศัพท์ :<span style="padding-left:20px"><?php echo $phone ?></span>
                                                </td>
                                                <td colspan="2">โทรสาร : <span style="padding-left:20px"><?php echo $fax ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้ในกรณ์ฉุกเฉิน : </td>

                                            </tr>
                                            <tr>
                                                <td width="3%"></td>
                                                <td colspan="2">ชื่อ : <span style="padding-left:20px"><?php echo $name_contact ?></span></td>
                                                <td colspan="2">นามสกุล : <span style="padding-left:20px"><?php echo $lastname_contact ?></span></td>
                                            </tr>
                                            <tr>
                                                <td ></td>
                                                <td colspan="4">ที่อยู่ : <span style="padding-left:20px"><?php echo $address_contact ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2">โทรศัพท์ :<span style="padding-left:20px"><?php echo $phone_contact ?></span>
                                                </td>
                                                <td colspan="2">โทรสาร : <span style="padding-left:20px"><?php echo $fax_contact ?></span>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="panel-heading">
                                        <u>แผนที่แสดงตำแหน่งสถานประกอบการ</u>
                                    </div>

                                    <div id="map" style="height: 300px"></div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//extract($this->input->post  );
//                                            list($lat, $long) = explode(",",$userdata['map'], 2);
//print_r($userdata);
?>
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script>

    function initMap() {
        var myLatLng = {lat: <?php echo $userdata['lat']; ?>, lng: <?php echo $userdata['lng']; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap"
async defer></script>