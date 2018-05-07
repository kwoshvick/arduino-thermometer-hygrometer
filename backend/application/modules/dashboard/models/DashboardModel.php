<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/26/17
 * Time: 6:17 PM
 */

class DashboardModel extends CI_Model
{
    public function count($condition){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_stage', 'order_stage.order_id = orders.order_id');
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function totalAmount($condition = null){
        $this->db->select('SUM(amount) as total');
        $this->db->from('payment');
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function getPaidAmount($condition){
        $this->db->select('SUM(payment.amount) as total');
        $this->db->from('orders');
        $this->db->join('order_stage', 'order_stage.order_id = orders.order_id');
        $this->db->join('payment', 'orders.order_id = payment.order_id');
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function getUnpaidAmount($condition){
        $this->db->select('SUM(orders.transport_cost) + SUM(orders.item_cost) as total');
        $this->db->from('orders');
        $this->db->join('order_stage', 'order_stage.order_id = orders.order_id');
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }




}