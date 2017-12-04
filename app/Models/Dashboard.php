<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>ShareEat</h3>
    <div id="map"></div>
    <script>
      // function initMap() {
      //   var uluru = {lat: -6.9313, lng: 107.7173 };
      //   var map = new google.maps.Map(document.getElementById('map'), {
      //     zoom: 15,
      //     center: uluru
      //   });
      //   var marker = new google.maps.Marker({
      //     position: uluru,
      //     map: map
      //   });
      // }
      function initMap(){
        var option = {
          zoom:15,
          center:{lat: -6.9313, lng: 107.7173 }
        }
        var map = new
        google.maps.Map(document.getElementById('map'), option);
        /*
        var marker = new google.maps.Marker({
            position: {lat: -6.9313, lng: 107.7173 },
            map: map,
            icon:'https://i.imgur.com/JS1IJYx.png'
          });

        var infoWindow = new google.maps.InfoWindow({
          content:'<h1>Irfan Firdaus</h1>'
        })

        marker.addListener('click', function(){
          infoWindow.open(map, marker);
        });*/

        // Click map
        google.maps.event.addListener(map, 'click',
          function(event){
            addMarker({coords:event.latLng});
          }
        );

        //Array Marker
        var marker = [
          {
            coords:{lat: -6.9313, lng: 107.7173},
            iconImage:'https://i.imgur.com/tquMa3E.png',
            content:'<h1>Irfan Firdaus</h1>'
          },
          {
            coords:{lat: -6.9270, lng: 107.7162},
            iconImage:'https://i.imgur.com/RrJxXhq.png',
            content:'<h1>Habib</h1>'
          }
        ];

        // Panggil marker
        for(var i = 0; i<marker.length;i++){
          addMarker(marker[i]);
        }
        // addMarker({
        //   coords:{lat: -6.9313, lng: 107.7173},
        //   iconImage:'https://i.imgur.com/tquMa3E.png',
        //   content:'<h1>Irfan Firdaus</h1>'
        //   });
        // addMarker({
        //   coords:{lat: -6.9270, lng: 107.7162},
        //   iconImage:'https://i.imgur.com/RrJxXhq.png',
        //   content:'<h1>Habib</h1>'
        // });

        // Add Marker Fuction
        function addMarker(obj){
          var marker = new google.maps.Marker({
              position: obj.coords,
              map: map,
              // icon:obj.iconImage
            });

            if(obj.iconImage){
              marker.setIcon(obj.iconImage);
            }

            if(obj.content){
              var infoWindow = new google.maps.InfoWindow({
                content:obj.content
              })

              marker.addListener('click', function(){
                infoWindow.open(map, marker);
              });
            }
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h1HvvQEbhRiwxONvAQnDlquHFCBxpr4&callback=initMap">
    </script>
  </body>
</html>