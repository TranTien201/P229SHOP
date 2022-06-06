let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 21.028511, lng: 105.804817 },
    zoom: 8,
  });



  addMarker({lat: 16.463713, lng: 107.590866});
  addMarker({ lat: 21.028511, lng: 105.804817 });
  addMarker({ lat: 16.047079, lng: 108.206230 });
  addMarker({ lat: 10.762622, lng: 106.660172 });
  addMarker({ lat: 10.045162, lng: 105.746857 });
  function addMarker(coords) {
      var marker = new google.maps.Marker({
          position: coords,
          map: map,
          
      })
  }
}