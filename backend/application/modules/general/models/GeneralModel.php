<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/21/17
 * Time: 1:40 PM
 */

class GeneralModel extends CI_Model
{
    public function _insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function _insertReturnId($table, $data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function _select($table, $condition = null, $order = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        if (isset($order) && $order != null) {
            $this->db->order_by($order, "desc");
        }
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function _update($table, $data, $whereField, $whereId)
    {
        $this->db->where($whereField, $whereId);
        $this->db->update($table, $data);
    }

}