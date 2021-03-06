<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Model.
 * Inherit this, add your properties, and call load.
 * Your database fields must be named EXACTLY the same as the properties
 * Then everything works like magic and you'll love it.
 * The only properties that get JSON encoded are public. Oh well.
 */
class baseModel extends CI_Model {

    protected $clazz = null;
    protected $reflector = null;
    protected $table = null;
    protected $properties = null;

    public function __construct() {
        $this->clazz = get_class($this);
        
        try {
            $this->reflector = new ReflectionClass($this->clazz);
            $this->table = strtolower($this->reflector->getShortName());
            $this->properties = $this->reflector->getProperties(ReflectionProperty::IS_PUBLIC);
        } catch (Exception $e) {
            error_log($e);
        }
    }

    /**
     * Magic load a table
     * @param mixed $id Can be an single int $id, an array of IDs, or an array of objects with an id property
     * @return mixed Returns an array of results if there are > 1, or just the object if there is one.
     */
    public function load($id) {

        if (is_numeric($id)) {
            $this->db->where('id', $id);
        } else if (is_array($id) && count($id) > 0) {
            $ids = array();
            foreach ($id as $i) {
                if (is_object($i)) {
                    array_push($ids, $i->id);
                } else if (is_numeric((int)$i)) {
                    array_push($ids, $i);
                }
            }
            $this->db->where_in('id', $ids);
        }
        
        $query = $this->db->get($this->table);
        $results = $query->result();
        
        $items = array();
        foreach ($results as $result) {
            foreach ($this->properties as $property) {
                // Ignore any public properties from the inherited class
                if (strtolower($property->class) !== $this->table) {
                    continue;
                }

                try {
                    if (isset($result->{$property->name})) {
                        $this->{$property->name} = $result->{$property->name};
                    }
                } catch (Exception $e) {
                    error_log($e);
                }
            }

            $items[] = clone($this);
        }

        return $items;
    }
    
    /**
     * Update the object with new data
     * @param type $data
     */
    public function update($data) {
        $model = $this->clazz; //ucfirst($this->table);
        
        $this->load->model($model);
        $item = $this->{$model}->load($data->id);
       
        foreach ($this->properties as $property) {
            if (strtolower($property->class) !== $this->table) {
                continue;
            }
            
            if ($item->{$property->name} != $data->{$property->name}) {
                try {
                    if (isset($data[$property->name])) {
                        $item->{$property->name} = $data->{$property->name};
                    }
                } catch (Exception $e) {
                    error_log($e);
                }
            } 
        }
        
    }
    
    /**
     * Save the current object to the DB
     */
    public function save() {
        $this->update($this);
    }
    
    public function create($data) {
        throw Exception("Not implemented yet.");
    }
    
    public function delete($id) {
        throw Exception("Not implemented yet.");
    }
    
    /**
     * Check to see if an item exists (by it's ID)
     * @param string $key The field you want to search for
     * @param mixed $value The value to search for
     * @return boolean Returns the array of item id(s) or false if the item doesn't exist
     * @throws Exception Throws an exception if the object doesn't have an ID.
     */
    public function exists($key, $value) {
        
        $query = $this->db->where($key, $value)->select('id')->get($this->table);
        $result = $query->result();
        
        return !empty($result) ? $result : false;
    }

    /**
     * A barely convenient method 
     * @param type string $q The query string
     * @param string add something after the where clause
     * @return array
     */
    protected function doQuery($q) {
        $query = $this->db->query($q);
        return $query->result();
    }
}

class My_Model {} // CI needs this