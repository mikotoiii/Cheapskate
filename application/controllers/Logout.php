<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index() {
        $this->load->helper('url');
        redirect("home");
    }

    // Logout from admin page
    public function logout() {

        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        $this->load->showView('login', $data);
    }

}
