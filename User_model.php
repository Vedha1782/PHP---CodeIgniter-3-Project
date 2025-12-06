<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_by_email($email){
        return $this->db->get_where('users', array('email'=>$email))->row();
    }

    public function insert($data){
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
}
