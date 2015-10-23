<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Venues {
    
    public function findVenuesByName($userId, $name) {
        $this->load->library("googleMaps");
        
        $this->load->model('User');
        $this->load->helper("location");
        $this->load->helper("json");

        //TODO: Trap for errors here
        $me = $this->User->load($userId);
        $me = $me[0];
        
        $result = $this->googlemaps->call("place/nearbysearch/",
                array(
                    "location" => $me->lastLocationLat . "," . $me->lastLocationLong,
                    "radius"   => $me->defaultDistanceRadius * 1000, //km
                    "types"    => "bar|establishment|food",
                    "name"     => $name
                )
        );
        
        return $result;
    }
    
    public function getVenueDetailsByPlaceId($placeId) {
        $this->load->library("googleMaps");
        $this->load->model('Venue');
        $this->load->helper("json");
        
        $result = $this->googlemaps->call("place/details",
                array(
                    "place_id"  => $placeId
                )
        );
        
        return $result;
    }
    
    public function populateVenueFromGoogleData($placeId, $data) {
        $id = $this->venue->existsByPlaceId($placeId);
        if ($id !== false) {
            $this->venue->load($id);
            
            $this->venue->update($data);
        }
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
}
