<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . "/BASE_REST_Controller.php";

class Vehicle extends BASE_REST_Controller
{
    public function vehicles()
    {
        $v = $this->db->get("vehicles")->result_array();
        $this->resp(true,$v);
    }
}