<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/20/17
 * Time: 6:54 PM
 */

class General extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('GeneralModel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function insertData($table,$data){
        $this->GeneralModel->_insert($table, $data);
    }

    public function insertReturnid($table,$data){
        $id = $this->GeneralModel->_insertReturnId($table, $data);
        return $id;
    }

    public function selectData($table,$condition = null,$order  = null){
        return $this->GeneralModel->_select($table, $condition , $order );
    }

    public function error(){
        $this->load->view('general/404');
    }

    public function isLoggedIn(){
        if(!isset($this->session->logged_in)){
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            $this->load->view('login/sign-in');
            die();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $this->load->view('login/sign-in');
    }

    public function updateData($table, $data, $whereField, $whereId){
        $this->GeneralModel->_update($table, $data, $whereField, $whereId);
    }

}