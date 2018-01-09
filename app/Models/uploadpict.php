<?php

  session_start();
  if(!isset($_SESSION['username']) ){
    header("Location: index.php");
  }
  //file properties
  $name = $_FILES["photo"]["name"];
  $type = $_FILES["photo"]["type"];
  $size = $_FILES["photo"]["size"];
  $temp = $_FILES["photo"]["tmp_name"];
  $error = $_FILES["photo"]["error"];
  require_once('../../app/controllers/UserController.php');

  //initialize Class to Object
  $user = new UserController();


  if($error > 0){
    die("Error uploading file! Code $error.");
  }else {
    if($type == "image/png" || $type == "image/jpeg" || $type == "image/jpg"){
      move_uploaded_file($temp,"uploads/".$name);
      $pict = array(
          'foto_profil' => $name
      );
      $user->update($_SESSION['username'],$pict);
      echo "Upload complete!";
      header("Location: profile.php");
    }
    die("Error uploading file! Code $error.");
  }

?>
