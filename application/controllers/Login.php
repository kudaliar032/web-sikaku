<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/6/18
 * Time: 7:01 PM
 * @property Login_model $login_model
 */

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');

        if (isset($_SESSION['nik'])) {
            redirect('admin');
        }
    }

    function index() {
        $this->load->view('login');
    }

    function set_session() {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $data_login = $this->login_model->cekLogin($nik, $password);
        if ($data_login != false) {
            print_r($data_login);
            $this->session->set_userdata(array('nik' => $nik, 'user_id' => $data_login->id));
            redirect('admin');
        } else {
            $this->session->set_flashdata('login_gagal', true);
            redirect('login');
        }
    }
}