<?php
defined('BASEPATH') OR exit('No direct script access allowed');

switch (ENVIRONMENT) {
				case 'production':
								$active_group = 'prod';
								break;
    case 'testing':
        $active_group = 'heroku';
        break;
				case 'development':
				default: 
								$active_group = 'default';
								break;
}

$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => '',
	'database' => 'cheapskate',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['testing'] = array(
	'dsn'	=> '',
	'hostname' => 'heroku_e84f3a3dae95dbf',
	'username' => 'b748a84c5866a1',
	'password' => 'cb1e6811',
	'database' => 'cheapskate',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['prod'] = array(
	'dsn'	=> '',
	'hostname' => '127.8.5.2',
	'username' => 'adminkt2XwTC',
	'password' => 'Tyg-g32fHqAU',
	'database' => 'cheapskate',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
