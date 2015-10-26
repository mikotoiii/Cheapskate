<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends MY_Controller {
				public function __construct()	{
								parent::__construct();
				}
				
				public function index() {
								$this->addJavascript("vendor/facebookLogin");
        $this->addJavascript("vendor/jquery.ui.min");
        $this->addCss("../js/vendor/jquery-ui.min");
        $this->addCss("../js/vendor/jquery.ui.structure.min");
        $this->addCss("../js/vendor/jquery.ui.theme.min");
        $this->setTitle("Sign up!");
								$this->showView('signup');
				}
				
				public function submit() {
								//$this->showView('signup');
				}
    
    // Validate and store registration data in database
    public function new_user_registration() {

        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        } else {
            $data = array(
                'user_name' => $this->input->post('username'),
                'user_email' => $this->input->post('email_value'),
                'user_password' => $this->input->post('password'),
            );
            $result = $this->login_database->registration_insert($data);
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login_form', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('registration_form', $data);
            }
        }
    }
}