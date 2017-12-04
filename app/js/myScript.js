$(document).ready(function(){
  if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition(success);
  else
    $("p").html("HTML5 ");
});

function succcess(position){
  $("p").html("Latitude: "+position.coords.latitude+
          "<br>Longtitude: "+position.coords.longtitude+
          "<br>Accuracy: "+position.coords.accuracy);
}
