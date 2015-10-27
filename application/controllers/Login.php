<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
    private $activeUser = null;
    
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("America/Halifax");
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User');

        $this->form_validation->set_error_delimiters('<div class="alert-item">', '</div>');
        
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
                'rules' => 'required|trim|min_length[3]|max_length[50]|callback_validateUserNameExists'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|alpha_numeric|min_length[3]|max_length[50]|callback_verifyPassword'
            )
        );
        
        $this->form_validation->set_rules($cfg);
        if ($this->form_validation->run() == false) {
            $this->showView("login");
            return;
        } else {
            if ($this->activeUser !== false) {
                $sessionData = array(
                    'userName'  => $this->activeUser->userName,
                    'email'     => $this->activeUser->email,
                    'authToken' => $this->activeUser->authToken,
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
    
    /**
     * Validation Callback to verify the password
     * @return boolean
     */
    public function verifyPassword() {
        
        $this->form_validation->set_message('verifyPassword', "The username or password are incorrect.");
        
        if (filter_var($this->input->post('username'), FILTER_VALIDATE_EMAIL) === false) {
            $data['username'] = $this->input->post('username');
        } else {
            $data['email'] = $this->input->post('username');
        }
            
        $passwordChallenge = $this->input->post('password');
        $passwordHash = $this->User->getUserPassword($data);

        if (!password_verify($passwordChallenge, $passwordHash)) {
            $_SESSION["loginAttempts"] = $_SESSION["loginAttempts"]++;
            
            return false;
        }
        
        return true;
    }
    
    /**
     * Validation Callback to verify user
     * Also sets the $activeUser
     * @param string $userName The username as coming from POST
     * @return boolean Returns true if the user exists
     */
    public function validateUserNameExists($userName) {
        
        $this->form_validation->set_message('validateUserNameExists', "The {field} doesn't exist");
        $data = array();
        if (filter_var($this->input->post('username'), FILTER_VALIDATE_EMAIL) === false) {
            $data['username'] = $this->input->post('username');
        } else {
            $data['email'] = $this->input->post('username');
        }

        $user = $this->User->getUserFromLogin($data);
        
        if ($user !== false) {
            $this->activeUser = $user;
            return true;
        }
        
        return false;
    }

}
