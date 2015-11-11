<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The man controller. This will handle the template generation,
 * adding of JS and CSS resources, and probably Auth stuff
 */
class AdminController extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->loginRequired = true;
        $this->adminRequired = true;
    }
    
}