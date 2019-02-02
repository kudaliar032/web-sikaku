<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/13/18
 * Time: 1:32 PM
 */
class Login_model extends CI_Model {
    public function cekLogin($nik, $password) {
        $password = md5($password);

        if ($this->db->get_where('login', array('nik' => $nik, 'password' => $password))->num_rows() > 0) {
            return $this->db->get_where('login', array('nik' => $nik, 'password' => $password))->last_row();
        } else {
            return false;
        }
    }
}