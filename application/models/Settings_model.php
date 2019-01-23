<?php

class Settings_model extends CI_Model
{

    function __construct()
    {
// Call the Model constructor
        parent:: __construct();
    }

    function get_settings_data()
    {
        //fixme: remove
        // $cache = new Cache();

        // if ($cache->has('settings')) {
        //     return $cache->get('settings');
        // }

        $settings_res = $this->db->get('app_settings')->result_array();
        $settings     = array();
        foreach ($settings_res as $sr) {
            $settings[$sr["name"]] = $sr["value"];
        }


        // $cache->set('settings', $settings, 300);  //fixme: remove

        return $settings;
    }

    public function get_settings_array()
    {
        $settings_res = $this->db->get('app_settings')->result_array();
        $settings     = array();
        foreach ($settings_res as $sr) {
            $settings[$sr["name"]] = $sr["value"];
        }

        // if (!empty($settings[API_CHARTER_724]))
        //     $settings[API_CHARTER_724] = object_to_array(json_decode($settings[API_CHARTER_724]));
        //
        // if (!empty($settings[RMONEY])) {
        //     $settings[RMONEY] = object_to_array(json_decode($settings[RMONEY]));
        // }

        return $settings;
    }

    public function update_key($name, $value)
    {
        return $this->db->set("value", $value)->where("name", $name)->update("app_settings");
    }

}