function initialize() {
    var position = new google.maps.LatLng(52.4686083, -2.0622515);

    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
      center: position,
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)

    var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"Haden Hill Lesiure Centre"
    });
}

google.maps.event.addDomListener(window, 'load', initialize);
