<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|min_length[3]|max_length[50]|callback_validateUserNameExists'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|alpha_numeric|min_length[3]|max_length[50]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'Confirm Password',
            'rules' => '|trim|alpha_numeric|min_length[3]|max_length[50]|matched[password]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|min_length[7]|max_length[50]|valid_email'
        )
    )
);
