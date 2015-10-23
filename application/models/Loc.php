<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loc extends CI_Model {
    private $lat;
    private $lng;
    
    /**
     * Create a location object
     * @param long $latitude
     * @param long $longitude
     */
    public function __construct($latitude, $longitude) {
        $this->lat = $latitude;
        $this->lng = $longitude;
    }
    
    /**
     * Latitude
     * @param long $latitude The Latitude to set
     * @return long The Latitude of the location
     */
    public function lat($latitude = null) {
        if ($latitude !== null) {
            $this->lat = $latitude;
        }
        
        return $this->lat;
    }
    
    /**
     * Longitude
     * @param long $longitude The Longitude to set
     * @return long The Longitude of the location
     */
    public function lng($longitude = null) {
        if ($longitude !== null) {
            $this->lng = $longitude;
        }
        return $this->long;
    }
    
}
