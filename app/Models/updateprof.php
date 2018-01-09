<?php
require_once('../../app/controllers/UserController.php');

//initialize Class to Object
$user = new UserController();

$data = json_decode($user->read($_SESSION['username']));


if(isset($_POST["btn-save"])){
  if (md5($_POST['password0-form'])===$data[0]->password) {

    if(!empty($_POST['name-form'])){
      $dataUp = array(
          'nama' => $_POST['name-form']
      );
      $user->update($_SESSION['username'],$dataUp);
    }

    if(!empty($_POST['username-form'])){
      $dataUp = array(
          'username' => $_POST['username-form']
      );
      $user->update($_SESSION['username'],$dataUp);
    }

    if(!empty($_POST['phone-number-form'])){
      $dataUp = array(
          'no_hp' => $_POST['phone-number-form']
      );
      $user->update($_SESSION['username'],$dataUp);
    }

    if(!empty($_POST['email-form'])){
      $dataUp = array(
          'email' => $_POST['email-form']
      );
      $user->update($_SESSION['username'],$dataUp);
    }

    if($_POST['password1-form']===$_POST['password2-form']){
        // die();
      $dataUp = array(
          'password' => md5($_POST['password1-form'])
      );
      $user->update($_SESSION['username'],$dataUp);
    }

    echo '
      <script>
        alert("Data have been updated!");
      </script>
    ';
  }else{
    echo '
      <script>
        alert("Wrong password! Failed to update data.");
      </script>
    ';
  }

}

$nm = $data[0]->nama;
// $textName = explode(" ",$nm);
// $firstName = $textName[0];
// $lastName = $textName[1];
$email = $data[0]->email;
$phoneNumber = $data[0]->no_hp;
$upTime = $data[0]->waktu_update;
?>
