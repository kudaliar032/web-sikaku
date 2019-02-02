<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/13/18
 * Time: 1:51 PM
 */
class Admin_model extends CI_Model {
    public function cekKartuKeluarga($user_id) {
        if ($this->db->get_where('kartu_keluarga', array('user_id' => $user_id))->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getNomorKartuKeluarga($user_id) {
        return $this->db->get_where('kartu_keluarga', array('user_id' => $user_id))->last_row();
    }

    public function cekDataKeluarga($nkk) {
        return $this->db->get_where('anggota_keluarga', array('no_kk' => $nkk))->num_rows();
    }

    public function cekBerkas($nkk) {
        return $this->db->get_where('upload_berkas', array('no_kk' => $nkk))->num_rows();
    }

    public function getDataKeluarga($nkk) {
        return $this->db->get_where('anggota_keluarga', array('no_kk' => $nkk))->result_object();
    }

    public function cekPersetujuanDaftar($nkk) {
        if ($this->db->get_where('upload_berkas', array('no_kk' => $nkk, 'verifikasi' => 'Y'))->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cetakKartuKeluarga($nkk) {
        if ($this->db->update('kartu_keluarga', array('cetak' => 1), array('no_kk' => $nkk))) {
            return true;
        } else {
            return false;
        }
    }

    public function cekCetakKartuKeluarga($nkk) {
        if ($this->db->get_where('kartu_keluarga', array('cetak' => 1))->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataAnggotaKeluarga($nik) {
        return $this->db->get_where('anggota_keluarga', array('nik' => $nik))->last_row();
    }
}