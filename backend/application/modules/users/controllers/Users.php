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

    public function adduser(){
        $data = array(
            'title' => 'Add User',
            'view' => 'users/add_user',
            'breadcrumb' => 'Add User'
        );
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $data['roles'] = Modules::run('general/selectData', 'admin_roles');
        $data['locations'] = Modules::run('general/selectData', 'location');
        $this->load->view('general/template',$data);
    }

    public function adduserDetails(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('idno', 'ID Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm]|min_length[7]|max_length[15]');
        $this->form_validation->set_rules('confirm', 'Confirm ', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->adduser();
        } else {
            if ($this->UsersModel->checkEmail($this->input->post('email'))) {
                $message = 'Email Already Exists !';
                $this->session->set_flashdata('flash', '<div class="alert alert-danger">' . $message . '</div>');
                $this->adduser();
            } else {
                $data = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'admin_role_id' => $this->input->post('role'),
                    'location_id' => $this->input->post('location'),
                    'id_no' => $this->input->post('idno'),
                    'password' => sha1($this->input->post('password')),
                );
                Modules::run('general/insertData', 'admin',$data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success">' . 'User added successfully' . '</div>');
                $this->searchUser();
             }
        }
    }

    public function editUserDetails($id){
        $data = array(
            'title' => 'Edit User',
            'view' => 'users/edit_user',
            'breadcrumb' => 'Edit User'
        );
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $condition2 = array(
            'admin_id' => $id
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $data['user_details'] = $this->UsersModel->getUser($condition2);
        $data['roles'] = Modules::run('general/selectData', 'admin_roles');
        $data['locations'] = Modules::run('general/selectData', 'location');
        $this->load->view('general/template',$data);

    }

    public function updateUserDetails($id){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('idno', 'ID Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->editUserDetails($id);
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'admin_role_id' => $this->input->post('role'),
                'location_id' => $this->input->post('location'),
                'id_no' => $this->input->post('idno')
            );
            Modules::run('general/updateData', 'admin',$data,'admin_id',$id);
            $this->session->set_flashdata('flash', '<div class="alert alert-success">' . 'User added successfully' . '</div>');
            redirect('users/searchUser');
        }

    }

    public function searchUser(){
        $data = array(
            'title' => 'Search User',
            'view' => 'users/search_user',
            'breadcrumb' => 'Search User'
        );
        $data['users'] = $this->UsersModel->searchUser();
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $this->load->view('general/template',$data);
    }

    public function profile(){
        $data = array(
            'title' => 'Profile',
            'view' => 'users/profile',
            'breadcrumb' => 'Profile Details'
        );
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $this->load->view('general/template',$data);
    }

    public function changePassword(){
        $data = array(
            'title' => 'Change Password',
            'view' => 'users/change_password',
            'breadcrumb' => 'Change Password'
        );
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $this->load->view('general/template',$data);
    }

    public function activate($id){
        $condition= array(
            'admin_id'=>$id
        );
        $user = Modules::run('general/selectData', 'admin',$condition);
        if($user[0]->is_active == 0){
            $active = 1;
        }else{
            $active = 0;
        }
        $data = array(
            'is_active' => $active
        );
        echo Modules::run('general/updateData', 'admin',$data,'admin_id', $id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success">Successfully changed</div>');
        $this->searchUser();
    }

    public function updatePassword()
    {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('password', 'New password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->changePassword();
        } else {
            $condition = array(
                'email' => $this->session->logged_in['email']
            );
            $thePassword = $this->UsersModel->getField('admin', $condition, 'password');
            $currentPassword = sha1($this->input->post('current_password'));
            if ($thePassword[0]->password == $currentPassword) {
                $data = array(
                    'password' => sha1($this->input->post('password')),
                );
                echo Modules::run('general/updateData', 'admin',$data,'email', $this->session->logged_in['email']);
                $this->session->set_flashdata('flash', '<div class="alert alert-success">Password Successfully changed</div>');
                $this->changePassword();
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger">You Enter the wrong Current Password</div>');
                $this->changePassword();
            }
        }
    }

    public function addLocation(){
        $data = array(
            'title' => 'Add Location',
            'view' => 'users/add_location',
            'breadcrumb' => 'New Add Location'
        );
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $this->load->view('general/template',$data);
    }

    public function addNewLocation(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        if ($this->form_validation->run() == false) {
            $this->addLocation();
        } else {
            if ($this->UsersModel->checkLocation($this->input->post('location'))) {
                $message = 'Location Already Exists !';
                $this->session->set_flashdata('flash', '<div class="alert alert-danger">' . $message . '</div>');
                $this->addLocation();
            } else {
                $data = array(
                    'location_name' => $this->input->post('location'),
                    'location_phone' => $this->input->post('phone')
                );
                Modules::run('general/insertData', 'location',$data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success">' . 'Location added successfully' . '</div>');
                redirect('users/searchLocation');
            }
        }
    }

    public function searchLocation(){
        $data = array(
            'title' => 'Search Location',
            'view' => 'users/search_location',
            'breadcrumb' => 'Search Location'
        );
        $data['locations'] = Modules::run('general/selectData', 'location','','location_id');
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $this->load->view('general/template',$data);
    }

    public function editLocation($id){
        $data = array(
            'title' => 'Edit Location',
            'view' => 'users/edit_location',
            'breadcrumb' => 'Edit  Location'
        );
        $condition = array(
            'admin_id' => $this->session->logged_in['admin_id']
        );
        $condition2 = array(
            'location_id' => $id
        );
        $data['user'] = Modules::run('general/selectData', 'admin',$condition);
        $data['location'] = Modules::run('general/selectData', 'location',$condition2);
        $this->load->view('general/template',$data);
    }

    public function updateLocation($id){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        if ($this->form_validation->run() == false) {
            $this->editLocation($id);
        } else {
            $data = array(
                'location_name' => $this->input->post('location'),
                'location_phone' => $this->input->post('phone')
            );
            Modules::run('general/updateData', 'location',$data,'location_id',$id);
            $this->session->set_flashdata('flash', '<div class="alert alert-success">' . 'Location updated successfully' . '</div>');
            redirect('users/searchLocation');
        }
    }

}