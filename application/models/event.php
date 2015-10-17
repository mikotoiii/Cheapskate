<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The event is what happens. Events can have live bands, drink specials,
 * food specials, discounts, whatever.
 */
class event extends baseModel {
				
				public $id;
				public $dealId;
				public $eventTypeId;
				public $name;
				public $info;
				public $submittedById;
				public $coverCost;
				public $overTypeId;
				public $deals = array();

    public function __construct() {
       	parent::__construct(get_class()); // Needs to be here
        $this->load->database();
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
				
				public function getEventsByVenue($venueId) {
								
				}
}