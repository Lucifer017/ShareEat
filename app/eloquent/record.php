<?php
/**
* Active Record For Minimalize type the query
* @author Danis Yogaswara <danistutorial@gmail.com>
*/

require_once('..\config\database.php');

class Record{
    // $table='users';
    /**
    * initialize connection from class connection
    * return Connection
    */
    public function __construct(){
        $this->connection = new Database;
    }

    /**
    * Method for minimalize mysqli_query
    * @param Argument
    * @return query
    */
    private function query($argument){
        return mysqli_query($this->connection->getConnection(), $argument);
    }

    /**
    * Active Record for select data in database
    * @param $table
    * @return all
    **/
    public function get($table){
        $query = "SELECT * FROM ".$table;
        return $this->query($query);
    }

    public function getU($table){
        $query = "SELECT * FROM ".$table." WHERE status = 1";
        return $this->query($query);
    }

    /**
    * Select data from database by id
    * @param $id, $table
    * @return data
    */
    public function read($param, $id, $table){
        $query = "SELECT * FROM ".$table." WHERE ".$param." = '".$id."'";
      //  $query = "SELECT * FROM '.$table.' WHERE '.$param.' = '".$id."'";
        return $this->query($query);
    }

    /**
    * Insert data to database
    * @param $payload Array
    * @return void
    */
    public function add($table, $payload){
        $prep = array();
        foreach($payload as $k => $v ) {
            $prep["'".$v."'"] = $v;
        }
        $query = "INSERT INTO ".$table." (" . implode(', ',array_keys($payload)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")";
        return $this->query($query);
    }

    /**
    * Update Data from Database
    * @param $id, $payload
    * @return void
    */
    public function update($table, $param, $id, $array){
        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                $value = "'$value'";
                $updates[] = "$key = $value";
            }
        }
        $implodeArray = implode(', ', $updates);
        $query = ("UPDATE ".$table." SET ".$implodeArray." WHERE ".$param."='".$id."'");
        // $query = ("UPDATE ".$table." SET ". $implodeArray." WHERE ".$param."=".$id);
        return $this->query($query);
    }

    /**
    * Delete data from database
    * @param $id
    * @return void
    */
    public function delete($param, $id, $table){
        $query = "DELETE FROM ".$table." WHERE ".$param." = ".$id;
        return $this->query($query);
    }
}
