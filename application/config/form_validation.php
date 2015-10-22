<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
				"login" => array (
								array(
												'field' => 'userName', 
												'label' => 'Username', 
												'rules' => 'required|alpha_dash'
								),
								array(
												'field' => 'password', 
												'label' => 'Password', 
												'rules' => 'required'
								)
				),
				"signup" => array(
								array(
												'field' => 'userName', 
												'label' => 'Username', 
												'rules' => 'required|alpha_dash'
								),
								array(
												'field' => 'password', 
												'label' => 'Password', 
												'rules' => 'required|alpha_dash'
								),
								array(
												'field' => 'passconf', 
												'label' => 'Confirm Password', 
												'rules' => 'required|alpha_dash|matches[password]'
								),
								array(
												'field' => 'email', 
												'label' => 'Email', 
												'rules' => 'required|alpha_dash|valid_email'
								)
				)
);
