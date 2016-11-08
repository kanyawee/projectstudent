                <form class=""role="form" action="formres_controller/addres" method="POST" enctype="multipart/form-data">

                    <div class="row container" >
                        <div class="col-lg-12 col-xs-12 container">                            
                            <input type="text" name="lat" id="latbox" value=""/>          
                            <input type="text" name="lng" id="lngbox" value=""/>                                                        
                        </div>                           
                    </div><br>
                    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGB6CfHD2BcKTi0Uc31nsAm6xQ4Z7s3uQ"></script>
                    <body onload="initialize()"><!--*********-->
                        <div class="row" align="center">
                            <div class="col-xs-12">
                                <div class="img-thumbnail" float="none" id="map_canvas" align="center" style="width:100%;height:400px;" >
                                </div></br>
                            </div>
                        </div></br>
                </form> 
                <script src="<?php echo base_url(); ?>front_page/js/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script type="text/javascript" >
//                        $(document).ready(function () {
//                            var max_fields = 4;
//                            var x = 0;
//                            var id = 1;
//                            var base_url = window.location.origin;
//                            $("#Clone").click(function () {
//                                id++;
//                                x++;
//                                if (x < max_fields) { //max input box allowed
//                                    ($("#photo").clone()
//                                            .find("input:text").val("").end()
//                                            .find("input:text").attr('id', 'detail' + id).end()
//                                            .find("img").attr('id', 'uploadPreview' + id).end()
//                                            .find("img").attr('src', base_url + "/webci/photo/no_image.jpg").end()
//                                            .find("input:file").attr('id', 'uploadImage' + id).end()
//                                            .find("input:file").attr('onchange', 'PreviewImage(' + id + ")").end()
//                                            .appendTo("#t"));
//                                }
//                            });
//                        });
                </script>

                <script type="text/javascript">
                    function initialize() {
                        var myLatlng = new google.maps.LatLng(17.628087, 100.097616);
                        var myOptions = {
                            zoom: 7,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                        }
                        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                        marker = new google.maps.Marker({
                            position: myLatlng,
                            map: map,
//                            title: 'Default Marker',
                            draggable: true
                        });
                        google.maps.event.addListener(marker, 'drag', function (event) {
                            document.getElementById('latbox').value = this.position.lat();
                            document.getElementById('lngbox').value = this.position.lng();
                            //alert('drag');
                        });
                        google.maps.event.addListener(marker, 'dragend', function (event) {
                            document.getElementById('latbox').value = this.position.lat();
                            document.getElementById('lngbox').value = this.position.lng();
                            alert('นี่คือตำแหน่งร้าน ?');
                        });
                    }
                </script>
