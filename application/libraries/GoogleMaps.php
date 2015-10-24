<?php	defined('BASEPATH')	OR	exit('No direct script access allowed');

/**
 * Class with API calls to Google Maps
 */
class GoogleMaps {
    
    /**
     * Make sure you load this by reference!!!
     * @var CI The code igniter instance
     */
    private $CI;
    
    public function __construct() {
         $this->CI =& get_instance();
         $this->CI->load->config('googleMaps',	TRUE,	TRUE);
    }
    
    public function searchVenueByName($name) {
        throw new BadMethodCallException("searchVenueByName() Not implemented yet.");
    }
    
    public function searchVenueByType($type) {
        throw new BadMethodCallException("searchVenueByType() Not implemented yet.");
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
        $url = $this->CI->config->item("GOOGLE_MAPS_BASE_URL", 'googleMaps')
                . $method . "/" . $type . "?" .
                self::getParamString($params) . "&key=" .
                $this->CI->config->item("GOOGLE_MAPS_API_KEY", 'googleMaps');
        $result = file_get_contents($url);
        
        return json_decode($result);
    }
    
    /**
     * Build a query string.
     * We use this instead of using a builtin because it will mess up commas
     * @param array $params An associative array of query params and values
     * @return string Returns a formatted query string for the API call
     */
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
