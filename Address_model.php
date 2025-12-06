<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {

    public function insert_address($data){
        $this->db->insert('address', $data);
        return $this->db->insert_id();
    }
}
