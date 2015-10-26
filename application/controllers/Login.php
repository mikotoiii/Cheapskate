<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("America/Halifax");
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if (!isset($_SESSION["logginAttempts"])) {
            $_SESSION["loginAttempts"] = 0;
        }
    }

    public function index() {
        $this->setTitle("Login");
        $this->addJavascript("vendor/facebookLogin");
        
        if (!empty($_POST)) {
            $this->doSubmit();
        } else {
            $this->showView('login');
        }
    }

    private function doSubmit() {
        
        $cfg = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|min_length[3]|max_length[50]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|alpha_numeric|min_length[3]|max_length[50]'
            )
        );
        
        $this->form_validation->set_rules($cfg);
        if ($this->form_validation->run() == false) {
            $this->showView("login");
            return;
        } else {
            $data = array();
            if (filter_var($this->input->post('username'), FILTER_VALIDATE_EMAIL) === false) {
                $data['username'] = $this->input->post('username');
            } else {
                $data['email'] = $this->input->post('username');
            }
            
            $passwordChallenge = $this->input->post('password');
            $userName = $this->input->post('username');
            $passwordHash = $this->User->getUserPassword($data);
            
            if (!password_verify($passwordChallenge, $passwordHash)) {
                $_SESSION["loginAttempts"] = $_SESSION["loginAttempts"]++;
                $this->showView("login");
                return;
            }
            
            $user = $this->User->getUserFromLogin($data);

            if ($user !== false) {
                $sessionData = array(
                    'userName'  => $user->userName,
                    'email'     => $user->email,
                    'authToken' => $user->authToken,
                    'lastSeen'  => date("Y-m-d")
                );
                // Add user data to session
                $this->session->set_userdata('userLoggedIn', true);
                $this->session->set_userdata('userData', $sessionData);
                redirect("home");
                
            } else {
                $data = array(
                    'error_message' => 'User could not be loaded.',
                );
                redirect("login");
            }
        }
    }

}
