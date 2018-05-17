<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/20/17
 * Time: 6:51 PM
 */

class Dashboard extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('DashboardModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        echo modules::run('general/General/isLoggedIn');
    }

    public function index(){
        $data = array(
            'title' => 'Dashboard',
            'view' => 'dashboard/main_dashboard',
            'breadcrumb' => 'Dashboard',
            'chart' => $this->graph()
        );
        $this->load->view('general/template',$data);
    }


    public function graph(){
        $chart = $this->DashboardModel-> _selectChart();
        $details ='';
        foreach ($chart as $c){
            $details .= "{ period:'".$c->timestamp."', temperature:'".$c->temperature."', humidity:'".$c->humidity."'}, ";
        }
        return $details;
    }

}