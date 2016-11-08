
                <div class="center wow fadeInDown">
                    <h2 class="glyphicon glyphicon-home"> แก้ไขร้าน</h2>
                </div>

                <div class="row">
                    
                </div><br>
                <script type = "text/javascript" src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBGB6CfHD2BcKTi0Uc31nsAm6xQ4Z7s3uQ" ></script>
                <body onload="initialize()"><!--*********-->
                    <div class="row" align="center">
                        <div class="col-xs-12">
                            <div class="img-thumbnail" float="none" id="map_canvas" align="center" style="width:100%;height:400px;" >
                            </div></br>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-lg-12 col-xs-12 container">
                         
                            
                            <!--****-->         <input class="form-control" type="text" name="lat"  id="latbox" value="" /> 
                            <!--****-->         <input class="form-control" type="text" name="lng"  id="lngbox" value="" /> 

                            <div class="col-lg-12 col-lg-offset-11">
                                <input class="btn btn-success" type="submit" name="submit"/>
                            </div>
                        </div>
                    </div></br>       
                    
                    <script type="text/javascript">
                        var Lat = document.getElementById('latbox').value;
                        var Lng = document.getElementById('lngbox').value;
                        var myLatlng = new google.maps.LatLng(Lat, Lng);
                        function initialize() {
                            {
                                var myOptions = {
                                    zoom: 16,
                                    center: myLatlng,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                }
                                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                var marker = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    title: 'Default Marker',
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
                                    alert('OK ?');
                                });
                                marker.setMap(map);
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
                        }
                    </script>
                         
