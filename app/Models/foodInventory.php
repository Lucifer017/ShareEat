<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['username']) ){
    header("Location: index.php");
  }
  require_once('../../app/controllers/UserController.php');

  //initialize Class to Object
  $user = new UserController();

  $data = json_decode($user->read($_SESSION['username']));

  if(isset($_POST["btn-save"])){
    unset($_POST['btn-save']);
    // var_dump($_POST['btn-save']);die();
    if (md5($_POST['password0-form'])===$data[0]->password) {

      // if(!empty($_POST['first-name-form']) && !empty($_POST['last-name-form'])
      //   && !empty($_POST['username-form']) && !empty($_POST['phone-number-form'])
      //   && !empty($_POST['email-form']) && !empty($_POST['password1-form'])
      //   && !empty($_POST['password2-form']) && !empty($_POST['password0-form'])){
          if($_POST['password1-form']===$_POST['password2-form']){
            // die();
            $dataUp = array(
                'username' => $_POST['username-form'],
                'nama' => $_POST['first-name-form']." ".$_POST['last-name-form'],
                'no_hp' => $_POST['phone-number-form'],
                'password' => md5($_POST['password1-form']),
                'email' => $_POST['email-form']
            );
            $x=$user->update($_SESSION['username'],$dataUp);
            // var_dump($x);die();
            echo '
              <script>
                alert("Data have been updated!");
              </script>
            ';
          }else{
            echo '
              <script>
                alert("Failed to update data!");
              </script>
            ';
          }
  		// }else {
      //   echo '
      //     <script>
      //       alert("Error!", "Please fill in all field!", "error");
      //     </script>
      //   ';
  		// }
    }else {
      echo '
        <script>
          alert("Wrong Username or Password!");
        </script>
      ';
    }

	}

  $data = json_decode($user->read($_SESSION['username']));
  $nm = $data[0]->nama;
  $textName = explode(" ",$nm);
  $firstName = $textName[0];
  $lastName = $textName[1];
  $email = $data[0]->email;
  $phoneNumber = $data[0]->no_hp;
  $upTime = $data[0]->waktu_update;

?>
<html lang="en">

<head>

  <style>
     #profileimg{
       width: 200px;
       height: 250px;
     }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Profile || ShareEat</title>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Hungry">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cutlery"></i>
            <span class="nav-link-text">I'm Hungry</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
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
        <li class="breadcrumb-item active">My Inventory</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-cutlery" ></i> Food Inventory
        </div>
        <div class="card-body">

          <div class="container">
            <h2>Edit the food data</h2>
            <hr>
            <div class="row">
              <!-- left column -->
              <div class="col-md-3">
                <div class="text-center">
                  <img id="profileimg" src="uploads/<?php echo $data[0]->foto_profil ?>" class="avatar img-circle" alt="avatar">
                  <h6>Upload a different photo...</h6>
                  <form action="uploadpict.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="photo">
                    <input onclick="validasi()" class="btn btn-primary" type="submit" name="upload" value="Upload">

                    <script>
                      function validasi() {
                          swal("Success!", "Your picture has been uploaded!", "success");
                      }
                    </script>

                  </form>
                </div>
              </div>

              <!-- edit form column -->
              <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a>
                  <div id="allert">
                    <i class="fa fa-coffee"></i>
                    Fill out the form below!
                  </div>

                </div>
                <h3>Food information</h3>

                <!-- <form class="form-horizontal" role="form" method="POST" action="profile.php"> -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                      <input name="first-name-form" class="form-control" value="<?php echo $firstName ?>" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                      <input name="last-name-form" class="form-control" value="<?php echo $lastName ?>" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                      <input name="email-form" class="form-control" value="<?php echo $email ?>" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                      <input name="username-form" class="form-control" value="<?php echo $_SESSION['username'] ?>" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label">No Handphone:</label>
                    <div class="col-lg-8">
                      <input name="phone-number-form" class="form-control" value="<?php echo $phoneNumber ?>" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Old Password:</label>
                    <div class="col-md-8">
                      <input name="password0-form" class="form-control" placeholder="" type="password" id="password1">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">New Password:</label>
                    <div class="col-md-8">
                      <input name="password1-form" class="form-control" placeholder="" type="password" id="password1">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                      <input name="password2-form" onChange="checkPasswordMatch();" class="form-control" placeholder="" type="password" id="password2">
                    </div>

                    <script type="text/javascript">
                    function checkPasswordMatch() {
                      var password = $("#password1").val();
                      var confirmPassword = $("#password2").val();

                      if (password != confirmPassword)
                          $("#allert").html("Password doesn't match!");
                      else
                          $("#allert").html("Password match.");
                    }
                    </script>

                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <input class="btn btn-primary" value="Save Changes" type="submit" name="btn-save">
                      <span></span>
                      <input class="btn btn-default" value="Cancel" type="reset">
                    </div>
                  </div>
                </form>
              </div>
          </div>
          </div>
          <hr>

        </div>
        <div class="card-footer small text-muted">Updated <?php echo $upTime ?></div>
      </div>

      <!-- <div id="lat"></div>
      <div id="lng"></div>
      <div class="input-group">
        <button id="tombol" class="btn btn-primary" type="button">Update lokasi!</button>
      </div> -->

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
    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </div>

</body>

</html>
