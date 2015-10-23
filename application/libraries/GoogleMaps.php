<?php	defined('BASEPATH')	OR	exit('No direct script access allowed');

/**
 * Class with API calls to Google Maps
 */
class GoogleMaps {
    
    private $CI;
    
    public function __construct() {
         $this->CI =& get_instance();
         $this->CI->load->config('googleMaps',	TRUE,	TRUE);
    }
    
    public function searchVenueByName($name) {
        
    }
    
    public function searchVenueByType($type) {
        
    }
    
    /**
     * Make a call to the Google Maps API and retreive a result
     * @param string $method The webservice method to call, with slashes
     * @param array $params An array of the params
     * @param string $type What type of results to return: JSON, PHP, STRING, or RAW
     * @return mixed Returns what you ask for 
     * 
     * TODO: Need to add error handling of ALL types in here.
     */
    public function call($method, $params, $type = 'json') {
        $url = $this->CI->config->item("GOOGLE_MAPS_BASE_URL", 'googleMaps') . $method .
                "/" . $type . "?" .
                self::getParamString($params) . "&key=" .
                $this->CI->config->item("GOOGLE_MAPS_API_KEY", 'googleMaps');
        $result = file_get_contents($url);
        
        return json_decode($result);
    }
    
    private static function getParamString($params) {
        $str = "";
        $count = 0;
        $size = count($params);
        foreach ($params as $k => $v) {
            $str .= $k . "=" . $v;
          if ($count != $size - 1) {
              $str .= "&";
          }
          $count++;
        }

        return(str_replace(" ", "+", $str));
    }
    
}
