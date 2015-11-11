<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AddVenue extends MY_Controller {
    
				public function __construct()	{
								parent::__construct();
        $this->loginRequired = true;
        $this->adminRequired = true;
				}
				
				public function index() {
        $this->setTitle("Add a new Venue");
        if (empty($_POST)) {
            $this->showView('admin/addVenue', array('googleKey' => "AIzaSyAnxB97RclR1RODV7udWBS8MAs6kk9ioyk"));
        }
    }
    
}
