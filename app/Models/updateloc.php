<?php

  session_start();
  if(!isset($_SESSION['username']) ){
    header("Location: index.php");
  }

  require 'database.php';

  if(!empty($_POST['latitude']) && !empty($_POST['longitude']))  {
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];
    $updatecoord = $conn->prepare("UPDATE info_user SET lokasi='{lat:".$lat.",lng:".$lng."}' WHERE username='".$_SESSION['username']."'") ;
    // print_r($updatecoord);die();
    $updatecoord->execute();
  }else{
    echo 'gagal';
  }

?>
