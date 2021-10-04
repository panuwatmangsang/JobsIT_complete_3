@extends('ent.layout')
@section('title','ข้อมูลบริษัท')

@section('cssBlock')
<!-- css -->
<link rel="stylesheet" href="/jobs_it/css/map_post.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@stop

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%; top:100px; height:auto">
                <div class="card-header" style="background-color:#6369ED; color:White;">
                    <p class="card-text" style="font-size: 18px;">แก้ไขข้อมูลบริษัท</p>
                </div>

                <div class="card-body">
                    <form action="{{ route('ent_update_profile',$profile_edit->profile_company_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="nameCompany">ชื่อบริษัท</label>
                            <input type="text" class="form-control" name="profile_name_company" value="{{$profile_edit->profile_name_company}}" placeholder="กรุณากรอกชื่อบริษัท">
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">โลโก้บริษัท</label>
                                    <input type="file" name="profile_logo" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                    <img src="{{ asset('uploads/profile_logo/'.$profile_edit->profile_logo) }}" width="100px" height="70px" alt="logo">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="rank">ชื่อผู้ติดต่อ</label>
                                <input type="text" class="form-control" name="profile_company_contact" value="{{$profile_edit->profile_company_contact}}" placeholder="กรุณากรอกชื่อผู้ติดต่อ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="quantity">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" name="profile_company_phone" value="{{$profile_edit->profile_company_phone}}" placeholder="เบอร์โทรศัพท์">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nameCompany">อีเมล</label>
                            <input type="text" class="form-control" name="profile_email" value="{{$profile_edit->profile_email}}" placeholder="กรุณากรอกอีเมล">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ที่อยู่ของบริษัท</label>
                            <textarea class="form-control" name="profile_company_address" id="exampleFormControlTextarea1" rows="8">{{$profile_edit->profile_company_address}}</textarea>
                            <input type="hidden" name="profile_lat" value="{{$profile_edit->profile_lat}}" id="loc_lat" />
                            <input type="hidden" name="profile_lng" value="{{$profile_edit->profile_lng}}" id="loc_long" />
                        </div>

                        <div class="form-group">
                            <p>กดเพื่อบันทึกพิกัดที่ตั้งบริษัท</p>
                            <div id="map"></div>
                        </div>

                        <div class="form-group" style="float:right; margin-top:450px;">
                            <a href="{{ route('ent_list_post') }}" class="btn btn-danger">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary">โพสต์</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type=text/javascript>
        var map, pcp;
        const get_show_profile = @json($profile_edit);

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 20,
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                        pos = {
                            lat: parseFloat(get_show_profile.profile_lat),
                            lng: parseFloat(get_show_profile.profile_lng)
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