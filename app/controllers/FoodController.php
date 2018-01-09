<?php

require_once('..\eloquent\record.php');
require_once('Presenter.php');

class FoodController{

    protected $table    = 'makanan';
    protected $id       = 'id_makanan';
    protected $idp       = 'username_pemberi';

    public function __construct(){
        $this->response = new Presenter;
        $this->db = new Record;
    }

    public function index(){
      $makanan = $this->db->get('makanan');
        if(count($makanan) > 0){
            $arr = array();
            foreach($makanan as $mkn){
                $data = array(
                    'id_makanan' => $mkn['id_makanan'],
                    'username_pemberi' => $mkn['username_pemberi'],
                    'nama_makanan' => $mkn['nama_makanan'],
                    'foto_makanan' => $mkn['foto_makanan'],
                    'porsi_makanan' => $mkn['porsi_makanan'],
                    'waktu_up' => $mkn['waktu_up'],
                    'keterangan' => $mkn['keterangan'],

                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    // public function dataUser(){
    //   $users = $this->db->getU('info_user');
    //     if(count($users) > 0){
    //         $arr = array();
    //         foreach($users as $user){
    //             $data = array(
    //                 'id' => $user['username'],
    //                 'nama' => $user['nama'],
    //                 'no_hp' => $user['no_hp'],
    //                 'lokasi' => $user['lokasi'],
    //                 'password' => $user['password'],
    //                 'email' => $user['email'],
    //                 'foto_profil' => $user['foto_profil'],
    //                 'status' => $user['status'],
    //                 'waktu_update' => $user['waktu_update']
    //             );
    //             array_push($arr, $data);
    //         }
    //         return $this->response->json($arr);
    //     }
    // }

    public function read($id){
        $makanan = $this->db->read($this->id, $id, $this->table);
        if(count($makanan) > 0){
            $arr = array();
            foreach($makanan as $mkn){
                $data = array(
                    'id_makanan' => $mkn['id_makanan'],
                    'username_pemberi' => $mkn['username_pemberi'],
                    'nama_makanan' => $mkn['nama_makanan'],
                    'foto_makanan' => $mkn['foto_makanan'],
                    'porsi_makanan' => $mkn['porsi_makanan'],
                    'waktu_up' => $mkn['waktu_up'],
                    'keterangan' => $mkn['keterangan'],

                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }else{
          return $x="error!";
        }
    }

    public function readBy($idp){
        $makanan = $this->db->read($this->idp, $idp, $this->table);
        if(count($makanan) > 0){
            $arr = array();
            foreach($makanan as $mkn){
                $data = array(
                    'id_makanan' => $mkn['id_makanan'],
                    'username_pemberi' => $mkn['username_pemberi'],
                    'nama_makanan' => $mkn['nama_makanan'],
                    'foto_makanan' => $mkn['foto_makanan'],
                    'porsi_makanan' => $mkn['porsi_makanan'],
                    'waktu_up' => $mkn['waktu_up'],
                    'keterangan' => $mkn['keterangan'],

                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }else{
          return $x="error!";
        }
    }

    public function add($payload){
        $makanan = $this->db->add($this->table, $payload);
        if($makanan){
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
        $makanan = $this->db->update($this->table, $this->id, $id, $payload);
        if($makanan){
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
        $makanan = $this->db->delete($this->id, $id, $this->table);
        $result = array(
            'meta' => array(
                'count' => $makanan
            )
        );
        return $this->response->json($result);
    }

}
