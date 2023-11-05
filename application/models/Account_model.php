<?php

class Account_model extends CI_Model{
    public function insertUser($data){
        $this->db->insert('users', $data);
    }

    public function getUserByEmail($email){
        $user = $this->db->get_where('users', array('email'=> $email));
        if($user->row() != NULL){
            return $user->row();
        }else{
            return NULL;
        }
        
    }
}