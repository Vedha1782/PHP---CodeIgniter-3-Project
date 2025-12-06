<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user_id')) redirect('auth/login');
        $this->load->model(array('Employee_model','Address_model'));
    }

    public function index(){
        $data['states'] = $this->Employee_model->get_states();
        $this->load->view('employee_list', $data);
    }

    public function fetch_employees(){
        $search = $this->input->post('search');
        $page = intval($this->input->post('page')) ?: 1;
        $per_page = 5;
        $result = $this->Employee_model->get_paginated($search, $page, $per_page);
        echo json_encode($result);
    }

    public function create(){
        $data['states'] = $this->Employee_model->get_states();
        $this->load->view('employee_form', $data);
    }

    public function save(){
        $post = $this->input->post(NULL, TRUE);
        // basic mapping
        $emp = array(
            'fname' => $post['fname'] ?? '',
            'mname' => $post['mname'] ?? '',
            'lname' => $post['lname'] ?? '',
            'gender'=> $post['gender'] ?? '',
            'mail'  => $post['mail'] ?? '',
            'mobile_no' => $post['mobile_no'] ?? '',
            'date_of_birth' => $post['date_of_birth'] ?? '',
            'status' => isset($post['status']) ? 1 : 0
        );
        $eid = $this->Employee_model->insert_employee($emp);

        if(isset($post['address']) && is_array($post['address'])){
            foreach($post['address'] as $a){
                $a['employee_id'] = $eid;
                $this->Address_model->insert_address($a);
            }
        }

        redirect('employee');
    }

    public function get_cities(){
        $state_id = $this->input->post('state_id');
        $cities = $this->Employee_model->get_cities($state_id);
        echo json_encode($cities);
    }
}
