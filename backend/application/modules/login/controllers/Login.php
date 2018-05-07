<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/20/17
 * Time: 1:59 PM
 */

class Login extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('login/sign-in');
    }

    public function authenticateLogin(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        }else {
            $data = array(
                'email' => $this->input->post('email', TRUE),
                'password' => sha1($this->input->post('password', TRUE)),
                'is_active'  => 1
            );
            $result = $this->LoginModel->login($data);
            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->LoginModel->fetchAdmin($email);
                if ($result != false) {
                    $adminData = array(
                        'user_id' => $result[0]->admin_id,
                        'email' => $result[0]->email,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata('logged_in', $adminData);
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger">Wrong username or password, Please try again!</div>');
                redirect('login');
            }
        }
    }


}