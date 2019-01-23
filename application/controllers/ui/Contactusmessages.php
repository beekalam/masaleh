<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");

class Contactusmessages extends Base
{
    function __construct()
    {
        parent::__construct();
        // $this->add_sitemap_path(array("title"     => "پیغام ها",
        //                               "href"      => base_url('admin//index'),
        //                               "separator" => "fa fa-angle-left"));

    }

    public function index()
    {
        $data = array("active_menu" => "m-manage-contactus-messages",
                      "title"       => "پیغام ها");

        $this->view("contactusmessages/index", $data);
    }

    public function message_list()
    {
        require APPPATH . "third_party/datatable-ssp/ssp.class.php";

        $table = 'contactus_messages';

        // Table's primary key
        $primaryKey = 'id';

        $columns = array(
            array('db' => 'id', 'dt' => 'id'),
            array('db' => 'email', 'dt' => 'email'),
            array('db' => 'message', 'dt' => 'message'),
            array('db' => 'created_at', 'dt' => 'created_at'),
            // array('db' => 'updated_at', 'dt' => 'updated_at'),
            // array('db' => 'user_id', 'dt' => 'user_id'),
            // array('db' => 'username', 'dt' => 'username'),
            // array('db' => 'first_name', 'dt' => 'first_name'),
            // array('db' => 'last_name', 'dt' => 'last_name'),
        );

        echo json_encode(SSP::simple($_GET, $this->build_sql_details(), $table, $primaryKey, $columns));
    }

    public function delete_message()
    {
        $id = $this->input->post("id");
        $this->db->where("id", $id)->delete("contactus_messages");
        ejson(true);
    }

}
