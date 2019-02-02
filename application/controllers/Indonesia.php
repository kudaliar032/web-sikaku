<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/9/18
 * Time: 2:23 PM
 * @property Indonesia_model $indonesia_model
 */
class Indonesia extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('indonesia_model');
    }

    function index() {
        echo "REST INDONESIA";
    }

    function get_kabupaten($prov) {
        echo json_encode($this->indonesia_model->getKabupaten($prov));
    }

    function get_kecamatan($prov, $kab) {
        echo json_encode($this->indonesia_model->getKecamatan($prov, $kab));
    }

    function get_kelurahan($prov, $kab, $kec) {
        echo json_encode($this->indonesia_model->getKelurahan($prov, $kab, $kec));
    }
}