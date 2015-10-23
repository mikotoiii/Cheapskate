<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Handle the output of the JSON.
 * Note: Only public fields of an object will be parsed
 * @param mixed $json An array or object
 */
function printJson($json) {
    header('Content-Type: application/json');
    print_r(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    exit;
}
