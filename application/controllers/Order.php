<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . "/BASE_REST_Controller.php";
require APPPATH . "/third_party/jdf.php";

class Order extends BASE_REST_Controller
{
    private $service_availability = null;

    public function new_order()
    {
        // $this->load->helper("persiandate");
        $this->load->helper("utils");
        list($valid, $error) = $this->validate_new_order($_POST);
        if (!$valid) {
            return $this->resp(false, $error);
        }

        $product_id   = $this->input->post('product_id');
        $customer_id  = $this->input->post('customer_id');
        $vehicle_id   = $this->input->post("vehicle_id");
        $user_address = $this->input->post("address");
        $payment_type = $this->input->post('payment_type');
        $date         = $this->input->post("date");
        $date         = en_num($date);
        $time         = $this->input->post("time");
        $title        = $this->input->post("title");
        $description  = $this->input->post("description");
        $lat          = $this->input->post("lat");
        $lng          = $this->input->post("lng");

        // gregorian date
        $date = str_replace("/", "-", $date);
        list($year, $month, $day) = explode("-", $date);
        $gdate = jalali_to_gregorian($year, $month, $day, '-');
        $code  = time();

        $product  = $this->db->get_where("products", array("id" => $product_id))->row(0, "array");
        $customer = $this->db->get_where('customers', array("id" => $customer_id))->row(0, "array");
        if (is_null($product)) return $this->resp(false, "Product not found.");
        if (is_null($customer)) return $this->resp(false, "Customer not found.");

        $this->service_availability = $this->db->where("product_id", $product_id)
                                               ->where("date", $gdate)
                                               ->where("from_time <=", $time)
                                               ->where("to_time >", $time)
                                               ->get("service_dates")
                                               ->row(0, "array");

        //check for service date availablity
        if (is_null($this->service_availability)) {
            return $this->resp(false, "Service not available at $date $time($gdate)");
        }
        // check for service capacity
        if ($this->service_availability['used_capacity'] == $this->service_availability['capacity']) {
            return $this->resp(false, "Capacity is full.");
        }

        //get vehicle price for product
        $vehicle_service_price = $this->db->where(array(
            "product_id" => $product_id,
            "vehicle_id" => $vehicle_id
        ))->get("vehicle_product_prices")->row(0, "array");
        if (is_null($vehicle_service_price)) {
            return $this->resp(false, "Cannot find service price for vehicle.");
        }
        $product['price'] = $vehicle_service_price['price'];

        if ($product['price'] != 0)
            $to_pay = $product['price'];
        else
            return $this->resp(false, "Invalid product price.");

        if ($payment_type == WALLET_PAYMENT) {
            // if wallet payment check if user has enough credit
            if ($customer["wallet_credit"] < intval($to_pay)) {
                return $this->resp(false, "Not enough credit");
            }

            $this->db->trans_start();
            // remove credit from user wallet
            $app_settings     = $this->app_settings();
            $discount_percent = intval($app_settings["wallet_discount"]);
            if ($discount_percent > 0) {
                $discount = intval(($product["price"] * $discount_percent) / 100);
                $to_pay   -= $discount;
            }
            $new_credit = $customer['wallet_credit'] - $to_pay;
            $pay_method = "WALLET_PAYMENT";
            $this->db->where('id', $customer_id)
                     ->set("wallet_credit", $new_credit)
                     ->update("customers");

            // insert order
            $order_status = "ORDER_PAID";

            $this->db->insert("orders",
                compact("product_id", "customer_id", "user_address", "code", "to_pay", "date", "time",
                    "pay_method", "order_status", "title", "description", "lat", "lng"));
            $order_id = $this->db->insert_id();

            // insert wallet transaction
            $this->db->insert("wallet_transactions", array("amount"      => $to_pay,
                                                           "customer_id" => $customer_id,
                                                           "order_id"    => $order_id));

            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                return $this->resp(false, "Error completing transaction.");
            }

            $this->decrease_capacity($product_id, $gdate);
            return $this->resp(true, array("code"     => $code,
                                                  "order_id" => $order_id));
        } else if ($payment_type == BANK_PAYMENT) {
            $pay_method = "BANK_PAYMENT";
            $res      = $this->db->insert("orders",
                compact("product_id", "customer_id", "user_address", "code", "to_pay", "date",
                    "time", "pay_method", "title", "description", "lat", "lng"));

            $order_id = $this->db->insert_id();
            $this->decrease_capacity($product_id, $gdate);
            return $this->resp($res, array("code"        => $code,
                                           "order_id"    => $order_id,
                                           'payment_url' => base_url('ui/bank/pay?id=' . $order_id . "&code=" . $code)));
        } else if ($payment_type == CASH_PAYMENT) {
            $pay_method = "CASH_PAYMENT";

            $res      = $this->db->insert("orders",
                compact("product_id", "customer_id", "user_address", "code", "to_pay", "date",
                    "time", "pay_method", "title", "description", "lat", "lng"));
            $order_id = $this->db->insert_id();

            $this->decrease_capacity($product_id, $gdate);
            return $this->resp($res, array("code"     => $code,
                                           "order_id" => $order_id));
        }

        $this->resp(false, "Payment type is not provided.");
    }

    private function decrease_capacity($product_id, $gdate)
    {
        if (!is_null($this->service_availability)) {
            $this->db->where("product_id", $product_id)
                     ->where("date", $gdate)
                     ->set("used_capacity", $this->service_availability['used_capacity'] + 1)
                     ->update("service_dates");
        }
    }

    public function order_status()
    {
        if (!isset($_GET['order_id']) or empty($_GET['order_id'])) {
            return $this->resp(false, "Order_id not provided or empty.");
        }

        // find order
        $order = $this->db->get_where("orders", array("id" => $this->input->get('order_id')))
                          ->row(0, "array");
        if (is_null($order)) {
            return $this->resp(false, "Order not found.");
        }

        return $this->resp(true, $order);
    }

    private function validate_new_order($params)
    {
        foreach (array("product_id", "customer_id", "address", "date", "time", "payment_type", "vehicle_id") as $k) {
            if (!isset($params[$k])) {
                return array(false, "{$k} is not provided.");
            }

            if (empty($params[$k])) {
                return array(false, "No value provided for {$k}.");
            }
        }
        return array(true, "");
    }

    public function orders()
    {
        $page        = $this->input->get("page");
        $offset      = $this->input->get("offset");
        $customer_id = $this->input->get("customer_id");

        $this->load->model("Orders_model");
        $this->load->helper("persiandate_helper");

        if (!$customer_id) {
            return $this->resp(false, "customer_id not provided or empty.");
        }
        // $province_id = $this->input->get('province_id');

        $this->db->select("*")
                 ->from('orders');
        // ->join('category', "products.main_cat_id = category.id", "left")
        // ->join('product_images',"product_images.product_id=product.id","left");
        // ->join("province", "products.province_id = province.id", "left");

        // if (isset($_GET['sub_cat_id'])) {
        //     $this->db->where("(products.admin_approved = 1 and products.sub_cat_id=$sub_cat_id)");
        // } else {
        //     $this->db->where("products.admin_approved = 1");
        // }

        // $where = "( products.admin_approved = 1";
        // if (isset($_GET['sub_cat_id'])) {
        //     $where .= " and products.sub_cat_id=$sub_cat_id ";
        // }
        // $where .= " )";
        $where = array("customer_id" => $customer_id);
        $this->db->where($where);
        if (isset($_GET['page']) && isset($_GET['offset'])) {
            $this->db->limit($page, $offset * $page);
        }

        // if (isset($_GET['province_id']))
        //     $this->db
        //         ->order_by("field(karjoo.province_id,{$province_id}) DESC, karjoo.province_id");
        // else
        //     $this->db->order_by("created_at", "DESC");

        // var_dump($this->db->get_compiled_select());
        // exit;
        $this->db->order_by("created_at", "desc");
        $res = $this->db->get()->result_array();
        // add image absolute paths
        // foreach ($res as &$r) {
        //     $images = explode(',', $r['images']);
        //     $tmp    = array();
        //     foreach ($images as $i) {
        //         $tmp[] = base_url(PRODUCT_IMAGE_PATH . "/" . $i);
        //     }
        //     $r['images'] = $tmp;
        //
        //     // $r["image_absolute_path"] = base_url(AD_IMAGE_PATH . "/" . $r["image"]);
        // }

        foreach ($res as &$order) {
            // $order                          = array_merge($order, $this->Orders_model->get_order_detail($order));
            // $order["created_at_fa"]         = convert_gregorian_iso_to_jalali_iso($order["created_at"]);
            // $order["prepayment_factor_pdf"] = base_url("ui/userreport/invoice?order_id=" . $order['id'] . "&format=pdf");
            // // $order["prepayment_factor_"] = base_url("ui/userreport/invoice?order_id=" . $order['id'] . "&format=pdf");
            // if ($order['order_status'] == 'ORDER_CONFIRMED') {
            //     $order['payment_url'] = base_url('ui/payment/index?order_id=' . $order['id']);
            // }
        }


        $this->resp(true, $res);
    }

    public function order_detail()
    {
        $order_id = $this->input->get("order_id");
        $res      = $this->db->select("order_lines.order_id,order_lines.product_id")
                             ->select("products.title,products.description")
                             ->from("order_lines")
                             ->join("products", "order_lines.product_id = products.id", "left")
                             ->get()
                             ->result_array();
        // $this->db->select('*')
        //          ->from('view_order_lines_detail');

        // $res = $this->db->get()->result_array();

        $this->resp(true, $res);
    }

    public function cancel_order()
    {
        $this->load->helper("persiandate_helper");
        if (!isset($_POST['order_id']) || empty($_POST['order_id'])) {
            return $this->resp(false, "Order_id is not set.");
        }

        $order_id = $this->input->post("order_id", true);
        $order    = $this->db->get_where("orders", array("id" => $order_id))
                             ->row(0, "array");

        if (is_null($order)) {
            return $this->resp(false, "Order not found");
        }

        if ($order['order_status'] == 'ORDER_CANCELLED') {
            return $this->resp(false, "Order already cancelled.");
        }

        $customer = $this->db->get_where("customers", array("id" => $order['customer_id']))
                             ->row(0, "array");

        if (is_null($customer)) {
            return $this->resp(false, "Customer not found.");
        }

        // if payment_method was BANK_PAYMENT || WALLET_PAYMENT add to wallet credit
        if ($order['pay_method'] == BANK_PAYMENT || $order['pay_method'] == WALLET_PAYMENT) {
            $this->db->trans_start();
            $new_credit = intval($customer['wallet_credit']) + intval($order['to_pay']);
            $this->db->set('wallet_credit', $new_credit)
                     ->where("id", $customer['id'])
                     ->update("customers");
            $this->db->set('order_status', "ORDER_CANCELLED")
                     ->where('id', $order_id)
                     ->update('orders');
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                return $this->resp(false, "Error in BANK_PAYMENT -> wallet_credit");
            } else {
                // if payment_method was CASH_PAYMENT just return the capacity.
                $this->increase_capacity($order['product_id'], convert_jalali_to_gregorian($order['date'], '-'));
                return $this->resp(true, array());
            }
        }

        if ($order['pay_method'] == 'CASH_PAYMENT') {
            $res = $this->db->set("order_status", "ORDER_CANCELLED")
                            ->where("id", $order_id)
                            ->update("orders");
            if ($res) {
                $this->increase_capacity($order['product_id'], convert_jalali_to_gregorian($order['date'], '-'));
                return $this->resp(true, array());
            } else {
                return $this->resp(false, "Error CASH_PAYMENT cancel");
            }
        }

        return $this->resp(false, "Unkonwn error at cancel_order");
    }

    private function increase_capacity($product_id, $date)
    {
        $service_availability = $this->db
            ->where("product_id", $product_id)
            ->where("date", $date)
            ->get("service_dates")
            ->row(0, "array");

        if (!is_null($service_availability)) {
            $new_capacity = $service_availability['used_capacity'] - 1;
            if ($new_capacity >= 0) {
                $res = $this->db->where("product_id", $product_id)
                                ->where("date", $date)
                                ->set("used_capacity", $new_capacity)
                                ->update("service_dates");
            }
        }
    }

}