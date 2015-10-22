<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Deal extends baseModel {

				public $id;
    public $eventId;
    public $dealTypeId;
    public $info;
    public $timeStart ;
    public $timeEnd;
				
    public function __construct() {
        parent::__construct(get_class()); // Needs to be here
        $this->load->database();
    }
				
				/**
				 * Get all the deals associated with an event
				 * @param int $eventId
				 * @return array(Event)
				 */
				public function getAllDealsForEvent($eventId) {								
								$q = "select * from deal where eventId={$eventId}";
								return $this->doQuery($q);
				}
}