<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Halifax");

/**
 * Represents and stores a Venue
 */
class Venue extends baseModel {
				public $id;
				public $name;
				public $locationNum;
				public $venueTypeId;
				public $city;
				public $province;
				public $address1;
				public $address2;
				public $googleMapsPlaceId;
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
				public $classFactor;
				public $trashFactor;
				public $hasLiveMusic;
				public $musicType;
				public $promoterId;
				public $status;
				
    # Peoperties that don't get persisted
				public $distanceFromUser;
    public $events = array();
    public $daysWithEvents = array();

    
    /**
     * Construct a venue
     */
    public function __construct() {
								parent::__construct(get_class()); // Needs to be here
        $this->load->database();
    }
    
    /**
     * OVERRIDE
     * @param type $id
     */
    public function load($id) {
        $this->load->model('Event');
        $venues = parent::load($id);
        
        foreach ($venues as &$venue) {
            $venue->events[] = $this->Event->getEventsByVenue($venue->id);
            $venue->daysWithEvents = $this->findDaysWithEvents($venue->id);
        }

        return $venues;
    }
				
    /**
     * Get a venue by it's ID
     * @param integer $id
     * @return Venue The Venue
     */
				public function getVenueById($id) {
								return $this->load($id);
				}
    
    /**
     * Get venue by Google Place ID
     * @param string $placeId Google Place ID
     * @return Venue Returns a venue
     */
    public function getVenueByPlaceId($placeId) {
        $this->db->where("placeId", $placeId);
        $this->db->select("id");
        $query = $this->db->get("venue");
        $result = $query->result();
        
        return $this->load($result->id);
    }
				
				public function findVenueByName($name) {
								throw new BadMethodCallException("Method Not Yet Implemented. Please write it.");
				}
    
    private function updateVenueHours($venue, $data) {
        $periods = $data->result->opening_hours->periods;
        
        foreach ($periods as $period) {
            $day       = $period->open->day;
            $openTime  = $period->open->time;
            $closeTime = $period->close->time;
            
            $this->db->where(array("venueId" => $venue->id, "day" => $day));
            $this->db->update(array("openTime" => $openTime, "closeTime" => $closeTime));
        }
    }
    
    public function populateVenueFromGoogleData($placeId, $data) {
        $id = $this->venue->existsByPlaceId($placeId);
        if ($id !== false) {
            $this->venue->load($id);
            $this->venue->update($data);
        }
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
     * 
     *  AND ((CAST('14:11:12' as time) BETWEEN timeStart AND timeEnd))
				 */
				public function findAllVenuesByProximity($lat, $long, $distance, $day, $unit = 'KM') {
								$earthRadius = $unit == 'KM' ? 6371 : 3958;
        $end = time() + (24 * 3600); // 24 hours in the future
        //$day = date("N", $end);
        $endHour = date("H:i:s", $end);
        
        if ($day === '%') {
            $day = date("N", time());
            
            $mondayDiff = $day % 1;
            $sundayDiff = $day % 7;
            
            $beginning = time() - $mondayDiff * (24 * 3600);
            $ending = time() + $sundayDiff * (24 * 3600);
            
            //$where = "timeStart > {$beginning} AND timeEnd";
            $where = "";
        } else {
            $where = "WHERE timeDay={$day}";
        }
        
								$q ="SELECT
								v.id, (
										{$earthRadius} * acos (
												  cos(radians({$lat}))
												* cos(radians(latitude))
												* cos(radians(longitude) - radians({$long}))
												+ sin(radians({$lat}))
												* sin(radians(latitude))
										)
								) AS distance
								FROM venue as v
        WHERE v.id IN (SELECT DISTINCT venueId FROM event {$where})
								HAVING distance < {$distance}
								ORDER BY distance;";
        
								$results = $this->doQuery($q);
        
        if (empty($results)) {
            return $results;
        }
        
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
    
    /**
     * Check to see if a venue already exists (by Google Place ID)
     * @param string $placeId The Google Places ID
     * @return boolean Returns the ID if the venue exists, otherwise false
     */
    public function existsByPlaceId($placeId) {
        $this->db->where("placeId", $placeId);
        $this->db->select("id");
        $query = $this->db->get("venue");
        $result = $this->query->result();
        
        return count($result) === 1 ? $result[0]->id : false;
    }
				
				public function venueHasDeals($venueId) {
								throw new BadMethodCallException("Not implemented yet.");
				}
				
				public function findVenuesWithDeals($lat, $lng) {
								
				}
    
    /**
     * Get an array of the days with deals available
     * @param mixed $id An ID or an array of IDs
     * @return array Returns an array of 
     */
    public function findDaysWithEvents($id) {
        
        if (is_numeric($id)) {
            $this->db->where('venueId', $id);
        } elseif (is_array($id)) {
            $this->db->where_in('venueId', $id);
        }
        
        $this->db->select('timeDay');
        $this->db->distinct();
        $query = $this->db->get('event');
        $results = $query->result();
                
        $days = array();
        foreach ($results as $result) {
            $days[] = $result->timeDay;
        }
        
        return $days;
    }
				
				public function getName() {
								return $this->name;
				}

}