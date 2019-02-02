<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/13/18
 * Time: 1:46 PM
 */
class Logout extends CI_Controller {
    function index() {
        $this->session->sess_destroy();
        redirect('login');
    }
}