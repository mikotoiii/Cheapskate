<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends baseModel {
				public $id;
				public $userName;
				public $nameFirst;
				public $nameLast;
				public $dob;
				public $city;
				public $province;
				public $phone;
				public $email;
				public $twitter;
				public $getNotifications;
				public $lastLocationLat;
				public $lastLocationLong;
				public $unitType;
				public $travelType;
				public $defaultDistanceRange;
				public $lastSeen;
				
				private $password;
				private $authToken;
				private $userRoleId;
				
				
    public function __construct() {
       	parent::__construct(get_class()); // Needs to be here
        $this->load->database();
    }
				
				public function getUserById($id) {
							$this->load($id);
							
							return $this;
				}
}