<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }

				public function index() {
								$this->addJavascript("main");
								$this->addJavascript("testData");
							 $this->addJavascript("https://maps.googleapis.com/maps/api/js?libraries=places");

								$this->addJavascript("directions");
								$this->addJavascript("vendor/jquery.flexslider");
        
        $this->addCss("vendor/flexslider");
        $this->setTitle("Deals!");
								$this->showView('home');
				}
    
    public function about() {
        $this->setTitle("About Cheapskate");
        $this->showView('about');
    }
    
    public function contact() {
        $this->setTitle("Contact Us");
        $this->showView('contact');
    }
    
    public function test() {
//        $this->load->library("googleMaps");
//        
//        $this->load->model('User');
//        $this->load->helper("location");
//        $this->load->helper("json");
//
//        $me =  $this->User->load(1);
//        $me =  $me[0];
//        
//        $result = $this->googlemaps->call("place/nearbysearch",
//                array(
//                    "location" => $me->lastLocationLat . "," . $me->lastLocationLong,
//                    "radius"   => $me->defaultDistanceRange * 1000,
//                    "types"    => "bar|establishment|food",
//                    "name"     => "Rockys"
//                )
//        );
//                
//        $details = $this->googlemaps->call("place/details",
//                array(
//                    "placeid" => $result->results[0]->place_id
//                ));
//        
//        var_dump($details); die;
//        
//        printJson($details);
        
    }
				
}
