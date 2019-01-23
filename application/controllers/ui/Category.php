<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");

class Category extends Base
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Jalali_date');
    }

    public function index()
    {
        $data["categories"]  = $this->db->get_where("category", array("parent" => 0))->result_array();
        $data["active_menu"] = "m-manage-categories";
        $data["title"]       = "دسته ها";
        foreach ($data["categories"] as &$cat) {
            $cat['pic_absolute_path'] = base_url(CATEGORY_IMAGE_PATH . "/" . $cat['pic']);
        }

        // pre($data);
        $this->view("categories/index", $data);
    }

    public function add_category()
    {
        if (empty($this->input->post("cat_name"))) {
            return ejson(false, "Empty category name.");
        }
        $cats = $this->db->get_where("category", array("cat_name" => $this->input->post("cat_name")))->result_array();
        if (count($cats) > 0) {
            return ejson(false, "Duplicate category name.");
        }


        $res = $this->db->insert('category', array("cat_name" => $this->input->post("cat_name")));
        if (!$res) {
            return ejson(false, "خطا در انجام عملیات.");
        }

        return ejson(true, "");
    }

    public function sub_cats()
    {
        $cat_name    = $this->input->get("cat_name");
        $parent      = $this->input->get("cat_id");
        $sub_cats    = $this->db->get_where("category", array("parent" => $parent))->result_array();
        $active_menu = "m-manage-categories";

        $this->view("categories/sub_categories", compact("sub_cats", "parent", "cat_name", "active_menu"));
    }

    public function subcategories()
    {
        $cat_id        = $this->input->get('cat_id');
        $build_options = $this->input->get('build_options');
        $sub_cats      = $this->db->get_where("category", array("parent" => $cat_id))->result_array();
        if ($build_options) {
            $res = array();
            foreach ($sub_cats as $sc) {
                $res[] = "<option value='{$sc['id']}'>{$sc['cat_name']}</option>";
            }
            return ejson(array("success" => true, "data" => $res));
        }

        return ejson(array("success" => true, "data" => $sub_cats));
    }

    public function add_sub_category()
    {
        if (empty($this->input->post("cat_name"))) {
            return ejson(false, "Empty category name.");
        }
        $cats = $this->db->get_where("category", array("cat_name" => $this->input->post("cat_name")))
                         ->result_array();
        if (count($cats) > 0) {
            return ejson(false, "Duplicate category name.");
        }

        $res = $this->db->insert('category', array("cat_name" => $this->input->post("cat_name"),
                                                   "parent"   => $this->input->post("parent")));
        if (!$res) {
            return ejson(false, "خطا در انجام عملیات.");
        }

        return ejson(true, "");
    }

    public function change_picture()
    {
        $cat_id    = $this->input->post('cat_id', true);
        $old_image = $this->db->get_where("category", array("id" => $cat_id))->row(0, "array");
        $name      = "";

        if (isset($_FILES['img'])) {
            // upload file
            $config['upload_path']   = FCPATH . CATEGORY_IMAGE_PATH;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 0;
            $config['file_name']     = time();
            $this->load->library('upload', $config);
            $this->upload->do_upload("img");
            $pic = $this->upload->data("file_name");
            $res = $this->db->set("pic", $pic)
                            ->where("id", $cat_id)
                            ->update("category");
            @unlink(FCPATH . CATEGORY_IMAGE_PATH . DIRECTORY_SEPARATOR . $old_image['pic']);
        }

        redirect("ui/category/index");
    }

    public function change_picture_old()
    {
        $image     = $this->input->post("img");
        $cat_id    = $this->input->post('cat_id');
        $old_image = $this->db->get_where("category", array("id" => $cat_id))->row(0, "array");
        $name      = "";

        //save image
        try {
            $name = base64_imagestring_save($image, FCPATH . CATEGORY_IMAGE_PATH, time());
        } catch (Exception $e) {
            @unlink(FCPATH . CATEGORY_IMAGE_PATH . DIRECTORY_SEPARATOR . $name);
            return ejson(false, $e->getMessage());
        }

        //update new category image
        $res = $this->db->set("pic", $name)
                        ->where("id", $cat_id)
                        ->update("category");

        // delete old image
        @unlink(FCPATH . CATEGORY_IMAGE_PATH . DIRECTORY_SEPARATOR . $old_image['pic']);

        return ejson(true);
    }


    public function delete_category()
    {
        isset($_POST['id']) || die("cat id not provided");

        $id       = $this->input->post("id");
        $main_cat = $this->db->get_where("category", array("id" => $id))
                             ->row(0, "array");
        $images   = array();
        $this->db->trans_start();
        if (!empty($main_cat)) {
            $images[] = FCPATH . CATEGORY_IMAGE_PATH . DIRECTORY_SEPARATOR . $main_cat['pic'];
            // delete main category
            $this->db->where("id", $id)->delete("category");
            // delete child categories
            foreach ($this->db->get_where("category", array("parent" => $id))->result_array() as $row) {
                $images[] = FCPATH . CATEGORY_IMAGE_PATH . DIRECTORY_SEPARATOR . $row['pic'];
                $this->db->where("id", $row['id'])->delete("category");
            }
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() == false) {
            ejson(false);
        }

        // delete images
        foreach ($images as $image) {
            @unlink($image);
        }
        ejson(true);
    }

    public function change_cat_name()
    {
        $cat_id   = $this->input->post("_cat_id");
        $cat_name = $this->input->post("new_cat_name", true);

        $this->db->set("cat_name", $cat_name)
                 ->where("id", $cat_id)
                 ->update("category");
        redirect("/ui/category/index");
    }

    public function toggle_status()
    {
        $cat_id = $this->input->post("cat_id");
        $row    = $this->db->get_where("category", array("id" => $cat_id))->row(0, "array");
        if (!empty($row)) {
            $new_value = $row['status'] == '1' ? '0' : '1';
            $this->db->set('status', $new_value)
                     ->where("id", $cat_id)
                     ->update("category");
            $this->db->set("status", $new_value)
                     ->where("parent", $cat_id)
                     ->update("category");
        }
        redirect("ui/category/index");
    }
}
