<?php
  session_start();
	if( isset($_SESSION['username']) ){
		header("Location: dashboard.php");
	}
  require 'database.php';

  if(isset($_POST["signinbtn"])){
		if(!empty($_POST['form-username']) && !empty($_POST['form-password'])){


      $cariuser = $conn->prepare("SELECT * FROM info_user WHERE username='".$_POST['form-username']."'AND password='".$_POST['form-password']."'") ;
      $cariuser->execute();
      $user = $cariuser->fetch(PDO::FETCH_ASSOC);
       // var_dump($user);
      // die($user["user"]);
			$baris = $cariuser->rowCount();
			if($baris > 0 ){
				$_SESSION["username"] = $_POST["form-username"];
				header("Location: dashboard.php");
			} else {
				$peringatan = "<script>alert ('Invalid Username or Password!');</script>";
				echo $peringatan;
			}
		}else {

		}
	}

?>
