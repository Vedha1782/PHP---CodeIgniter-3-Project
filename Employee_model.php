<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function get_states(){
        return $this->db->get('states')->result();
    }

    public function get_cities($state_id){
        return $this->db->get_where('cities', array('state_id'=>$state_id))->result();
    }

    public function insert_employee($data){
        $this->db->insert('employee', $data);
        return $this->db->insert_id();
    }

    public function get_paginated($search, $page, $per_page){
        $this->db->select('*');
        if($search){
            $this->db->group_start();
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('mail', $search);
            $this->db->or_like('mobile_no', $search);
            $this->db->group_end();
        }
        $total = $this->db->count_all_results('employee', FALSE);
        $offset = ($page-1)*$per_page;
        $this->db->limit($per_page, $offset);
        $rows = $this->db->get()->result();

        // Prepare simple HTML rows (for demo)
        $html = '';
        foreach($rows as $r){
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($r->fname . ' ' . $r->lname) . '</td>';
            $html .= '<td>' . htmlspecialchars($r->gender) . '</td>';
            $html .= '<td>' . htmlspecialchars($r->mail) . '</td>';
            $html .= '<td>' . htmlspecialchars($r->mobile_no) . '</td>';
            $html .= '</tr>';
        }

        $pages = ceil($total / $per_page);
        $pagination = array(
            'current' => $page,
            'total' => $pages
        );

        return array('rows' => $html, 'pagination' => $pagination);
    }
}
