<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class CheapskateAPI extends MY_Controller {
				
//				public function __construct()	{
//					//			parent::__construct();
//				}

				public function index() {
								//$this->load->view('welcome_message');
								$json = "welcome to my API!";
								echo APPPATH;
				}
				
				public function findAllVenues() {
								$this->load->model('Venue_model');
								$venues = $this->venue->findAllVenues();
								
								self::printJson($venues);
				}
				
				public function findVenuesInRadius($userId) {
								if (!is_numeric($userId)) {
												throw new UnexpectedValueException("findVenuesInRadius(): You must provide an integer.");
								}
																
								$this->load->model('User_model');
								$this->load->model('Venue_model');
								
								$user = $this->user->load($userId);
								$user = $user[0];
								
								$venues = $this->venue->findAllVenuesByProximity($user->lastLocationLat, $user->lastLocationLong, $user->defaultDistanceRange);
								
								self::printJson($venues);
				}
				
				public function findVenuesWithLocation($radius, $lat, $long) {
								if (!is_numeric($radius) || !is_numeric($lat) || !is_numeric($long)) {
												throw new UnexpectedValueException("findVenuesInRadius(): You must provide an integer.");
								}
																
								$this->load->model('Venue_model');

								$venues = $this->venue->findAllVenuesByProximity($lat, $long, $radius);
								
								self::printJson($venues);
				}
				
				public function findTopOptimalEvents($num = 6) {
								if (!is_numeric($num)) {
												throw new UnexpectedValueException("findTopOptimalEvents(): You must provide an integer.");
								}
								$this->load->model('Event_model');
								$events = $this->event->getTopOptimalEvents($num);
								
								self::printJson($events);
				}
				
				public function testUserLocation() {
								$this->load->model('Venue_model');
								$this->load->model('User_model');
								$this->load->helper("location");
								
								$me = $this->user->load(1);
								$me = $me[0];
								$peppers = $this->venue->load(1);
								$peppers = $peppers[0];
								$capital = $this->venue->load(7);
								$capital = $capital[0];
								
								$distanceToPeps = getDistance($me->lastLocationLat,	$me->lastLocationLong,	$peppers->latitude,	$peppers->longitude);
								$distanceToCap  = getDistance($me->lastLocationLat,	$me->lastLocationLong,	$capital->latitude,	$capital->longitude);
								//echo "To Peps: " . $distanceToPeps . ", To Capital: " . $distanceToCap;
								
								self::printJson($capital);
				}
				
				/** User Stuff **/
				
				public function getUser($userId) {
								if (!is_numeric($userId)) {
												throw new UnexpectedValueException("getUser(): You must provide an integer.");
								}
								$this->load->model('User_model');
								
								$user = $this->user->load(1);
								$user = $user[0];
								
								self::printJson($user);
				}
				
				public function updateUser($userId) {
								if (!isset($_POST)) {
												throw new AuthException("You're not logged in!");
								}
				}
				
				/**
				 * Handle the output of the JSON.
				 * Note: Only public fields of an object will be parsed
				 * @param mixed $json An array or object
				 */
				private static function printJson($json) {
								header('Content-Type: application/json');
								print_r(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
								exit;
				}
			
}
