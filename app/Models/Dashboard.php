<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['username']) ){
    header("Location: index.php");
  }
  require 'database.php';

  require_once('../../app/controllers/UserController.php');
  require_once('../../app/controllers/FoodController.php');

  //initialize Class to Object
  $user = new UserController();
  $food = new FoodController();

  $Fdata = json_decode($food->index());

  $nmmakanan = $Fdata[0]->nama_makanan;
  // $foto = $Fdata[0]-

  $data = json_decode($user->read($_SESSION['username']));
  $data1 = json_decode($user->dataUser($_SESSION['username']));
  $nm = $data[0]->nama;
  // $textName = explode(" ",$nm);
  // $firstName = $textName[0];
  // $lastName = $textName[1]." ".$textName[2]." ".$textName[3];
  // $email = $data[0]->email;
  // $phoneNumber = $data[0]->no_hp;
  $upTime = $data[0]->waktu_update;

?>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
     #map {
      height: 350px;
      width: 100%;
     }
     #lat,#lng {
      display: none;
     }
  </style>
    <!-- snip -->
  <div id="dom-target" style="display: none;">
      <?php
          $output = $nm; //Again, do some operation, get the output.
          echo htmlspecialchars($output); /* You have to escape because the result
                                             will not be valid HTML otherwise. */
      ?>
  </div>
  <script>
      var div = document.getElementById("dom-target");
      var user = div.textContent;
  </script>
  <!-- snip -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard || ShareEat</title>
  <!-- Bootstrap core CSS-->
  <link href="assets_dashboard/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets_dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets_dashboard/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets_dashboard/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">ShareEat</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="foodSharing">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cutlery"></i>
            <span class="nav-link-text">Food Sharing</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="foodSharing.php">Upload Food</a>
            </li>
            <li>
              <a href="foodInventory.php">Food Inventory</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cutlery"></i>
            <span class="nav-link-text">I'm Hungry</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="hungry.php">Order Food</a>
            </li>
            <li>
              <a href="orderHistory.php">Order History</a>
            </li>
          </ul>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Navbar</a>
            </li>
            <li>
              <a href="cards.html">Cards</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="profile.php">
          Hai! <?php echo $nm; ?></a>
        </li>
        <li class="nav-item">
          <!-- <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-map-marker" ></i> Your Location
        </div>
        <div class="card-body">
          <div id="map"></div>
          <!-- <div id="df">dsfdsf</div>
          <canvas id="mapc" width="100%" height="30">dsfds</canvas> -->
        </div>
        <div class="card-footer small text-muted">Updated <?php echo $upTime; ?></div>
      </div>

      <div id="lat"></div>
      <div id="lng"></div>
      <div style = "margin-bottom:20px;"class="input-group">
        <button onclick="validasi()" id="tombol" class="btn btn-primary" type="button">Update your location?</button>

      </div>
      <div class="input-group">

      </div>
      <script>
        function validasi() {
            swal("Success!", "Your location has been updated!", "success");
        }
      </script>
      <?php
        require 'database.php';
        $carilokasi = $conn->prepare("SELECT * FROM info_user WHERE status=1") ;
        $carilokasi->execute();
        $lokasi = $carilokasi->fetch(PDO::FETCH_ASSOC);
         // var_dump($lokasi);
        // var_dump($lokasi["lokasi"]);
       ?>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © ShareEat 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>

      <!-- <input type="text" name="user" value="<?php echo $nm; ?>" id="user"/> -->

    </div>
    <!-- map initialize JavaScript -->
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

            $(document).ready(function(){
              $('#tombol').click(function(){
                $.ajax({
                  method: "POST",
                  url: "updateloc.php",
                  data: {
                    latitude:pos.lat,
                    longitude:pos.lng
                  }
                }).done(function(data2, data3){
                  $('#lat').html(data2),
                  $('#lng').html(data3)
                });
              });
            });

            var map = new google.maps.Map(document.getElementById('map'),{
              zoom:15,
              center:{lat: pos.lat, lng: pos.lng}
            });

            var marker = [
              {
                coords:{lat: pos.lat, lng: pos.lng },
                iconImage:'https://i.imgur.com/tquMa3E.png',
                content:"<h2>"+user+"</h2>"
              },

              // <?php
              // for($i=0; $i<100; $i++){
              //   if($data1[i]->username==$_SESSION['username'] || $data1[i]->nama==""){
              //
              //   }else{
              //     echo '{';
              //       echo 'coords:'.$data1[i]->lokasi.',';
              //       echo "iconImage:'https://i.imgur.com/RrJxXhq.png',";
              //       echo 'content:"<h2>'.$data1[i]->nama.'</h2>"';
              //     echo '},';
              //   }
              // }
              //
              //
              // ?>


              {
                coords:<?php echo $data1[0]->lokasi; ?>,
                iconImage:'https://i.imgur.com/RrJxXhq.png',
                content:"<h2><?php echo $data1[0]->nama; ?></h2>"
              },
              {
                coords:<?php echo $data1[1]->lokasi; ?>,
                iconImage:'https://i.imgur.com/RrJxXhq.png',
                content:"<h2><?php echo $data1[1]->nama; ?></h2>"
              },
              {
                coords:<?php echo $data1[2]->lokasi; ?>,
                iconImage:'https://i.imgur.com/RrJxXhq.png',
                content:"<h2><?php echo $data1[2]->nama; ?></h2>"
              },
              {
                coords:<?php echo $data1[3]->lokasi; ?>,
                iconImage:'https://i.imgur.com/RrJxXhq.png',
                content:"<h2><?php echo $data1[3]->nama; ?></h2>"
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
    <!-- Bootstrap core JavaScript-->
    <script src="assets_dashboard/jquery/jquery.min.js"></script>
    <script src="assets_dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets_dashboard/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="assets_dashboard/chart.js/Chart.min.js"></script>
    <script src="assets_dashboard/datatables/jquery.dataTables.js"></script>
    <script src="assets_dashboard/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets_dashboard/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="assets_dashboard/js/sb-admin-datatables.min.js"></script>
    <script src="assets_dashboard/js/sb-admin-charts.min.js"></script>
  </div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h1HvvQEbhRiwxONvAQnDlquHFCBxpr4&callback=initMap">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
