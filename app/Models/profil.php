<?php

require_once('../../app/controllers/FoodController.php');

//initialize Class to Object
$food = new FoodController();

//get add data
// echo "Fungsi Index (SELECT *) : ". $food->index();
// var_dump($user->index());
// echo '<br>';
// //get one data by id
// echo "Fungsi Read By ID : ".$food->read(1);
// echo($user->read('irfan'));
// $data=json_decode($user->read('irfan'));
// print_r ($data);
// die();
//
// //add Data
$data1 = array(

    'username_pemberi' => 'tape',
    'nama_makanan' => 'Ayam Goreng Cinnn',
    'foto_makanan' => 'AyamGoreng.jpg',
    'porsi_makanan' => 10,
    'keterangan' => 'Kalo mau cepetan ambil ya kang',

);
$data = array(

    'username_pemberi' => 'tape',
    'nama_makanan' => 'Ayam Cincang Cinnn',
    'foto_makanan' => 'AyamCincang.jpg',
    'porsi_makanan' => 20,
    'keterangan' => 'Kalo mau cepetan ambil ya kang',

);
echo '<br> Berhasil Insert '.$food->add($data1);
//
// // //update data
// $data1 = array(
//     'first_name' => 'Irfan',
//     'last_name' => 'Firdaus',
//     'username' => 'danis24',
//     'email' => 'suckhack24@gmail.com'
// );
echo '<br> Berhasil Update '.$food->update(1,$data);
//
// //
// // //delete Data
echo '<br> Berhasil Delete'.$food->delete(1);
