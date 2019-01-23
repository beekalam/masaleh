<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");

class Settings extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Jalali_date');
    }

    public function index()
    {
        $this->load->model("Settings_model");
        $this->load->helper("utils_helper");
        $data = $this->Settings_model->get_settings_array();
        // pre($data);
        $data['active_menu'] = 'm-settings';
        $data['title']       = 'تنظیمات';
        $data['sliders']     = $this->db->get("sliders")->result_array();

        foreach ($data["sliders"] as &$slider) {
            $slider['pic_absolute_path'] = base_url(SLIDER_IMAGE_PATH . "/" . $slider['slider_image']);
        }

        $wallet_discount = $this->db->get_where("app_settings", array("name" => "wallet_discount"))
                                    ->row(0, "array");
        $rules           = $this->db->get_where("app_settings", array("name" => "rules"))
                                    ->row(0, "array");

        $data["wallet_discount"] = isset($wallet_discount['value']) ? $wallet_discount['value'] : 0;
        $data['rules']           = isset($rules['value']) ? $rules['value'] : 0;
        $data['our_services']    = $this->db->get("our_services")->result_array();
        foreach ($data['our_services'] as &$service) {
            $service['pic_absolute_path'] = base_url(OUR_SERVICES_PATH . "/" . $service['pic']);
        }
        $this->view('settings/settings', $data);
    }

    public function change_picture()
    {
        $image     = $this->input->post("img");
        $slider_id = $this->input->post('slider_id');
        $old_image = $this->db->get_where("sliders", array("id" => $slider_id))->row(0, "array");
        $name      = "";

        //save image
        try {
            $name = base64_imagestring_save($image, FCPATH . SLIDER_IMAGE_PATH, time());
        } catch (Exception $e) {
            @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $name);
            return ejson(false, $e->getMessage());
        }

        //update new category image
        $res = $this->db->set("slider_image", $name)
                        ->where("id", $slider_id)
                        ->update("sliders");

        // delete old image
        @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $old_image['pic']);

        return ejson(true);
    }

    public function new_slider()
    {
        $image = $this->input->post('img');

        $name = '';
        //save image
        try {
            $name = base64_imagestring_save($image, FCPATH . SLIDER_IMAGE_PATH, time());
        } catch (Exception $e) {
            @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $name);
            return ejson(false, $e->getMessage());
        }

        $res = $this->db->insert("sliders", array("slider_image" => $name));

        return ejson(true);
    }

    public function delete_slider()
    {
        $slider_id = $this->input->post('slider_id');
        $slider    = $this->db->get_where("sliders", array("id" => $slider_id))->row(0, "array");
        if ($slider) {
            $res = $this->db->where('id', $slider_id)->delete('sliders');
            @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $slider['slider_image']);
        }
        return ejson(true);
    }

    public function change_slider_description()
    {
        $slider_id   = $this->input->post("slider_id");
        $description = $this->input->post("description");

        $res = $this->db->set("description", $description)
                        ->where("id", $slider_id)
                        ->update("sliders");

        // if ($res) {
        //     $this->show_msg("عملیات با موفقیت انجام شد.");
        // }
        //
        // $this->show_err("خطا در انجام عملیات.");
        $this->msg("عملیات با موفقیت انجام شد.");
        redirect("ui/settings/index");
    }

    public function update_wallet_discount()
    {
        $wallet_discount = $this->input->post("wallet_discount");
        $this->db->set("value", $wallet_discount)
                 ->where("name", "wallet_discount")
                 ->update("app_settings");
        redirect("ui/settings/index");
    }

    public function update_rules()
    {
        $rules = $this->input->post("rules");
        $this->db->set("value", $rules)
                 ->where("name", "rules")
                 ->update("app_settings");
        redirect("ui/settings/index");
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function site_settings_index()
    {
        $this->load->model("Settings_model");
        $data                = $this->Settings_model->get_settings_array();
        $data['active_menu'] = 'm-settings';
        $data['title']       = 'تنظیمات';
        // $data["sliders"]     = $this->db->get("sliders")->result_array();
        // foreach ($data["sliders"] as &$slider) {
        //     $slider["pic_absolute_path"] = base_url(SLIDER_IMAGE_PATH . "/" . $slider["slider_image"]);
        // }
        // var_dump($data);
        // $this->view('settings/settings', $data);
        // $this->adminView("settings/index", $data);
    }

    public function update_settings()
    {
        $this->load->model("settings_model");
        $settings = $this->settings_model->get_settings_array();

        foreach ($settings as $k => $v) {
            if (isset($_POST[$k]) && !empty($_POST[$k])) {
                $this->db->set("value", $_POST[$k])
                         ->where("name", $k)
                         ->update("app_settings");
                // $this->show_msg("عملیات با موفقیت انجام شد.");
            }
        }

        redirect("ui/settings/index");
    }

    public function update_about_us()
    {
        $this->load->model("settings_model");
        $about_us_long    = $this->input->post("about_us_long");
        $about_us_long_en = $this->input->post("about_us_long_en");

        $res = $this->settings_model->update_key("about_us_long", $about_us_long);
        $res = $this->settings_model->update_key("about_us_long_en", $about_us_long_en);

        redirect("ui/settings/index");
    }

    public function update_contact_us()
    {
        $this->load->model("settings_model");
        $contact_us    = $this->input->post("contact_us");
        $contact_us_en = $this->input->post("contact_us_en");
        $this->load->model("settings_model");


        $res = $this->settings_model->update_key("contact_us", $contact_us);
        $res = $this->settings_model->update_key("contact_us_en", $contact_us_en);
        redirect("settings/index");
    }

    public function update_location()
    {
        $this->load->model("settings_model");
        foreach (array("location_lat", "location_lng", "location_zoom") as $k) {
            if (isset($_POST[$k])) {
                $res = $this->settings_model->update_key($k, $this->input->post($k));
            }
        }

        redirect("admin/settings/index");
    }


    //<editor-fold desc="slider">
    // public function change_picture()
    // {
    //     $image     = $this->input->post("img");
    //     $slider_id = $this->input->post('slider_id');
    //     $old_image = $this->db->get_where("sliders", array("id" => $slider_id))->row(0, "array");
    //     $name      = "";
    //
    //     //save image
    //     try {
    //         $name = base64_imagestring_save($image, FCPATH . SLIDER_IMAGE_PATH, time());
    //     } catch (Exception $e) {
    //         @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $name);
    //         return ejson(false, $e->getMessage());
    //     }
    //
    //     //update new category image
    //     $res = $this->db->set("slider_image", $name)
    //                     ->where("id", $slider_id)
    //                     ->update("sliders");
    //
    //     // delete old image
    //     @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $old_image['pic']);
    //
    //     return ejson(true);
    // }

    public function change_description()
    {
        $description = $this->input->post("description");
        $slider_id   = $this->input->post("slider_id");

        $res = $this->db->set("description", $description)->where("id", $slider_id)->update("sliders");

        if ($res) {
            return ejson(true);
        }

        return ejson(false);
    }
    //
    // public function new_slider()
    // {
    //     $image = $this->input->post('img');
    //
    //     $name = '';
    //     //save image
    //     try {
    //         $name = base64_imagestring_save($image, FCPATH . SLIDER_IMAGE_PATH, time());
    //     } catch (Exception $e) {
    //         @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $name);
    //         return ejson(false, $e->getMessage());
    //     }
    //
    //     $res = $this->db->insert("sliders", array("slider_image" => $name));
    //
    //     return ejson(true);
    // }
    //
    // public function delete_slider()
    // {
    //     $slider_id = $this->input->post('slider_id');
    //     $slider    = $this->db->get_where("sliders", array("id" => $slider_id))->row(0, "array");
    //     if ($slider) {
    //         $res = $this->db->where('id', $slider_id)->delete('sliders');
    //         @unlink(FCPATH . SLIDER_IMAGE_PATH . DIRECTORY_SEPARATOR . $slider['slider_image']);
    //     }
    //     return ejson(true);
    // }
    //</editor-fold>

    public function new_service()
    {
        $image = $this->input->post('img');

        $name = '';
        //save image
        try {
            $name = base64_imagestring_save($image, FCPATH . OUR_SERVICES_PATH, time());
        } catch (Exception $e) {
            @unlink(FCPATH . OUR_SERVICES_PATH . DIRECTORY_SEPARATOR . $name);
            return ejson(false, $e->getMessage());
        }

        $res = $this->db->insert("our_services", array("pic"      => $name,
                                                       "title"    => "title",
                                                       "subtitle" => "subtitle"));

        return ejson(true);
    }

    public function change_service_descriptions()
    {
        $title      = $this->input->post("title", true);
        $subtitle   = $this->input->post("subtitle", true);
        $service_id = $this->input->post("service_id", true);
        $this->db->where("id", $service_id)
                 ->set("title", $title)
                 ->set("subtitle", $subtitle)
                 ->update("our_services");
        $this->msg("عملیات با موفقیت انجام شد.");
        redirect("ui/settings/index");
    }

    public function delete_service()
    {
        $service_id = $this->input->post('service_id');
        $service    = $this->db->get_where("our_services", array("id" => $service_id))->row(0, "array");
        if ($service) {
            $res = $this->db->where('id', $service_id)->delete('our_services');
            @unlink(FCPATH . OUR_SERVICES_PATH . DIRECTORY_SEPARATOR . $service['pic']);
        }
        return ejson(true);
    }
}
