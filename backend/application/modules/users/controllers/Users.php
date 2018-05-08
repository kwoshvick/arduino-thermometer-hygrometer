<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/20/17
 * Time: 6:54 PM
 */

class Users extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        echo modules::run('general/General/isLoggedIn');
    }

    public function addfarmer(){
        $data = array(
            'title' => 'Add Farmer',
            'view' => 'users/add_farmer',
            'breadcrumb' => 'Add farmer'
        );
        $this->load->view('general/template',$data);
    }

    public function addFarmerDetails(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        if ($this->form_validation->run() == false) {
            $this->addfarmer();
        } else {
            if ($this->UsersModel->checkPhone($this->input->post('phone'))) {
                $message = 'Phone Number Already Exists !';
                $this->session->set_flashdata('flash', '<div class="alert alert-danger">' . $message . '</div>');
                $this->addfarmer();
            } else {
                $data = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'phone' => $this->input->post('phone'),
                    'location' => $this->input->post('location')
                );
                Modules::run('general/insertData', 'farmer',$data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success">' . 'Farmer added successfully' . '</div>');
                $this->searchFarmer();
             }
        }
    }

    public function editFarmerDetails($id){
        $data = array(
            'title' => 'Edit Farmer',
            'view' => 'users/edit_farmer',
            'breadcrumb' => 'Edit Farmer'
        );
        $condition = array(
            'farmer_id' => $id
        );
        $data['farmer_details'] = Modules::run('general/selectData', 'farmer',$condition);
        $this->load->view('general/template',$data);
    }

    public function updateFarmerDetails($id){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        if ($this->form_validation->run() == false) {
            $this->editFarmerDetails($id);
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'phone' => $this->input->post('phone'),
                'location' => $this->input->post('location')
            );
            Modules::run('general/updateData', 'farmer',$data,'farmer_id',$id);
            $this->session->set_flashdata('flash', '<div class="alert alert-success">' . 'Farmer updated successfully' . '</div>');
            redirect('users/searchFarmer');
        }
    }

    public function searchFarmer(){
        $data = array(
            'title' => 'Search Farmer',
            'view' => 'users/search_farmer',
            'breadcrumb' => 'Search Farmer'
        );
        $data['farmers'] = Modules::run('general/selectData', 'farmer');
        $this->load->view('general/template',$data);
    }
}