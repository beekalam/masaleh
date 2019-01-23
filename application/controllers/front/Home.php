<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");

class Home extends Base
{
    function __construct()
    {
        $this->checkAuthorization = false;
        parent::__construct();
        $this->load->library('Jalali_date');
    }

    public function index()
    {
        $data["our_services"] = $this->db->get("our_services")->result_array();
        foreach ($data["our_services"] as &$service){
            $service['pic_absolute_path'] = base_url(  OUR_SERVICES_PATH . "/" . $service['pic']);
        }
        
        $this->load->view("front/index", $data);
    }

    public function rules()
    {
        $data["our_services"] = $this->db->get("our_services")->result_array();
        $data['services_text'] = implode(", ",array_column($data['our_services'],'title'));

        $this->load->view('front/rules', $data);
    }

    public function complaint()
    {
        if ($_POST) {
            $this->load->view('front/complaint', array("show_message" => true));
        } else {
            $this->load->view('front/complaint', array());
        }
    }

    public function aboutus()
    {
        $this->load->model("Settings_model");
        $data = $this->Settings_model->get_settings_array();
        $this->load->view("front/about_us", $data);
    }

    public function contactus()
    {
        $this->load->model("Settings_model");
        $data["settings"] = $this->Settings_model->get_settings_array();
        $this->load->view("front/contact_us", $data);
    }

    public function concatus_form()
    {
        $this->load->library('email');
        $this->load->helper('email');
        $this->load->model("Settings_model");
        $settings          = $this->Settings_model->get_settings_array();
        $email             = $this->input->post("email");
        $message           = $this->input->post("message");
        $data              = array("title" => "مت کار");
        $data["settings"]  = $settings;
        $data['show_form'] = true;
        // !isset($_POST['captcha']);
        if (!isset($_POST['email']) || !isset($_POST['message'])) {
            $data['error_msg'] = 'Please fill all the form data.';
            // $this->view('front/contact_us', $data);
            $this->load->view("front/contact_us", $data);
            return;
        }

        // if ($_POST['captcha'] != $_SESSION['captcha']) {
        //     $data['error_msg'] = 'Wrong captcha';
        //     $data['email']     = $email;
        //     $data['message']   = $message;
        //     $this->view('front/contactus', $data);
        //     return;
        // }

        if (!valid_email($email)) {
            $data['error_msg'] = 'Invalid Email.';
            // $this->view('front/contact_us', $data);
            $this->load->view("front/contact_us", $data);
            return;
        }

        $this->db->insert('contactus_messages', array('message' => $message,
                                                      'email'   => $email));
        $this->email->from('mat@matkar.ir', '');
        $this->email->to($settings["contactus_email"]);
        $this->email->subject('matkar');
        $this->email->message($message);
        $this->email->send();

        $data['success_msg'] = true;
        $data['show_form']   = true;

        $this->load->view("front/contact_us", $data);
    }


}
