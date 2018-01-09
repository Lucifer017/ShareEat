<?php

require_once('..\eloquent\record.php');
require_once('Presenter.php');

class UserController{

    protected $table    = 'info_user';
    protected $id       = 'username';

    public function __construct(){
        $this->response = new Presenter;
        $this->db = new Record;
    }

    public function index(){
      $users = $this->db->get('info_user');
        if(count($users) > 0){
            $arr = array();
            foreach($users as $user){
                $data = array(
                    'id' => $user['username'],
                    'nama' => $user['nama'],
                    'no_hp' => $user['no_hp'],
                    'lokasi' => $user['lokasi'],
                    'password' => $user['password'],
                    'email' => $user['email'],
                    'foto_profil' => $user['foto_profil'],
                    'status' => $user['status'],
                    'waktu_update' => $user['waktu_update']
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function dataUser(){
      $users = $this->db->getU('info_user');
        if(count($users) > 0){
            $arr = array();
            foreach($users as $user){
                $data = array(
                    'id' => $user['username'],
                    'nama' => $user['nama'],
                    'no_hp' => $user['no_hp'],
                    'lokasi' => $user['lokasi'],
                    'password' => $user['password'],
                    'email' => $user['email'],
                    'foto_profil' => $user['foto_profil'],
                    'status' => $user['status'],
                    'waktu_update' => $user['waktu_update']
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function read($id){
        $user = $this->db->read($this->id, $id, $this->table);
        if(count($user) > 0){
            $arr = array();
            foreach($user as $row){
                $data = array(
                    'id' => $row['username'],
                    'nama' => $row['nama'],
                    'no_hp' => $row['no_hp'],
                    'lokasi' => $row['lokasi'],
                    'password' => $row['password'],
                    'email' => $row['email'],
                    'foto_profil' => $row['foto_profil'],
                    'status' => $row['status'],
                    'waktu_update' => $row['waktu_update']
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }else{
          return $x="error!";
        }
    }

    public function add($payload){
        $user = $this->db->add($this->table, $payload);
        if($user){
            $result = array(
                'message' => 'success',
                'attribute' => $payload
            );
        }else{
            $result = array(
                'message' => 'failed'
            );
        }
        return $this->response->json($result);
    }

    public function update($id, $payload){
        $user = $this->db->update($this->table, $this->id, $id, $payload);
        if($user){
            $result = array(
                'message' => 'success',
                'attribute' => $payload
            );
        }else{
            $result = array(
                'message' => 'failed',
            );
        }
       return $this->response->json($result);
    }

    public function delete($id){
        $user = $this->db->delete($this->id, $id, $this->table);
        $result = array(
            'meta' => array(
                'count' => $user
            )
        );
        return $this->response->json($result);
    }

}
