<?php
  session_start();
  if(!isset($_SESSION['username']) ){
    header("Location: index.php");
  }

  require 'database.php';

  if(isset($_POST["signupbtn"])){

		if(!empty($_POST['form-first-name']) && !empty($_POST['form-last-name'])
      && !empty($_POST['form-username']) && !empty($_POST['form-phone-number'])
      && !empty($_POST['form-email']) && !empty($_POST['form-password'])
      && !empty($_POST['form-repeat-password'])){
        if($_POST['form-password']===$_POST['form-repeat-password']){

          $inputuser = $conn->prepare("INSERT INTO `info_user` (`username`, `nama`, `no_hp`,
          `password`, `email`) VALUES ('".$_POST['form-username']."', '".$_POST['form-first-name']." ".$_POST['form-last-name']."
          ', '".$_POST['form-phone-number']."', '".md5($_POST['form-password'])."',
          '".$_POST['form-email']."');") ;

          $inputuser->execute();
           // var_dump($user);
          // die($user["user"]);
          echo'
            <script>
              alert("You are succesfully registered!");
            </script>
          ';
        }else {
          echo'
            <script>
              alert("Password doesnt match");
            </script>
          ';
          //header("Location: register.php");
        }


		}else {
      header("Location: register.php");
		}
	}

?>
