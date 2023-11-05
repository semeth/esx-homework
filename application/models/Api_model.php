<?php

class Api_model extends CI_Model{
    public function get_users($id = null){
        $conditions = '';
        if($id !== null){
            $conditions = ' WHERE id = ' . $id;
        }
        $data = $this->db->query('SELECT id, firstname, lastname, email, flagged FROM users' . $conditions)->result();
        return $data;
    }


    public function delete_soft_delete($id){
        $this->db->where('id', $id);
        $this->db->update('users', array('flagged' => 1));
    }

    public function activate_soft_delete($id){
        $this->db->where('id', $id);
        $this->db->update('users', array('flagged' => 0));
    }

    public function delete_hard_delete($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}