<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/9/18
 * Time: 2:45 PM
 */
class Indonesia_model extends CI_Model {
    public function getProvinsi() {
        $query = "SELECT nama, RIGHT(kode, 2) as kode FROM wilayah_indonesia WHERE LENGTH(kode) = 2 ;";
        return $this->db->query($query)->result_object();
    }

    public function getKabupaten($prov) {
        $query = "SELECT nama, RIGHT(kode, 2) as kode FROM wilayah_indonesia WHERE LENGTH(kode) = 5 AND LEFT(kode, 2) = ".$prov.";";
        return $this->db->query($query)->result_object();
    }

    public function getKecamatan($prov, $kab) {
        $query = "SELECT nama, RIGHT(kode, 2) as kode FROM wilayah_indonesia WHERE LENGTH(kode) = 8 AND LEFT(kode, 2) = ".$prov." AND MID(kode, 4, 2) = ".$kab.";";
        return $this->db->query($query)->result_object();
    }

    public function getKelurahan($prov, $kab, $kec) {
        $query = "SELECT nama, RIGHT(kode, 4) as kode FROM wilayah_indonesia WHERE LENGTH(kode) = 13 AND LEFT(kode, 2) = ".$prov." AND MID(kode, 4, 2) = ".$kab." AND MID(kode, 7, 2) = ".$kec.";";
        return $this->db->query($query)->result_object();
    }

    public function getName($prov, $kab, $kec, $kel) {
        $provinsi = $this->db->get_where('wilayah_indonesia', array('kode' => $prov))->last_row()->nama;
        $kabupaten = $this->db->get_where('wilayah_indonesia', array('kode' => $prov.'.'.$kab))->last_row()->nama;
        $kecamatan = $this->db->get_where('wilayah_indonesia', array('kode' => $prov.'.'.$kab.'.'.$kec))->last_row()->nama;
        $kelurahan = $this->db->get_where('wilayah_indonesia', array('kode' => $prov.'.'.$kab.'.'.$kec.'.'.$kel))->last_row()->nama;


        return array(
            'prov' => strtoupper($provinsi),
            'kab' => strtoupper($kabupaten),
            'kec' => strtoupper($kecamatan),
            'kel' => strtoupper($kelurahan)
        );
    }
}