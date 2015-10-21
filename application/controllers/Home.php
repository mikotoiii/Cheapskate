<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

				public function index() {
								$this->addJavascript("main");
								$this->addJavascript("testData");
								$this->addJavascript("directions");
								$this->addJavascript("vendor/jquery.flexslider");
								$this->addJavascript("https://maps.googleapis.com/maps/api/js?libraries=places");
								$this->showView('home');
				}
				
}
