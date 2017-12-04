<?php
/*
Author : Muhammad Nur Yasir Utomo
Email : yasirutomo@gmail.com
Web : http://www.yasirblog.com
*/

 define('db_host','localhost');
 define('db_user','root');
 define('db_pass','');
 define('db_name','gmaps');

 mysqli_connect(db_host,db_user,db_pass);
 mysqli_select_db(db_name);

?>
