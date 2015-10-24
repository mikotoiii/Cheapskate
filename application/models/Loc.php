<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loc extends CI_Model {
    private $lat;
    private $lng;
    
    /**
     * Create a location object
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct($latitude, $longitude) {
        $this->lat = $latitude;
        $this->lng = $longitude;
    }
    
    /**
     * Latitude
     * @param float $latitude The Latitude to set
     * @return float The Latitude of the location
     */
    public function lat($latitude = null) {
        if ($latitude !== null) {
            $this->lat = $latitude;
        }
        
        return $this->lat;
    }
    
    /**
     * Longitude
     * @param float $longitude The Longitude to set
     * @return float The Longitude of the location
     */
    public function lng($longitude = null) {
        if ($longitude !== null) {
            $this->lng = $longitude;
        }
        return $this->long;
    }
    
}
