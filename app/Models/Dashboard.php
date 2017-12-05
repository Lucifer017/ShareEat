<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['username']) ){
    header("Location: index.php");
  }
?>
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
    <?php
      require 'database.php';
      $carilokasi = $conn->prepare("SELECT lokasi FROM info_user WHERE username='LuciferQueen'") ;
      $carilokasi->execute();
      $lokasi = $carilokasi->fetch(PDO::FETCH_ASSOC);
      //  var_dump($lokasi);
      // die($lokasi["lokasi"]);
     ?>
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
      var infoWindow;

      function initMap(){

        var map = new google.maps.Map(document.getElementById('map'),{
          zoom:15,
          center:{lat: -34.397, lng: 150.644}
        });

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {

            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var map = new google.maps.Map(document.getElementById('map'),{
              zoom:15,
              center:{lat: pos.lat, lng: pos.lng}
            });

            var marker = [
              {
                coords:{lat: pos.lat, lng: pos.lng },
                iconImage:'https://i.imgur.com/tquMa3E.png',
                content:'<h1>Irfan Firdaus</h1>'
              },
              {
                coords:<?php echo $lokasi["lokasi"]; ?>,
                iconImage:'https://i.imgur.com/RrJxXhq.png',
                content:'<h1>Habib</h1>'
              }
            ];

            for(var i = 0; i<marker.length;i++){
              addMarker(marker[i]);
            }

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
            // var marker = new google.maps.Marker({
            //     position: {lat: pos.lat, lng: pos.lng },
            //     map: map,
            //     icon:'https://i.imgur.com/tquMa3E.png'
            // });
          },

          function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        }else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        // var option = {
        //   zoom:15,
          // center:<?php echo $lokasi["lokasi"]; ?>
        // }
        // map = new google.maps.Map(document.getElementById('map'), option);

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
        // google.maps.event.addListener(map, 'click',
        //   function(event){
        //     addMarker({coords:event.latLng});
        //   }
        // );

        //Array Marker


        // Panggil marker
        // for(var i = 0; i<marker.length;i++){
        //   addMarker(marker[i]);
        // }
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
        // function addMarker(obj){
        //   var marker = new google.maps.Marker({
        //       position: obj.coords,
        //       map: map,
        //       // icon:obj.iconImage
        //     });
        //
        //     if(obj.iconImage){
        //       marker.setIcon(obj.iconImage);
        //     }
        //
        //     if(obj.content){
        //       var infoWindow = new google.maps.InfoWindow({
        //         content:obj.content
        //       })
        //
        //       marker.addListener('click', function(){
        //         infoWindow.open(map, marker);
        //       });
        //     }
        // }
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <a href="logout.php">Logout</a>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h1HvvQEbhRiwxONvAQnDlquHFCBxpr4&callback=initMap">
    </script>
  </body>
</html>
