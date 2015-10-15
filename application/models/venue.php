<?php
class venue extends BaseModel {
				
				private $id;
				private $name;
				private $locationNum;
				private $categoryId;
				private $city;
				private $province;
				private $address1;
				private $address2;
				private $mapHash;
				private $phone;
				private $email;
				private $website;
				private $facebook;
				private $twitter;
				private $instagram;
				private $hipFactor;
				private $scaryFactor;
				private $hasLiveMusic;
				private $musicType;
				private $promoterId;
				private $status;

    public function venue() {
								parent::__construct(class_name()); // Needs to be here
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
				
				public function findAllVenuesByCity($city) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
				}
				
				public function findAllVenuesByProximity($distanceRadius) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
				}
				
				
}