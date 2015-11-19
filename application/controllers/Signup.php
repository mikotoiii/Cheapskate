<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sign up for this thing. Handle the post-facebook/google
 * signup.
 */
class Signup extends MY_Controller {
    
				public function __construct()	{
								parent::__construct();
				}
				
				public function index() {
								$this->addJavascript("vendor/facebookLogin");
        $this->addJavascript("vendor/jquery-ui.min");
        $this->addCss("../js/vendor/jquery-ui.min");
        $this->addCss("../js/vendor/jquery-ui.structure.min");
        $this->addCss("../js/vendor/jquery-ui.theme.min");
        $this->setTitle("Sign up!");
        
        if (empty($_POST)) {
           $this->showView('signup');
           return;
        }
        
        $this->doSubmit();
				}
				
    
    // Validate and store registration data in database
    private function doSubmit() {

        // Check validation for user input in SignUp form
        $this->load->library('form_validation');
        if ($this->form_validation->run() === false) {
            $this->load->view('registration_form');
        } else {
            $data = array(
                'user_name' => $this->input->post('username'),
                'user_email' => $this->input->post('email_value'),
                'user_password' => $this->input->post('password'),
            );
            
            $result = $this->login_database->registration_insert($data);
            
            if ($result === true) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login_form', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('registration_form', $data);
            }
        }
    }
    
}