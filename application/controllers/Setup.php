<?php

class Setup extends CI_Controller {
				public function __construct()	{
								parent::__construct();
								$this->load->database();
				}
				
				public function resetDatabase() {
								$this->splitNrun(file_get_contents(APPPATH . "scripts/master.sql"));
								$this->splitNrun(file_get_contents(APPPATH . "scripts/defaultData.sql"));
								
								echo "Done.";
				}
				
				private function splitNrun($sql) {
								$sqls = explode(';', $sql);
								array_pop($sqls);

								foreach($sqls as $statement){
												$statement .=  ";";
												$this->db->query($statement);   
								}
				}
}