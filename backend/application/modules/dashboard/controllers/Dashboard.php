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
            'breadcrumb' => 'Dashboard'
        );
        $this->load->view('general/template',$data);
    }

    public function getChartData(){
        $paid ='';
        $canceled ='';
        $unpaid ='';
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime("+1 days"));
        $_30_daysago = date('Y-m-d', strtotime("-30 days"));
        $begin = new DateTime($_30_daysago);
        $end = new DateTime($tomorrow);
        $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
        foreach($daterange as $date){
           $start =  $date->format("Y-m-d") . " 00:00:00";
           $stop =  $date->format("Y-m-d") . " 23:59:59";
           $details =$this->getPaid($start,$stop);
           $paid .= "{ days:'".$date->format("d-M")."', count:'".$details['countPaid']."', amount:'".$details['amountPaid']."'}, ";
           $canceled .= "{ days:'".$date->format("d-M")."', count:'".$details['countCanceled']."', amount:'".$details['amountCanceled']."'}, ";
           $unpaid .= "{ days:'".$date->format("d-M")."', count:'".$details['countUnpaid']."', amount:'".$details['amountUnpaid']."'}, ";
        }
        $paid = substr($paid, 0, -2);
        return array('paid' => $paid,'canceled' =>$canceled,'unpaid'=>$unpaid);
    }

    public function getPaid($startDate,$endDate){
        $paid = array(
            'order_stage.is_paid' =>1,
            'orders.timestamp >=' => $startDate,
            'orders.timestamp <=' => $endDate
        );
        $canceled = array(
            'order_stage.is_cancelled' =>1,
            'orders.timestamp >=' => $startDate,
            'orders.timestamp <=' => $endDate
        );
        $unpaid = array(
            'order_stage.is_incomplete' =>0,
            'order_stage.is_cancelled' =>0,
            'order_stage.is_paid' =>0,
            'orders.timestamp >=' => $startDate,
            'orders.timestamp <=' => $endDate
        );
        $countUnpaid = $this->DashboardModel-> count($unpaid);
        $amountUnpaid = $this->DashboardModel-> getUnpaidAmount($unpaid);
        $countCanceled = $this->DashboardModel-> count($canceled);
        $amountCanceled = $this->DashboardModel-> getUnpaidAmount($canceled);
        $countPaid = $this->DashboardModel-> count($paid);
        $amountPaid = $this->DashboardModel-> getPaidAmount($paid);
        if(empty($amountPaid[0]->total)){
            $totalPaid = 0;
        }else{
            $totalPaid = $amountPaid[0]->total;
        }
        if(empty($amountCanceled[0]->total) ){
            $totalcanceled = 0;
        }else{
            $totalcanceled = $amountCanceled[0]->total;
        }
        if(empty($amountUnpaid[0]->total) ){
            $totalUnpaid = 0;
        }else{
            $totalUnpaid = $amountUnpaid[0]->total;
        }
        return array('countPaid' => $countPaid, 'amountPaid' => $totalPaid,'countCanceled'=>$countCanceled,
            'amountCanceled'=>$totalcanceled,'countUnpaid' => $countUnpaid,'amountUnpaid' => $totalUnpaid,);
    }

    public function getMonthlyData(){
        $monthly = '';
        $now = date('Y-m');
        for($x = 12; $x >= 1; $x--) {
            $ym = date('Y-m', strtotime($now . " -$x month"));
            $ym2 = date('M-Y', strtotime($now . " -$x month"));
            $start =  date('Y-m-01 ', strtotime($ym));
            $startDate =  $start. " 00:00:00";
            $end = date('Y-m-t h:m:s', strtotime($ym));
            $endDate =  $end. " 23:59:59";
            $paid = array(
            'order_stage.is_paid' =>1,
            'orders.timestamp >=' => $startDate,
            'orders.timestamp <=' => $endDate
            );
            $amountPaid = $this->DashboardModel-> getPaidAmount($paid);
            $countPaid = $this->DashboardModel-> count($paid);
            if(empty($amountPaid[0]->total)){
                $totalPaid = 0;
            }else{
                $totalPaid = $amountPaid[0]->total;
            }
            $monthly .= "{ months:'".$ym2."', count:'".$countPaid."', amount:'".$totalPaid."'}, ";
        }
        return $monthly;
    }
}