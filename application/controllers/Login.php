<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    public function index() {
        $this->addJavascript("vendor/facebookLogin");
        $this->showView('login');
    }

    public function submit() {
        if (!isset($_POST)) {
            throw new Exception("Gotta use post to login, baby girl!");
        }

        if ($this->form_validation->run('login') === false) {
            if (isset($this->session->userdata['userLoggedIn'])) {
                $this->showView("home");
            } else {
                $this->showView("login");
            }
        } else {
            $data = array(
                'userName' => $this->input->post('userName'),
                'password' => $this->input->post('password'),
            );

            $result = $this->login_database->login($data);

            if ($result === true) {

                $username = $this->input->post('useNname');
                $user = $this->User->getUserByUserNameOrEmail($username);
                $user = $user[0];
                if ($result !== false) {
                    $sessionData = array(
                        'userName'  => $user->userName,
                        'email'     => $user->email,
                        'authToken' => '',
                        'lastSeen'  => date("Y-m-d")
                    );
                    // Add user data in session
                    $this->session->set_userdata('userLoggedIn', $sessionData);
                    $this->load->view('admin_page');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid username or password',
                );
                $this->load->showView('login', $data);
            }
        }
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
