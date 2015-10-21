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
				 * @return \BaseModel
				 */
				public function load($id) {
								
								try {
												$reflector = new ReflectionClass($this->clazz);
												$table = strtolower(str_ireplace("_model", "", $reflector->getShortName()));
								} catch (Exception $e) {
												error_log($e);
												die;
								}

								$properties = $reflector->getProperties(ReflectionProperty::IS_PUBLIC);
								if (is_numeric($id)) {
												$q = "select * from `{$table}` where id={$id}";
								} else if (is_array($id) && count($id) > 0) {
												$q = "select * from `{$table}` where ";
												$q .= $this->getIdString($id);
								}
								$query = $this->db->query($q);
								$results = $query->result();
								
								$items = array();
								
								foreach ($results as $result) {
												foreach ($properties as $property) {
																if (strtolower(str_ireplace("_model", "", $property->class)) !== $table) {
																				continue;
																}

																try {
																				if (isset($result->{$property->name})) {
																								$this->{$property->name} = $result->{$property->name};
																				}
																} catch (Exception $e) {
																				error_log($e);
																				//die;
																}
												}
												
												$items[] = clone($this);
								}
								
								return $items; // load is for a single instance, right?
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
				
				private function getIdString($array) {
								$str = "";
								$arSize = count($array);
								
								for ($i = 0; $i < $arSize; $i++) {
												$str .= "id=" . $array[$i]->id;
												if ($i != $arSize - 1) {
																$str .= " or ";
												}
								}
								
								return $str;
				}
}

class My_Model { } // CI needs this