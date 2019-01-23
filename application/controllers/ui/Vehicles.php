<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");

class Vehicles extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Jalali_date');
    }

    public function index()
    {
        $this->view('vehicles/index', array("active_menu" => "m-vehicles", "title" => "خودروها"));
    }

    public function vehicles_list()
    {
        require APPPATH . "third_party/datatable-ssp/ssp.class.php";

        $table = 'vehicles';

        // Table's primary key
        $primaryKey = 'id';

        $columns = array(
            array('db' => 'id', 'dt' => 'id'),
            array('db' => 'vehicle_brand', 'dt' => 'vehicle_brand'),
            array('db' => 'vehicle_model', 'dt' => 'vehicle_model')
        );

        echo json_encode(SSP::simple($_GET, $this->build_sql_details(), $table, $primaryKey, $columns));
    }

    public function add_vehicle()
    {
        if ($this->is_get_request()) {
            return $this->view('vehicles/add_vehicle', array("active_menu" => "m-vehicles", "title" => "خودروها"));
        }

        $vehicle_model = $this->input->post("vehicle_model");
        $vehicle_brand = $this->input->post("vehicle_brand");

        $pic = null;
        if (isset($_FILES['car_image'])) {
            // upload file
            $config['upload_path']   = FCPATH . CAR_IMAGE_PATH;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 0;
            $config['file_name']     = time();
            $this->load->library('upload', $config);
            $this->upload->do_upload("car_image");
            $pic = $this->upload->data("file_name");
        }

        if ($pic) {
            $res = $this->db->insert("vehicles", compact("vehicle_brand", "vehicle_model", "pic"));
        } else {
            $res = $this->db->insert("vehicles", compact("vehicle_brand", "vehicle_model"));
        }
        if ($res)
            $this->msg("success");

        redirect("ui/vehicles/index");
    }

    // public function add_unit()
    // {
    //     if (empty($this->input->post("unit_name"))) {
    //         return ejson(false, "Empty unit name.");
    //     }
    //     $cats = $this->db->get_where("units", array("unit_name" => $this->input->post("unit_name")))->result_array();
    //     if (count($cats) > 0) {
    //         return ejson(false, "Duplicate unit name.");
    //     }
    //
    //
    //     $res = $this->db->insert('units', array("unit_name" => $this->input->post("unit_name")));
    //     if (!$res) {
    //         return ejson(false, "خطا در انجام عملیات.");
    //     }
    //
    //     return ejson(true, "");
    // }

    public function vehicle_services()
    {
        $id      = $this->input->get("id", true);
        $vehicle = $this->db->get_where("vehicles", array("id" => $id))->row(0, "array");

        $products = $this->db->select('products.*')
                             ->from('products')
                             ->get()
                             ->result_array();

        $products_with_price = $this->db->select('products.*')
                                        ->select("vehicle_product_prices.price as service_price,vehicle_product_prices.vehicle_id")
                                        ->from("products")
                                        ->join("vehicle_product_prices", "products.id = vehicle_product_prices.product_id", "left")
                                        ->where("vehicle_product_prices.vehicle_id", $id)
                                        ->get()
                                        ->result_array();
        // pre($products_with_price);
        foreach ($products as &$p) {
            $p['service_price'] = 0;
            foreach ($products_with_price as $pp) {
                if ($p['id'] == $pp['id'] && isset($pp['service_price'])) {
                    $p['service_price'] = $pp['service_price'];
                }
            }
        }

        $this->view("vehicles/vehicle_service", compact("id", "vehicle", "products"));
    }


    public function vehicle_service_update()
    {
        $vehicle_id = $this->input->post('vehicle_id');
        $products   = array();
        foreach ($_POST as $k => $v) {
            if (startsWith($k, "product")) {
                $id         = explode('_', $k)[1];
                $products[] = array("product_id" => $id, "price" => $v);
                $this->db->trans_start();
                $this->db->where("vehicle_id", $vehicle_id)
                         ->where("product_id", $id)
                         ->delete("vehicle_product_prices");
                $this->db->insert("vehicle_product_prices", array(
                    "vehicle_id" => $vehicle_id,
                    "product_id" => $id,
                    "price"      => $v
                ));
                $this->db->trans_complete();
            }
        }

        redirect("ui/vehicles/index");
    }

}
