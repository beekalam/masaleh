<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "controllers/Base.php");
class User extends Base
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model("Roles_model");
    }

    // public function users()
    // {
    //     $data["users"]       = $this->db
    //         ->query("select users.*,roles.name as role_name from users join roles on users.role_id = roles.id")
    //         ->result_array();
    //     $data['roles']       = $this->db->get('roles')->result_array();
    //     $data["active_menu"] = "m-manage-users";
    //     $data['title']       = 'لیست کاربران';
    //     $data['isadmin']     = $this->session->userdata("isadmin") === true;
    //
    //     $this->adminView('users/users', $data);
    // }
    //
    // public function roles()
    // {
    //     $data = array(
    //         "active_menu" => "m-manage-users",
    //         "title"       => "لیست رول ها",
    //         'roles'       => $this->Roles_model->roles(),
    //     );
    //
    //     foreach ($data['roles'] as &$role) {
    //         $role['permissions'] = $this->Roles_model->role_perms($role['id']);
    //     }
    //
    //     $data["all_perms"] = $this->Roles_model->permissions();
    //     $this->adminView('users/roles', $data);
    // }
    //
    // public function add_role()
    // {
    //     clog($_POST);
    //     $res = $this->Roles_model->add_role($this->input->post('role_name'));
    //     $this->set_message($res);
    //     redirect("user/roles");
    // }
    //
    //
    // public function delete_role()
    // {
    //     if (!is_admin() || !$_POST) return;
    //
    //     $res = $this->Roles_model->delete_role($this->input->post('role_id'));
    //     $this->set_message($res);
    //     redirect('user/roles');
    // }
    //
    //
    // public function change_role()
    // {
    //     $ok = isset($_POST['role_type']) && !empty($_POST['role_type']);
    //     $ok = $ok && isset($_POST['user_id']) && !empty($_POST['user_id']);
    //
    //     if ($ok) {
    //         $role_id = $this->input->post('role_type');
    //         $user_id = $this->input->post('user_id');
    //         $this->db->set('role_id', $role_id);
    //         $this->db->where('id', $user_id);
    //         $ok = $this->db->update('users');
    //         if (!$ok) {
    //             $this->session->set_flashdata("msg", "error | " . "خطا در ذخیره سازی");
    //         } else
    //             $this->session->set_flashdata("msg", "success | " . "اطلاعات با موفقیت ثبت شد");
    //     } else {
    //         $this->session->set_flashdata("msg", "error | " . "مقدار نامعتبر");
    //     }
    //
    //     redirect('user/users');
    // }
    //
    //

    public function user_change_password()
    {
        if (!$this->input->post()) return;

        $id              = $this->input->post('id');
        $old_password    = $this->input->post('previous_password');
        $new_password    = $this->input->post('new_password');
        $repeat_password = $this->input->post('repeat_password');

        $row = $this->db->get_where('users', array('id' => $id))->result();

        if (count($row) > 0) {
            $row = $row[0];
            if (sha1($old_password) != $row->password) {
                $this->session->set_flashdata('error', 'پسورد قدیمی اشتباه وارد شده است.');
                redirect("ui/user/profile?id={$id}");
            }

            if (empty($new_password) || $repeat_password != $new_password) {
                $this->session->set_flashdata('error', 'پسورد و تکرار آن مشابه نمیباشند');
                redirect("ui/user/profile?id={$id}");
            }

            $this->db->set('password', sha1($new_password));
            $this->db->where('id', $id);
            if ($this->db->update('users')) {
                $this->session->set_flashdata('msg', 'پسورد با موفقیت تغییر یافت');
                redirect("ui/user/profile?id={$id}");
            } else {
                $this->session->set_flashdata('error', 'خطا در تغییر پسورد');
                redirect("ui/user/profile?id={$id}");
            }

        }
    }

    //
    // public function change_password()
    // {
    //     $this->load->model("Users_model");
    //     if (isset($_POST['new-password']) && isset($_POST['user-id'])) {
    //         $res = $this->Users_model->change_password($this->input->post('user-id'), $this->input->post('new-password'));
    //         $this->set_message($res);
    //         redirect("user/users");
    //     }
    //
    //     $this->show_err("خطا در تغییر پسورد");
    //     redirect("user/users");
    // }
    //
    // public function delete_user()
    // {
    //     $this->load->model("Users_model");
    //     if ($_POST) {
    //         $res = $this->Users_model->delete_user($this->input->post('what'));
    //         $this->set_ajax_message($res);
    //     }
    // }
    //
    //
    // public function new_user()
    // {
    //     if (!$this->input->post()) return;
    //
    //
    //     $res = $this->db->insert('users', array(
    //         "first_name"  => $this->input->post('first_name'),
    //         "last_name"   => $this->input->post('last_name'),
    //         "username"    => $this->input->post('username'),
    //         "password"    => sha1($this->input->post('password')),
    //         "role_id"     => $this->input->post('role_type'),
    //         "super_admin" => "no"
    //     ));
    //
    //     if ($res) {
    //         $this->show_msg("کاربر جدید ثبت شد");
    //         redirect("user/users");
    //     }
    //
    //     $this->show_err("خطا در ثبت کاربر جدید");
    //     redirect("user/users");
    // }
    //
    // public function update_role()
    // {
    //     $all_perms = $this->Roles_model->permissions();
    //
    //     $this->db->trans_start();
    //     //delete current role permissions
    //     $this->db->where("role_id", $_POST['role_id'])->delete("role_permissions");
    //     // add permissions
    //     foreach (array_column($all_perms, "permission_name") as $p) {
    //         if (isset($_POST[$p]) && $_POST[$p] == true) {
    //             $this->db->insert("role_permissions", array(
    //                 "role_id"       => $_POST['role_id'],
    //                 "permission_id" => $this->Roles_model->perm_name_to_id($p)
    //             ));
    //         }
    //     }
    //
    //     $this->db->trans_complete();
    //
    //     if ($this->db->trans_status() !== false) {
    //         $this->session->set_flashdata('msg', 'عملیات با موفقیت انجام شد');
    //         redirect('user/roles/');
    //     }
    //
    // }
    //

    public function profile()
    {
        $this->load->helper("utils");
        // $data = file_get_contents("http://2.gravatar.com/avatar/kc8b6d0141330457d7b8e357520a0ccb?s=75&r=g");
        // $img=  base64_img_encode($data);
        // $this->db->set('img',$img);
        // $this->db->where('id',14);
        // $res = $this->db->update('users');

        // $res = $this->db->get_where('users',array('id'=>14))->result();
        // if(count($res)){
        //     $res = $res[0];
        //     echo "<img src='" . $res->img . "' />";
        //     exit;
        // }

        // echo "<img src='" . $img . "' />";
        // exit;

        $id = $this->input->get('id');
        if ($_SESSION['userid'] != $id) return;

        $row = $this->db->get_where("users", array("id" => $id))->result();

        $data["user"] = null;
        if (count($row) > 0) {
            $data["user"] = $row[0];
        }
        $data['themes'] = array("default" => array("theme_name" => "پیش فرض", "color" => "blue"),
                                "blue"    => array("theme_name" => "آبی", "color" => "blue"),
                                "dark"    => array("theme_name" => "تیره", "color" => "dark"),
                                "grey"    => array("theme_name" => "خاکستری", "color" => "grey"),
                                "light"   => array("theme_name" => "روشن", "color" => "light"));

        // pr($data);
        // exit;
        $this->view('users/profile', $data);
    }
    //
    // public function change_theme()
    // {
    //     $themes = array("default", "blue", "dark", "grey", "light");
    //     $theme  = $this->input->get("theme");
    //     if (in_array($theme, $themes)) {
    //         $_SESSION['theme'] = $theme;
    //         $this->db->set('theme', $theme)->where('id', $_SESSION['userid'])->update('users');
    //     }
    //
    //     redirect("admin/user/profile?id=" . $_SESSION['userid']);
    // }
    //
    // public function edit()
    // {
    //     // dump($_FILES);
    //     // exit;
    //     if (!$this->input->post()) return;
    //     if ($_SESSION['userid'] != $_POST['id']) return;
    //
    //     $id   = $this->input->post('id');
    //     $user = $this->db->get_where("users", array("id" => $id))->row(0, "array");
    //
    //     $this->db->set('first_name', $this->input->post('first_name'));
    //     $this->db->set('last_name', $this->input->post('last_name'));
    //
    //     // upload profile image
    //     if (!empty($_FILES["profile_file"]["name"])) {
    //         $config['allowed_types'] = 'gif|jpg|png';
    //         $config['max_size']      = 0;
    //         $config['max_width']     = 1024;
    //         $config['max_height']    = 768;
    //         $config['file_name']     = time();
    //         $config['upload_path']   = FCPATH . USER_PROFILE_IMAGE_PATH;
    //         $this->load->library('upload', $config);
    //         if ($this->upload->do_upload("profile_file") == false) {
    //             $this->session->set_flashdata('error', $this->upload->display_errors());
    //             redirect("user/profile?id={$id}");
    //         }
    //
    //         $profile_image = $this->upload->data("file_name");
    //         $this->db->set('profile_image', $profile_image);
    //         $profile_image_upload = true;
    //     }
    //
    //     $this->db->where('id', $id);
    //
    //     if ($this->db->update('users')) {
    //         $this->session->set_flashdata('msg', 'مشخصات با موفقیت تغییر یافت');
    //         // if (!empty($img)) $this->session->set_userdata('profile_img', $img);
    //         $this->session->set_userdata('name', $first_name . " " . $last_name);
    //         if ($profile_image_upload) {
    //             $this->session->set_userdata("profile_image", base_url(USER_PROFILE_IMAGE_PATH . "/" . $profile_image));
    //             // delete previous image
    //             if (!empty($user['profile_image'])) {
    //                 @unlink(FCPATH . USER_PROFILE_IMAGE_PATH . DS . $user["profile_image"]);
    //             }
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', 'خطا در تغییر مشخصات');
    //     }
    //     redirect("user/profile?id={$id}");
    // }

}
