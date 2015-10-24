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

            $result = $this->User->login($data);

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

}
