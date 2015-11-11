<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The man controller. This will handle the template generation,
 * adding of JS and CSS resources, and probably Auth stuff
 */
class MY_Controller extends CI_Controller {

    protected $javascripts = array();
    protected $css = array();
    protected $pageTitle = "";
    protected $loginRequired  = false;
    protected $adminRequired  = false;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display the view. This function wraps up all the teplates,
     * sets the page title, adds all the requested Javascript and CSS, 
     * and passes along any data.
     * @param string $view The name of the content view to display
     * @param array $data (Optional) An array of any data to pass along
     */
    protected function showView($view, $data = null) {
        
        if ($this->loginRequired && !$this->session->userdata("userLoggedIn")) {
            $this->session->authErrorMsg = "You must be logged in. Please login first.";
        } elseif (($this->loginRequired && $this->session->userdata("userLoggedIn")) && 
                  ($this->adminRequired && $this->session->userdata("userRole") != 1)) {
            $this->session->authErrorMsg = "You ain't no 'ministrator, you rail-thin little turkey!";
        }
                
        if ($data === null) {
            $data = array();
        }

        // add the JS to the data object
        $data['javascripts'] = $this->javascripts;
        $data['css'] = $this->css;
        $data['pageTitle'] = $this->pageTitle;

        // call all the template pieces
        $this->load->view('header', $data);
        $this->load->view('mainNav', $data);
        
        
        //TODO: Do better than this.
        if (strlen($this->session->authErrorMsg) > 0) {
            $data["authErrorMsg"] = $this->session->authErrorMsg;
            $this->load->view('showErrors', $data);
        } else {
            $this->load->view($view, $data);
        }
        
        $this->load->view('footer', $data);
        
    }

    /**
     * Add a javascript to be loaded. The controller will add the /js
     * part of the path. Just add any path/filename and we'll do the rest!
     * @param string $js the path/filename without .js extension
     */
    protected function addJavascript($js) {
        $this->javascripts[] = $js;
    }

    /**
     * Add a CSS resource to the head
     * @param string $css the path/filename without the .css extension
     */
    protected function addCss($css) {
        $this->css[] = $css;
    }
    
    /**
     * Set the page specific title
     * @param string $title The page title
     */
    protected function setTitle($title) {
        $this->pageTitle = $title;
    }
    
    /**
     * Is the current user logged in?
     * @param boolean $loggedIn Whether or not the user is logged in
     * @return type
     */
    protected function loggedIn($loggedIn = null) {
        if ($loggedIn !== null) {
            $_SESSION["userLoggedIn"] = $loggedIn;
        }
        
        return $_SESSION["userLoggedIn"];
    }

}
