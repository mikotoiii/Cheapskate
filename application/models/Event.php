<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The event is what happens. Events can have live bands, drink specials,
 * food specials, discounts, whatever.
 */
class Event extends baseModel {

    public $id;
    public $venueId;
    public $eventTypeId;
    public $name;
    public $info;
    public $timeDay;
    public $timeStart;
    public $timeEnd;
    public $submittedById;
    public $coverCost;
    public $overTypeId;

    #Items that don't exist in the database
    public $deals = array();

    public function __construct() {
        parent::__construct(get_class()); // Needs to be here
        $this->load->database();
    }
    
    /**
     * OVERRIDE
     * @param type $id
     */
    public function load($id) {
        $this->load->model('Deal');
        $events = parent::load($id);
        
        // load deals
        foreach ($events as &$event) {
            $event->deals[] = $this->Deal->getAllDealsForEvent($event->id);
        }
        
        return $events;
    }

    public function getEventById($id) {
        $event = $this->load($id);

        $q = "select * from deal where eventId={$id}";
        $this->deals = $this->doQuery($q);

        return $event;
    }

    public function getTopOptimalEvents($num) {
        $events = array();
        $q = "select id from event LIMIT {$num}";
        $results = $this->load($this->doQuery($q));

        foreach ($results as $result) {
            $events[] = $this->getEventById($result);
        }

        return $events;
    }

    /**
     * Get all events for a venue
     * @param int $venueId
     * @return array Returns an array of a Venue's Events
     */
    public function getEventsByVenue($venueId) {
        $this->db->select('id');
        $this->db->where('venueId', $venueId);
        $query = $this->db->get('Event');
        $ids = $query->result();
        
        return $this->load($ids);
    }

    /**
     * Get all the events within a radius
     * @param int $userId The user ID
     * @param int $day the day number
     * @return array Returns an array of \Event objects
     */
    public function findEventsInRadius($userId, $day) {
        $this->load->model("Event");
        $this->load->model("User");
        $this->load->model("Venue");
        $this->load->model("Deal");

        $user = $this->User->load($userId);
        $user = $user[0];

        $venues = $this->Venue->findAllVenuesByProximity($user->lastLocationLat, $user->lastLocationLong, $user->defaultDistanceRange, $day);

        $events = array();
        foreach ($venues as $venue) {
            print_r($venue); die;
            $events[] = $this->load($venue->eventId);
        }
        
        return $events;
    }

}
