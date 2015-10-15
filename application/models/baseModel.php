<?php
/**
 * Base Model.
 * Inherit this, add your properties, and call load.
 * Your database fields must be named EXACTLY the same as the properties
 * Then everything works like magic and you'll love it.
 * The only properties that get JSON encoded are public. Oh well.
 */
class baseModel extends CI_Model {
				private $clazz = null;
				public function baseModel($clazz) {
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
												$table = $reflector->getShortName();
								} catch (Exception $e) {
												error_log($e);
												die;
								}

								$properties = $reflector->getProperties(ReflectionProperty::IS_PUBLIC);
								
								if (is_numeric($id)) {
												$q = "select * from `{$table}` where id={$id}";
								} else if (is_array($id)) {
												$q = "select * from `{$table}` where ";
												$q .= $this->getIdString($id);
								}
								$query = $this->db->query($q);
								$results = $query->result();
								$venues = array();
								
								foreach ($results as $result) {
												foreach ($properties as $property) {
																if ($property->class !== $table) {
																				continue;
																}

																try {
																				$this->{$property->name} = $result->{$property->name};
																} catch (Exception $e) {
																				error_log($e);
																				die;
																}
												}
												
												$venues[] = clone($this);
								}
								
								return $venues; // load is for a single instance, right?
				}
				
				/**
				 * A barely convenient method 
				 * @param type string $q The query string
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