<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sign up for this thing. Handle the post-facebook/google
 * signup.
 */
class Signup extends MY_Controller {
    
    public function __construct()	{
	parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User');
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
        
        $cfg = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|min_length[3]|max_length[50]|alpha'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|min_length[3]|max_length[50]|valid_email'
            ),
            array(
                'field' => 'nameFirst',
                'label' => 'First Name',
                'rules' => 'required|trim|min_length[3]|max_length[50]|alpha'
            ),
            array(
                'field' => 'nameLast',
                'label' => 'Last Name',
                'rules' => 'required|trim|min_length[3]|max_length[50]|alpha'
            ),
            array(
                'field' => 'password1',
                'label' => 'Password',
                'rules' => 'required|min_length[3]|max_length[50]|matches[passwordconf]'
            ),
            array(
                'field' => 'passwordconf',
                'label' => 'Confirm Password',
                'rules' => 'required|min_length[3]|max_length[50]'
            ),
            array(
                'field' => 'dob',
                'label' => 'Birthday',
                'rules' => 'trim|min_length[3]|max_length[10]'
            )
        );
        $this->form_validation->set_rules($cfg);
        // Check validation for user input in SignUp form
        if ($this->form_validation->run() == false) {
            $this->showView("signup");
            return;
        } else {
            $data = array(
                'userName' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password1'),
                'nameFirst' => $this->input->post('nameFirst'),
                'nameLast' => $this->input->post('nameLast'),
                'dob' => $this->input->post('dob')
            );
            
            $result = $this->User->addNewUser($data);
            
            if ($result === true) {
                $data['message_display'] = 'Registration Successful!';
                $this->showView('login', $data);
            } else {
                $data['message_display'] = 'Username already exists!';
                $this->showView('signup', $data);
            }
        }
    }
}