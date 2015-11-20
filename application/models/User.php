<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The User
 */
class User extends baseModel {

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
        parent::__construct(); // Needs to be here
        $this->load->database();
    }

    /**
     * Get user by a user ID
     * @param int $id
     * @return \User Returns the User object
     */
    public function getUserById($id) {
        $this->load($id);

        return $this;
    }

    /**
     * Returns the user object if it exists
     * @param string $userName Either a username or email address
     * @return User Returns the user object if it exist, false if not
     */
    public function getUserByUserNameOrEmail($userName) {
        $this->load->model("User");

        $what = "userName";
        if (filter_var($userName, FILTER_VALIDATE_EMAIL) !== false) {
            $what = "email";
        }

        $this->db->where($what, $userName);
        $this->db->select('id');
        $query  = $this->db->get("user");
        $result = $query->result();

        if (empty($result)) {
            return false;
        }
        
        return $this->User->load($result[0]->id);
    }
    
    /**
     * Get a user based on data passed in from the login
     * This can be any fields you want to use to uniquely id a user
     * @param array $data An array of fieldname => value items to use in the WHERE
     * @return array Returns the e
     */
    public function getUserFromLogin($data) {
        $this->db->where($data);
        $query = $this->db->get("User");
        $result = $query->result();
        
        return empty($result) ? false : $result[0];
        
    }
    
    public function getUserPassword($data) {
        $this->db->where($data);
        $this->db->select("password");
        $query = $this->db->get("user");
        $result = $query->result();
        
        return empty($result) ? false : $result[0]->password;
    }
    
    public function addNewUser($data) {
        
        if ($this->getUserByUserNameOrEmail($data['userName'])){
            return false;
        }
        // Override and set some data before entering it into the DB
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $passwordHash;
        
        $data['dob'] = date("Y-m-d", strtotime($data['dob']));
        // Insert the modified data into the DB
        $this->db->insert('user', $data);
        return true;
    }

}
