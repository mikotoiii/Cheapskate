<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
				"login" => array (
								array(
												'field' => 'userName', 
												'label' => 'Username', 
												'rules' => 'required|trim|alpha_dash|xss_clean|min_length[3]|max_length[50]'
								),
								array(
												'field' => 'password', 
												'label' => 'Password', 
												'rules' => 'required|trim|alpha_dash|xss_clean|min_length[3]|max_length[50]'
								)
				),
				"signup" => array(
								array(
												'field' => 'userName', 
												'label' => 'Username', 
												'rules' => 'required|trim|alpha_dash|xss_clean|min_length[3]|max_length[50]'
								),
								array(
												'field' => 'password', 
												'label' => 'Password', 
												'rules' => '|trim|alpha_dash|xss_clean|min_length[3]|max_length[50]'
								),
								array(
												'field' => 'passconf', 
												'label' => 'Confirm Password', 
												'rules' => '|trim|alpha_dash|xss_clean|min_length[3]|max_length[50]'
								),
								array(
												'field' => 'email', 
												'label' => 'Email', 
												'rules' => '|trim|alpha_dash|xss_clean|min_length[7]|max_length[50]|valid_email'
								)
				)
);
