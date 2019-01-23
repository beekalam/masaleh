<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");

class Suggestions extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Jalali_date');
    }

    public function index()
    {
        $this->view('suggestions/index', array("active_menu" => "m-customer-suggestions", "title" => "انتقادات"));
    }

    public function suggestion_list()
    {
        $this->load->helper("persiandate");
        require APPPATH . "third_party/datatable-ssp/ssp.class.php";

        $table = 'view_customer_suggestions';

        // Table's primary key
        $primaryKey = 'customer_suggestions_id';

        $columns = array(
            array('db' => 'customer_suggestions_id', 'dt' => 'customer_suggestions_id'),
            array('db' => 'suggestion', 'dt' => 'suggestion'),
            array('db' => 'customer_suggestions_created_at', 'dt' => 'customer_suggestions_created_at'),
            array('db' => 'firstname', 'dt' => 'firstname'),
            array('db' => 'lastname', 'dt' => 'lastname'),
            array('db' => 'mobile', 'dt' => 'mobile')
        );
        $res = SSP::simple($_GET, $this->build_sql_details(), $table, $primaryKey, $columns);

        foreach($res["data"] as &$r){
                $r['customer_suggestions_created_at_fa'] = convert_gregorian_iso_to_jalali_iso($r['customer_suggestions_created_at']);
                $r['customer_suggestions_created_at_fa'] = explode(' ',$r['customer_suggestions_created_at'])[1]
                    ." " .  $r['customer_suggestions_created_at_fa'];
        }
        echo json_encode($res);
    }

}
