<?php
/**
 * Base Model.
 * Inherit this, add your properties, and call load.
 * Your database fields must be named EXACTLY the same as the properties
 * Then everything works like magic and you'll love it.
 */
class baseModel extends CI_Model {
				private $clazz = null;
				public function baseModel($clazz) {
								$this->clazz = $clazz;
				}
				
				/**
				 * Magic load a table
				 * @param type $id
				 * @return \BaseModel
				 */
				protected function load($id) {
								
								try {
												$reflector = new ReflectionClass($this->clazz);
												$table = $reflector->getShortName();
								} catch (Exception $e) {
												error_log($e);
								}

								$properties = $reflector->getProperties(ReflectionProperty::IS_PRIVATE);
								$q = "select * from {$table} where id={$id}";
								$query = $this->db->query($q);
								$result = $query->result();
								
								foreach ($properties as $property) {
												try {
																$this->{$property->getName()} = $result->{$property->getName()};
												} catch (Exception $e) {
																error_log($e);
												}
								}
								
								return $this;
				}
				
}