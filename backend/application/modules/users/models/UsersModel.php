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

    public function checkPhone($phone)
    {
        $qry = $this->db->select('phone')->from('farmer')->where('phone', $phone)->get();
        if ($qry->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}