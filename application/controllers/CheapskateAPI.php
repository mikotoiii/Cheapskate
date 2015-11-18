<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CheapskateAPI extends MY_Controller {

    public function __construct()	{
        parent::__construct();
        
        // auth stuff here, if not in parent.
        // may need special auth cases to allow
        // guest services
        $this->load->helper("json");
    }

    public function index() {
        $json = "welcome to my API!";
        echo $json;
    }

    public function findAllVenues() {
        $this->load->model('Venue');
        $venues = $this->Venue->findAllVenues();

        printJson($venues);
    }
    
    public function findEventsInRadius($userId) {
        if (!is_numeric($userId)) {
            throw new UnexpectedValueException("findEventsInRadius(): You must provide an integer.");
        }
        
        $this->load->model('Event');
        $events = $this->Event->findEventsInRadius($userId);
        
        printJson($events);
    }

    public function findVenuesInRadius($userId, $day = '%') {
        if (!is_numeric($userId)) {
            throw new UnexpectedValueException("findVenuesInRadius(): You must provide an integer.");
        }

        $this->load->model('User');
        $this->load->model('Venue');

        $user = $this->User->load($userId);
        $user = $user[0];
        
        $venues = $this->Venue->findAllVenuesByProximity(
                $user->lastLocationLat, 
                $user->lastLocationLong, 
                $user->defaultDistanceRange,
                $day,
                $user->unitType);

        printJson($venues);
    }
    
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
        
        printJson($result);
    }
    
    public function getVenueDetailsByPlaceId($placeId) {
        $this->load->library("googleMaps");
        $this->load->model('Venue');
        $this->load->helper("json");
        
        $result = $this->googlemaps->call("place/details",
                array(
                    "place_id" => $placeId
                )
        );
        
        printJson($result);
    }

    public function findVenuesWithLocation($radius, $lat, $long) {
        if (!is_numeric($radius) || !is_numeric($lat) || !is_numeric($long)) {
            throw new UnexpectedValueException("findVenuesInRadius(): You must provide an integer.");
        }

        $this->load->model('Venue');
        $venues = $this->Venue->findAllVenuesByProximity($lat, $long, $radius);

        printJson($venues);
    }

    public function findTopOptimalEvents($num = 6) {
        if (!is_numeric($num)) {
            throw new UnexpectedValueException("findTopOptimalEvents(): You must provide an integer.");
        }
        
        $this->load->model('Event');
        $events = $this->Event->getTopOptimalEvents($num);

        printJson($events);
    }

    public function testUserLocation() {
        $this->load->model('Venue');
        $this->load->model('User');
        $this->load->helper("location");

        $me      = $this->User->load(1);
        $peppers = $this->Venue->load(1);
        $capital = $this->Venue->load(7);

        $distanceToPeps = getDistance($me->lastLocationLat, $me->lastLocationLong, $peppers->latitude, $peppers->longitude);
        $distanceToCap  = getDistance($me->lastLocationLat, $me->lastLocationLong, $capital->latitude, $capital->longitude);
        //echo "To Peps: " . $distanceToPeps . ", To Capital: " . $distanceToCap;

        printJson($capital);
    }
    
    public function test($userId, $day = '%') {
        $this->load->model('Venue');
        $this->load->model('User');
        $user = $this->User->load($userId);
        $user = $user[0];
        printJson($this->Venue->findAllVenuesByProximity($user->lastLocationLat, $user->lastLocationLong, $user->defaultDistanceRange, $day, $user->unitType));
    }

    /** User Stuff * */
    public function getUser($userId) {
        if (!is_numeric($userId)) {
            throw new UnexpectedValueException("getUser(): You must provide an integer.");
        }
        
        $this->load->model('User');
        $user = $this->User->load($userId);

        printJson($user);
    }

}
