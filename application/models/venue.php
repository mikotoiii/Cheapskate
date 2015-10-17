<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class venue extends baseModel {
				public $id;
				public $name;
				public $locationNum;
				public $venueTypeId;
				public $city;
				public $province;
				public $address1;
				public $address2;
				public $mapHash;
				public $latitude;
				public $longitude;
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
				
				public $distanceFromUser;

    public function __construct() {
								parent::__construct(get_class()); // Needs to be here
        $this->load->database();
    }
				
				public function getVenueById($id) {
								return $this->load($id);
				}
				
				public function findVenueByName($name) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
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
				
				/**
				 * Find all the venues within the user's radius
				 * @param type $lat
				 * @param type $long
				 * @param type $distance
				 * @param type $unit
				 * @return array Returns the venues near the user
				 */
				public function findAllVenuesByProximity($lat, $long, $distance, $unit = 'KM') {
								$earthRadius = $unit == 'KM' ? 6371 : 3958;
								$q ="SELECT
								id, (
										{$earthRadius} * acos (
												cos ( radians({$lat}) )
												* cos( radians( latitude ) )
												* cos( radians( longitude ) - radians({$long}) )
												+ sin ( radians({$lat}) )
												* sin( radians( latitude ) )
										)
								) AS distance
								FROM venue
								HAVING distance < {$distance}
								ORDER BY distance;";
												
								$results = $this->doQuery($q);
								$venues = $this->load($results);
								
								// Populate the distance from the user
								foreach ($venues as $venue) {
												foreach ($results as $result) {
																if ($result->id === $venue->id) {
																				$venue->distanceFromUser = $result->distance;
																				break;
																}
												}
								}
								
								return $venues;
				}
				
				public function venueHasDeals($venueId) {
								
				}
				
				public function findVenuesWithDeals($loc) {
								
				}
				
				public function getName() {
								return $this->name;
				}

}