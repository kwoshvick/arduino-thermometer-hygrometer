<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/21/17
 * Time: 1:36 PM
 */

class UsersModel extends CI_Model
{
    public function checkEmail($email)
    {
        $qry = $this->db->select('email')->from('admin')->where('email', $email)->get();
        if ($qry->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkLocation($location)
    {
        $qry = $this->db->select('location_name')->from('location')->where('location_name', $location)->get();
        if ($qry->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getField($table, $condition, $field)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function searchUser(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('location', 'location.location_id = admin.location_id');;
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function getUser($condition){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('admin_roles', 'admin_roles.admin_role_id = admin.admin_role_id');
        $this->db->join('location', 'location.location_id = admin.location_id');
        $this->db->where($condition);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }


}