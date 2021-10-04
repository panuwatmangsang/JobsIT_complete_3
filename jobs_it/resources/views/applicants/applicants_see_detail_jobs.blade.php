@extends('applicants.layout')
@section('title','แสดงใบประกาศรับสมัครพนักงาน')

@section('cssBlock')
<!-- css -->
<link rel="stylesheet" href="/jobs_it/css/map_post.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>@stop

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%; top:100px; height:auto">
                <div class="card-header" style="background-color:#E94242; color:White;">
                    <p class="card-text" style="font-size: 18px;">แสดงรายละเอียดการประกาศรับสมัครพนักงาน</p>
                </div>

                <div class="card-body">
                    @if(isset($all))

                    <div class="form-group" style="float:right;">
                        <button type="submit" class="btn btn-success" name="action_type" value="{{ $all->jobs_id }}" onclick="apply(value);window.location.reload()">สมัครงาน</button>
                    </div>

                    <br>

                    <div class="form-row col align-self-center" align="center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">โลโก้บริษัท</label> <br>
                                <img src="{{ asset('uploads/logo/'.$all->myjobs_logo) }}" width="100px" height="130px" alt="logo">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="nameCompany">ชื่อบริษัท</label>
                        <input readonly type="text" class="form-control" name="myjobs_name_company" placeholder="กรุณากรอกชื่อบริษัท" value="{{$all->myjobs_name_company}}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="rank">ตำแหน่งงานที่ต้องการ</label>
                            <input readonly type="text" class="form-control" name="myjobs_name" placeholder="กรุณากรอกตำแหน่งงาน" value="{{$all->myjobs_name}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="quantity">จำนวนที่ต้องการ</label>
                            <input readonly type="text" class="form-control" name="myjobs_quantity" placeholder="จำนวนที่ต้องการ" value="{{$all->myjobs_quantity}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="quantity">จำนวนเงินเดือน</label>
                            <input readonly type="text" class="form-control" name="myjobs_salary" placeholder="เงินเดือน" value="{{$all->myjobs_salary}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">ประเภทของงาน</label>
                        <input readonly type="text" class="form-control" name="jobs_type" value="{{$all->myjobs_type}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">ประเภทการทำงาน</label>
                        <input readonly type="text" class="form-control" name="jobs_type" value="{{$all->myjobs_location_work}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ข้อความในการโพสต์</label>
                        <textarea readonly class="form-control" name="jobs_detail" id="exampleFormControlTextarea1" rows="8">{{$all->myjobs_detail}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="nameCompany">ข้อมูลการติดต่อ</label>
                        <textarea readonly class="form-control" name="jobs_contact" id="exampleFormControlTextarea1" rows="8">{{$all->myjobs_contact}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่ของบริษัท</label>
                        <textarea readonly class="form-control" name="jobs_address" id="exampleFormControlTextarea1" rows="8">{{$all->myjobs_address}}</textarea>
                        <input type="hidden" name="lat" value="{{$all->myjobs_lat}}" id="loc_lat" />
                        <input type="hidden" name="lng" value="{{$all->myjobs_lng}}" id="loc_long" />
                    </div>

                    <div class="form-group">
                        <p>แสดงพิกัดที่ตั้งบริษัท</p>
                        <div id="map"></div>
                    </div>

                    <div class="form-group" style="float:right; margin-top:650px;">
                        <a href="/applicants/applicants_myjobs?type=all" class="btn btn-danger">กลับ</a>
                        <!-- <button type="submit" class="btn btn-primary">โพสต์</button> -->
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script type=text/javascript>
        function apply(jobs_id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "/applicants/add_apply_jobs?history_id=" + jobs_id, true);
            xmlhttp.send();
            console.log(jobs_id);
        }
    </script>

    <script type=text/javascript>
        var map, pcp;
        const get_jobs_post = @json($all);

        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 20,
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                        pos = {
                            lat: parseFloat(get_jobs_post.myjobs_lat),
                            lng: parseFloat(get_jobs_post.myjobs_lng)
                        };
                        // console.log("0")
                        // console.log(pos)
                        map.setCenter(pos);
                        const marker = new google.maps.Marker({
                            position: pos,
                            map,
                            title: "ที่ตั้งบริษัท",
                        });
                        marker.addListener("click", () => {
                            map.setCenter(marker.getPosition());
                        });
                        const infowindow = new google.maps.InfoWindow({
                            content: marker.getTitle(),
                            position: marker.getPosition()
                        });
                        marker.addListener('click', () => {
                            infowindow.open({
                                anchor: marker,
                                map,
                                shouldFocus: false
                            });
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.setContent('<p>กดเพื่อบันทึกพิกัดที่ตั้งบริษัท');
                            infowindow.open(map, this);
                        });
                        google.maps.event.addListener(map, 'click', function(event) {
                            latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                            marker.setPosition(latlng);
                            // console.log("001")
                            // console.log(marker.position.lat())
                            // console.log(marker.position.lng())
                            pcp = {
                                lat: marker.position.lat(),
                                lng: marker.position.lng(),
                            };
                            document.getElementById('loc_lat').value = marker.position.lat();
                            document.getElementById('loc_long').value = marker.position.lng();
                        });
                    },
                    function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            const infoWindow = new google.maps.InfoWindow();

        }
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeD_GI5uMXZVP40y-yIDJS5oZFQXkCHfs&callback=initMap&libraries=&v=weekly" async></script>

</body>
@endsection