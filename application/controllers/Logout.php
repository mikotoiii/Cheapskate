<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index() {
        $this->logout();
    }

    public function logout() {

        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        $this->load->showView('h', $data);
    }

}
