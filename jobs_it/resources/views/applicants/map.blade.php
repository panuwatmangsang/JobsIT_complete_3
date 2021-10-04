@extends('applicants.layout')
@section('title','แผนที่')

@section('cssBlock')
<!-- css -->
<!-- api map -->
<!-- <link rel="stylesheet" href="/jobs_it/css/map.css"> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- map -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@stop

@section('content')

<body>
    <div class="container col-12" style="margin-top:100px">
        <div class="row">

            <!-- left side -->
            <div class="col-md-3">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" id='search_map' style="width: 100%;" name="query" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="search jobs...">
                    </div>
                </form>


                <br>

                <div class="card-header" style="background:#E94242; color:white; text-align:center;">
                    เลือกประเภทของงาน
                </div>
                <div id="myDIV" align="center">
                    <button type="button" class="btn btn-light" onclick="set_type_job('all')" style="width: 100%; border-bottom: solid 1px coral;">
                        งานทั้งหมด
                    </button>

                    <button type="button" class="btn btn-light" onclick="set_type_job('fulltime')" style="width: 100%; border-bottom: solid 1px coral;">
                        <div class="fa fa-circle" style="font-size:18px; color:#040EFF;"></div>
                        งานเต็มเวลา
                    </button>

                    <button type="button" class="btn btn-light" onclick="set_type_job('parttime')" style="width: 100%; border-bottom: solid 1px coral;">
                        <div class="fa fa-circle" style="font-size:18px; color:#00F928;"></div>
                        งานพาร์ทไทม์
                    </button>
                </div>

                <div class="card" style="width:100%; margin-top: 5px;">
                    <div class="card-body" style="width:100%">
                        <div class="WFH">
                            <input type="checkbox" id="myCheck" onclick="WFH_job('WFH')">
                            <label for="vehicle1">ทำงานที่บ้าน (Work from Home)</label>
                            <p id="text" style="display:none">Checkbox is CHECKED!</p>
                        </div>
                    </div>
                </div>

                <div class="card" style="width:100%; margin-top: 5px;">
                    <div class="card-body" style="width:100%;">
                        <p>ระยะทาง <span id="value"></span> เมตร</p>

                        <input type="range" min="100" max="1000" value="100" style="width: 100%;" id="myRange" onchange="updateRadius()">

                        <br>

                        <input id="remove-line" type="button" value="ลบเส้นระยะทาง" />

                    </div>
                </div>

                <div id="myNav" class="overlay" style="height:35%; width:0px; z-index:1; margin-top:5px; left:0; background-color:#ffff;overflow: hidden;transition: 0.3s;border-radius: 10px;box-shadow: 0px 0px 6px rgb(231 194 192);" name="">
                    <div class="btn" style="float: right;">

                        <a href="javascript:void(0)" style="font-size:30px; border: none; outline: none; " onclick="closeNav()">&times;</a>
                    </div>

                    <div class="detail" style="float: left; margin-top:15px; margin-left:5px;">

                        <button type="submit" class="btn btn-primary" name="jobs_id" value="jobs_id" onclick="addmise()">รายละเอียด</button>

                        <div class="overlay-content">

                            <input type="text" name="nameCompany" id="nameCompany" style="border:none; cursor:context-menu; outline:none; width: 100%;" readonly /><br>

                            <textarea type="text" name="address" id="address" style="width:100%; height: 80px; border:none; cursor:context-menu; outline:none; resize:none;" rows="8" readonly /></textarea><br>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-inline form-group ">
                                        <label>ประเภทของงาน : </label>
                                        <input type="text" name="JopType" id="JopType" style="border:none; cursor:context-menu; outline:none;" readonly /><br>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-inline form-group ">
                                        <label>สถานที่ทำงาน : </label>
                                        <input type="text" name="locaWork" id="locaWork" style="border:none; cursor:context-menu; outline:none;" readonly /><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div id="map" style="height:100%; width:100%; box-shadow:0px 20px 20px 0px rgb(231, 194, 192);"></div>
            </div>
        </div>
    </div>

    <script type=text/javascript>
        var map,
            user_input = 'all',
            marker,
            circle,
            i = 0,
            pos,
            directionsService,
            directionsRenderer,
            routeLine = null;
        jobs_id = null
        url = `mapData`;

        function initMap() {
            clicked = null;

            const directionsService = new google.maps.DirectionsService;
            const directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true,
                suppressPolylines: false,
                suppressBicyclingLayer: true,
                polylineOptions: {
                    strokeColor: '#0000FF',
                    strokeWeight: 3
                }
            });


            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 19,
            });
            directionsRenderer.setMap(map);

            // ซ่อน lable
            const styles = {
                default: [],
                hide: [{
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }
                ],
            };
            map.setOptions({
                'styles': styles["hide"]
            });

            //-----------------------location พิกัดที่เราอยู่---------------------------------//
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                        pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        // console.log("0")
                        // console.log(pos)
                        map.setCenter(pos);

                        //-----------------------marker กับ circle ---------------------------------//
                        marker = new google.maps.Marker({
                            icon: '../image/home.png',
                            map: map,
                            animation: google.maps.Animation.DROP,
                            position: pos
                        });

                        circle = new google.maps.Circle({
                            strokeColor: "#FF0000",
                            strokeOpacity: 0.5,
                            strokeWeight: 1,
                            fillColor: "#FCA3B7",
                            fillOpacity: 0.25,
                            map: map,
                            clickable: false,
                            center: marker.getPosition(),
                            radius: 100,
                            clickable: false
                        });
                        addYourLocationButton(map, marker, circle);
                        // console.log('00')
                        // console.log(marker.position.lat())
                        // console.log(marker.position.lng())
                    },
                    function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });

            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            const infoWindow = new google.maps.InfoWindow();

            //------------------------------------เงื่อนไขของปุ่มประเภทมี่ดึงมาจากdatabase---------------------------------------------------------//
            // search
            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('query');
            document.getElementById("search_map").value = myParam;

            if (myParam == undefined) {
                url = `mapData`
            } else {
                url = `mapData?query=${myParam}`
            }

            // =================================================================
            $.getJSON(url, function(markers) {
                markers = markers.filter((item) => ((document.getElementById("myCheck").checked ? item[7] == 'wfh' : true) && (user_input == 'all' || item[6] == user_input)))
                for (let i = 0; i < markers.length; i++) {
                    // console.log(markers);
                    let marker = new google.maps.Marker({
                        position: new google.maps.LatLng(markers[i][11], markers[i][12]),
                        icon: (markers[i][6] == 'fulltime') ? '../image/bluepoint03.png' : '../image/greenpoint02.png',
                        map: map,
                        optimized: false,
                        title: markers[i][1]
                    });

                    // const infowindow = new google.maps.InfoWindow({
                    //     content: marker.getTitle(),
                    //     position: marker.getPosition()
                    // });

                    marker.addListener('click', () => {
                        const _jobs_id = markers[i][0]
                        infoWindow.close();
                        jobs_id = _jobs_id
                        infoWindow.setContent(marker.getTitle());
                        infoWindow.open(marker.getMap(), marker);
                        // infowindow.open({
                        //     anchor: marker,
                        //     map: map,
                        //     shouldFocus: false
                        // });
                        clicked = marker.getPosition();
                        // console.log('000')
                        // console.log(marker.position.lat())
                        // console.log(marker.position.lng())

                        // pos = {
                        //     lat: marker.position.lat(),
                        //     lng: marker.position.lng(),
                        // };
                        // console.log("0000")
                        // console.log(pos)
                        document.getElementById("myNav").style.width = "355px";
                        document.getElementById("nameCompany").value = markers[i][1]
                        document.getElementById("address").value = markers[i][10]
                        document.getElementById("JopType").value = markers[i][6]
                        document.getElementById("locaWork").value = markers[i][7]
                        calculateAndDisplayRoute(directionsService, directionsRenderer, pos, clicked);
                        calculateAndDisplayRoute(directionsService, directionsRenderer, pos1, clicked);
                    });
                }
            });
            google.maps.event.addListener(map, 'click', function(event) {
                latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                marker.setPosition(latlng);
                // console.log('00000')

                // console.log(marker.position.lat())
                // console.log(marker.position.lng())
                pos1 = {
                    lat: marker.position.lat(),
                    lng: marker.position.lng(),
                };

                calculateAndDisplayRoute(directionsService, directionsRenderer, pos1, clicked);
                circle.setCenter(marker.getPosition());
                routeLine.setMap(null);

            });
        }

        function addmise() {
            window.location.replace(`/applicants/applicants_see_detail_map/${jobs_id}`)
        }


        //------------------------------------ปุ่มกลับ location---------------------------------------------------------//
        function addYourLocationButton(map, marker) {
            var controlDiv = document.createElement('div');

            var firstChild = document.createElement('button');
            firstChild.style.backgroundColor = '#fff';
            firstChild.style.border = 'none';
            firstChild.style.outline = 'none';
            firstChild.style.width = '42px';
            firstChild.style.height = '42px';
            firstChild.style.borderRadius = '2px';
            firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
            firstChild.style.cursor = 'pointer';
            firstChild.style.marginRight = '10px';
            firstChild.style.padding = '0px';
            firstChild.title = 'Your Location';
            controlDiv.appendChild(firstChild);

            var secondChild = document.createElement('div');
            secondChild.style.margin = '5px';
            secondChild.style.width = '26px';
            secondChild.style.height = '30px';
            secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
            secondChild.style.backgroundSize = '250px 30px';
            secondChild.style.backgroundPosition = '2px 0px';
            secondChild.style.backgroundRepeat = 'no-repeat';
            secondChild.id = 'you_location_img';
            firstChild.appendChild(secondChild);

            google.maps.event.addListener(map, 'dragend', function() {
                $('#you_location_img').css('background-position', '2px 0px');
            });

            firstChild.addEventListener('click', function() {
                var imgX = '0';
                var animationInterval = setInterval(function() {
                    if (imgX == '-18') imgX = '0';
                    else imgX = '-18';
                    $('#you_location_img').css('background-position', imgX + '2px 0px');
                }, 500);
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        marker.setPosition(latlng);
                        map.setCenter(latlng);
                        circle.setCenter(latlng);
                        routeLine.setMap(null);
                        clearInterval(animationInterval);
                        $('#you_location_img').css('background-position', '-198px 0px');
                    });
                } else {
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '2px 0px');
                }

            });

            controlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);

        }

        function set_type_job(change) {
            user_input = change
            initMap()
        }

        //==========================================ขอบวงรัศมี==========================================//
        function updateRadius() {
            circle.setRadius(document.getElementById('myRange').value * 1);
            map.fitBounds(circle.getBounds());
        }

        //==========================================เส้น==========================================//
        function calculateAndDisplayRoute(directionsService, directionsRenderer, pos1, clicked) {

            directionsService.route({
                origin: pos1,
                destination: clicked,
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {

                if (status === google.maps.DirectionsStatus.OK) {

                    // console.log("before")
                    // console.log(directionsRenderer)

                    if (routeLine != null) {
                        routeLine.setMap(null);
                    }
                    // console.log("after")
                    // console.log(directionsRenderer)

                    routeLine = new google.maps.Polyline({
                        strokeColor: '#FA8072',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                    });
                    document.getElementById("remove-line").addEventListener("click", removeLine);



                    var bounds = new google.maps.LatLngBounds();

                    let legs = response.routes[0].legs;
                    for (i = 0; i < legs.length; i++) {
                        var steps = legs[i].steps;
                        for (j = 0; j < steps.length; j++) {
                            var nextSegment = steps[j].path;
                            for (k = 0; k < nextSegment.length; k++) {
                                routeLine.getPath().push(nextSegment[k]);
                                bounds.extend(nextSegment[k]);
                            }
                        }
                    }

                    routeLine.setMap(map);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }

            });
        }

        // ========================================================================================================
        var slider = document.getElementById("myRange");
        var number = document.getElementById("value");
        number.innerHTML = slider.value;
        slider.oninput = function() {
            number.innerHTML = this.value;
        }
        // ========================================================================================================


        function removeLine() {
            routeLine.setMap(null);
            // window.location.reload();
        }

        function openNav() {
            document.getElementById("myNav").style.width = "355px";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }

        function WFH_job() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            initMap()
        }

        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeD_GI5uMXZVP40y-yIDJS5oZFQXkCHfs&callback=initMap&libraries=&v=weekly" async></script>



</body>


@endsection