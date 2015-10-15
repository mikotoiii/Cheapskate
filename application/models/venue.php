<?php
include 'baseModel.php';

class venue extends baseModel {
				public $id;
				public $name;
				public $locationNum;
				public $categoryId;
				public $city;
				public $province;
				public $address1;
				public $address2;
				public $mapHash;
				public $phone;
				public $email;
				public $website;
				public $facebook;
				public $twitter;
				public $instagram;
				public $hipFactor;
				public $scaryFactor;
				public $hasLiveMusic;
				public $musicType;
				public $promoterId;
				public $status;

    public function venue() {
								parent::__construct(get_class()); // Needs to be here
        $this->load->database();
    }
				
				
				
				public function getVenueById($id) {
								return $this->load($id);
				}
				
				public function findVenueByName($name) {
								$venues = array();
								
								return $venues;
				}
				
				public function findClosestVenue($origin) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
				}
				
				public function findAllVenues() {
								$q = "select id from venue";
								return $this->load($this->doQuery($q));
				}
				
				public function findAllVenuesByCity($city) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
				}
				
				public function findAllVenuesByProximity($distanceRadius) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
				}
				
				
				public function getName() {
								return $this->name;
				}

}