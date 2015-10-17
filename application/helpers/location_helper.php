<?php

const EARTH_RADIUS_KM = 6371;
const EARTH_RADIUS_MI = 3958;

/**
	* Get the distance (in KM) of a users position vs a venue
	* @param type $userLat
	* @param type $userLong
	* @param type $venueLat
	* @param type $venueLong
	* @return int Returns a user's distance from a venue in KM
	*/
function getDistance($userLat, $userLong, $venueLat, $venueLong) {  
				$dLat = deg2rad($venueLat - $userLat);  
				$dLon = deg2rad($venueLong - $userLong);  

				$a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($userLat)) * cos(deg2rad($venueLat)) * sin($dLon / 2) * sin($dLon / 2);  
				$c = 2 * asin(sqrt($a));  
				$d = EARTH_RADIUS_KM * $c;  

				return $d;  
}

