<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Model.
 * Inherit this, add your properties, and call load.
 * Your database fields must be named EXACTLY the same as the properties
 * Then everything works like magic and you'll love it.
 * The only properties that get JSON encoded are public. Oh well.
 */
class baseModel extends CI_Model {

    private $clazz = null;

    public function __construct($clazz) {
        $this->clazz = $clazz;
    }

    /**
     * Magic load a table
     * @param type mixed $id Can be an single int $id, or an array of objects with an id property
     * @return mixed Returns an array of results if there are > 1, or just the object if there is one.
     */
    public function load($id) {

        try {
            $reflector = new ReflectionClass($this->clazz);
            $table = strtolower($reflector->getShortName());
        } catch (Exception $e) {
            error_log($e);
            die;
        }

        $properties = $reflector->getProperties(ReflectionProperty::IS_PUBLIC);
        if (is_numeric($id)) {
            $this->db->where('id', $id);
        } else if (is_array($id) && count($id) > 0) {
            $ids = array();
            foreach ($id as $i) {
                array_push($ids, $i->id);
            }
            
            $this->db->where_in('id', $ids);
        }
        
        $query = $this->db->get($table);
        $results = $query->result();
        
        $items = array();
        foreach ($results as $result) {
            foreach ($properties as $property) {
                if (strtolower($property->class) !== $table) {
                    continue;
                }

                try {
                    if (isset($result->{$property->name})) {
                        $this->{$property->name} = $result->{$property->name};
                    }
                } catch (Exception $e) {
                    //throw Exception("Property " . $ . $e->getMessage())
                    error_log($e);
                    //die;
                }
            }

            $items[] = clone($this);
        }

        return $items;
    }
    
    public function update($data) {
        
        try {
            $reflector = new ReflectionClass($this->clazz);
            $table = strtolower($reflector->getShortName());
        } catch (Exception $e) {
            error_log($e);
        }
        
        $properties = $reflector->getProperties(ReflectionProperty::IS_PUBLIC);
        
        foreach ($properties as $property) {
            if (strtolower($property->class) !== $table) {
                continue;
            }

            try {
                if (isset($data[$property->name])) {
                    $this->{$property->name} = $result->{$property->name};
                }
            } catch (Exception $e) {
                //throw Exception("Property " . $ . $e->getMessage())
                error_log($e);
                //die;
            }
        }
    }
    
    public function create($data) {
        throw Exception("Not implemented yet.");
    }
    
    /**
     * Check to see if an item exists (by it's ID)
     * @param mixed $id can be an integer ID, or an object with an id property
     * @return boolean Returns true if the item exists
     * @throws Exception Throws an exception if the object doesn't have an ID.
     */
    public function exists($id) {
        if (is_object($id)) {
            if (property_exists("id")) {
                $id = $id->id;
            } else {
                throw new Exception("Object doesn't have an ID. It might not have been initalized.");
            }
        }
        
        $query = $this->db->select("id", strtolower($this->clazz));
        
        return count($query->result()) === 1;
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

class My_Model {}

// CI needs this