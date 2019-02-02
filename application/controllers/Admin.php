<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/9/18
 * Time: 6:33 PM
 * @property Admin_model $admin_model;
 */
class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');

        // cek data
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');
        if (!$this->admin_model->cekKartuKeluarga($user_id)) {
            redirect('registrasi/data_kartu_keluarga');
        } else {
            $this->session->set_userdata('nkk', $this->admin_model->getNomorKartuKeluarga($user_id)->no_kk);
        }

        $nkk = $this->session->userdata('nkk');
        if (!$this->admin_model->cekDataKeluarga($nkk) > 0) {
            redirect('registrasi/data_kepala_keluarga');
        }

        if (!$this->admin_model->cekBerkas($nkk) > 0) {
            redirect('registrasi/upload_berkas');
        }
    }

    function index() {
        $nkk = $this->session->userdata('nkk');

        $data['anggota_keluarga'] = $this->admin_model->getDataKeluarga($nkk);
        $data['status_verifikasi'] = $this->admin_model->cekPersetujuanDaftar($nkk);
        $data['status_cetak'] = $this->admin_model->cekCetakKartuKeluarga($nkk);

        $this->load->view('admin/index', $data);
    }

    function kehilangan() {
        $this->load->view('admin/under_construction');
    }

    function ubah_data() {
        $this->load->view('admin/under_construction');
    }

    function lacak_pengiriman() {
        $this->load->view('admin/under_construction');
    }

    function bantuan() {
        $this->load->view('admin/under_construction');
    }

    function cetak_kk() {
        if ($this->admin_model->cetakKartuKeluarga($this->session->userdata('nkk'))) {
            echo "Done";
        } else {
            echo "Fail";
        }
    }

    function get_data_anggota_keluarga($nik) {
        $detail = json_encode($this->admin_model->getDataAnggotaKeluarga($nik));
        echo $detail;
    }
}