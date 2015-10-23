<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The man controller. This will handle the template generation,
 * adding of JS and CSS resources, and probably Auth stuff
 */
class MY_Controller extends CI_Controller {

    protected $javascripts = array();
    protected $css = array();
    protected $pageTitle = "";

    public function __construct() {
        parent::__construct();
    }

    protected function showView($view, $data = null) {

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
        $this->load->view($view, $data);
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

}
