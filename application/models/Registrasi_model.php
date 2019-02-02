<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/13/18
 * Time: 1:03 PM
 */
class Registrasi_model extends CI_Model {
    public function registrasiBaru($nik, $email, $password) {
        $id = md5(time().$nik.$email.$password);

        $data = array(
            'id' => $id,
            'nik' => $nik,
            'email' => $email,
            'password' => md5($password)
        );

        if ($this->db->insert('login', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function noSeriKaKa($nkk) {
        $sql = "SELECT * FROM kartu_keluarga WHERE LEFT(no_kk, 12) = ".$nkk.";";
        return sprintf('%04s', $this->db->query($sql)->num_rows()+1);
    }

    public function kirimKaruKeluarga($data) {
        if ($this->db->insert('kartu_keluarga', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function cekDataKaKa($user_id) {
        if ($this->db->get_where('kartu_keluarga', array('user_id' => $user_id))->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function kirimKepalaKeluarga($data) {
        if ($this->db->insert('anggota_keluarga', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadBerkas($data) {
        if ($this->db->insert('upload_berkas', $data)) {
            return true;
        } else {
            return false;
        }
    }
}