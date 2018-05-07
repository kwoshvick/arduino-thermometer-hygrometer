<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/20/17
 * Time: 5:36 PM
 */

class LoginModel extends CI_Model
{
    public function login($condition)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchAdmin($email)
    {
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}