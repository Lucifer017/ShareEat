<?php

class Database{
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $db = 'shareeat';

    /**
    * Create Connection to database with mysqli_connect
    * @return $con
    **/
    public function getConnection(){
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->db);

        if(mysqli_connect_errno()){
            echo "Failed connect to Mysql ".mysqli_connect_errno();
        }

        return $con;
    }
}
