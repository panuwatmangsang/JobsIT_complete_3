var map,pcp;

function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 20,
  });
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
        pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        // console.log("0")
        // console.log(pos)
        map.setCenter(pos);
  const marker = new google.maps.Marker({
    position:  pos,
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
    google.maps.event.addListener(map, 'click', function (event) {
      latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
      marker.setPosition(latlng);
      // console.log("001")
      // console.log(marker.position.lat())
      // console.log(marker.position.lng())
      pcp = {
        lat: marker.position.lat(),
        lng: marker.position.lng(),
    };
    document.getElementById('loc_lat').value =  marker.position.lat() ;
    document.getElementById('loc_long').value = marker.position.lng();
    });
  },
  function () {
    handleLocationError(true, infoWindow, map.getCenter());
});
} else {
  // Browser doesn't support Geolocation
  handleLocationError(false, infoWindow, map.getCenter());
}
const infoWindow = new google.maps.InfoWindow();
    
}


