<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/6/18
 * Time: 6:41 PM
 */
class Landing_page extends CI_Controller {
    function index() {
        $this->load->view('landing_page/index');
    }
}