<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheapskateAPI extends CI_Controller {

				public function index() {
								//$this->load->view('welcome_message');
								$json = "something";
								echo $json;
				}
				
				public function findAllVenues() {
								$this->load->model('venue');
								$venues = $this->venue->findAllVenues();
								
								print_r(json_encode($venues, JSON_PRETTY_PRINT));
								//echo $venue->getName();
				}
}
