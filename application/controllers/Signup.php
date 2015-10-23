<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends MY_Controller {
				public function __construct()	{
								parent::__construct();
				}
				
				public function index() {
								$this->addJavascript("vendor/facebookLogin");
        $this->setTitle("Sign up!");
								$this->showView('signup');
				}
				
				public function submit() {
								//$this->showView('signup');
				}
}