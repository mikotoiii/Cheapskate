<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
				
				public function index() {
								$this->addJavascript("vendor/facebookLogin");
								$this->showView('login');
				}
				
				public function submit() {
								if (!isset($_POST)) {
												throw new Exception("Gotta use post to login, baby girl!");
								}
								
								
				}
}