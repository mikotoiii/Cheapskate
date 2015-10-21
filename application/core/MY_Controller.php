<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
				
				protected $javascripts = array();
				
				public function __construct()	{
								parent::__construct();	
				}
				
				protected function showView($view, $data = null) {
								
								if ($data === null) {
												$data = array();
								}
								
								// add the JS to the data object
							 $data['javascripts'] = $this->javascripts;
								
								// call all the template pieces
								$this->load->view('header');
								$this->load->view('mainNav');
								$this->load->view($view, $data);
								$this->load->view('footer', $data);
				}
				
				/**
				 * Add a javascript to be loaded. The controller will add the /js
				 * part of the path. Just add any path/filename and we'll do the rest!
				 * @param string $js the path/filename without .js extension
				 */
				public function addJavascript($js) {
								$this->javascripts[] = $js;
				}
				
}

