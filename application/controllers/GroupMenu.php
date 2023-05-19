<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupMenu extends CI_Controller
{
    var $js_page = 'menu/group_menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('authItemChild_model');
        $this->load->model('menu_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index($error = NULL)
    {
        $data['error'] = $error;
        $data['title'] = 'Group Menu';
        $data['breadcrumbs'][] = ['label' => 'Group Menu', 'active' => 'active'];
        $data['main_content'] = 'group-menu/index';
        $data['data'] = $this->authItemChild_model->dataMenu();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';
        $menu = '';
        $arr_menu = '';

        if ($this->input->post()) {
            $post = $this->input->post();
            $this->db->trans_begin();
            $model_menu = $this->menu_model;
            $model_groupmenu = $this->authItemChild_model;
            $model_menu = $model_menu->save();
            $model_groupmenu = $model_groupmenu->save($model_menu);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('groupMenu/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Ditambahkan!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('groupMenu/index'));
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Create Group Menu';
        $data['main_content'] = 'group-menu/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Group Menu', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = true;
        $data['data'] = $menu;
        $data['arr_menu'] = $arr_menu;
        $data['data_menu'] = $this->menu_model->getParent();
        $data['cruda'] = $this->menu_model->cruda();
        $this->load->view('layouts/main_layout', $data);
    }

    public function getChecked()
    {
        $post = $this->input->post();

        $idArr = array();
        if (isset($post['key']) && isset($post['ket'])) {
            $key_post = explode('[', $_POST['key']);
            $slug_post = $key_post[0];
            $act_post = substr($key_post[1], 0, 1);

            $this->db->where('slug', $slug_post);
            $menu = $this->db->get('menu')->row();

            if (isset($menu)) {
                $idArr[] = $menu->slug . "[" . $act_post . "]";
                // Jika di CHECKED Kecuali R ==> Maka R juga iKut
                if (($act_post == 'C' || $act_post == 'U' || $act_post == 'D' || $act_post == 'A') && $_POST['ket'] == 1) {
                    $idArr[] = $menu->slug . "[R]";
                } // Jika di UN-CHECK R ==> Maka yang lain Ikut Un-check
                elseif ($act_post == 'R' && $_POST['ket'] == 0) {
                    foreach ($this->menu_model->cruda() as $ind => $val) {
                        $idArr[] = $menu->slug . "[" . $ind . "]";
                    }
                }

                // Get Child menu ==> Jika parent checked, maka child-nya semua ikut checked
                foreach ($this->menu_model->cruda() as $ind => $val) {
                    $this->db->where('parent_id', $menu->id);
                    $menu_child = $this->db->get('menu')->result();
                    foreach ($menu_child as $child) {
                        if ($_POST['ket'] == 0 && $act_post == 'R') { // Jika yang di UNCHECK adalah Parent (R)
                            $idArr[] = $child->slug . "[" . $ind . "]";
                        }
                        $this->db->where('parent_id', $child->id);
                        $menu_child_2 = $this->db->get('menu')->result();
                        foreach ($menu_child_2 as $child2) {
                            if ($_POST['ket'] == 0 && $act_post == 'R') { // Jika yang di UNCHECK adalah Parent (R)
                                $idArr[] = $child2->slug . "[" . $ind . "]";
                            }
                        }
                    }
                }
                // Ket = 1 adalah checked
                if ($_POST['ket'] == 1) {
                    // Jika childnya checked, maka parent atas2-nya juga di checked
                    $this->db->where('id', $menu->parent_id);
                    $parent_child = $this->db->get('menu')->row();
                    if (isset($parent_child)) {
                        $idArr[] = $parent_child->slug . "[R]";

                        $this->db->where('id', $parent_child->parent_id);
                        $parent = $this->db->get('menu')->row();
                        if (isset($parent)) {
                            $idArr[] = $parent->slug . "[R]";
                        }
                    }
                }
            }
            echo json_encode($idArr);
        }
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';
        $arr_group = [];
        $data = [];

        if ($this->input->post()) {
            $post = $this->input->post();
            $this->db->trans_begin();

            $menu = $this->db->query("select * from menu where id = '" . $post['id'] . "'")->row();
            if (isset($menu)) {
                $delete_auth = $this->authItemChild_model->delete_auth($menu->slug);
                if ($delete_auth['success']) {
                    $success = true;
                    if (isset($post['MenuRoleForm']['menus'])) {
                        foreach ($post['MenuRoleForm']['menus'] as $ind => $item) {
                            $this->authItemChild_model->save($menu->slug);
                            if ($this->db->trans_status() === FALSE) {
                                $this->db->trans_rollback();
                                $success = false;
                                $message = "Data Gagal Disimpan!";
                                $this->session->set_flashdata('failed', $message);
                                redirect(site_url('groupMenu/index'));
                            } else {
                                $this->db->trans_commit();
                                $success = true;
                                $message = "Data Berhasil Ditambahkan!";
                                $this->session->set_flashdata('success', $message);
                                redirect(site_url('groupMenu/index'));
                            }
                        }
                    } else {
                        $this->db->trans_rollback();
                        $this->session->set_flashdata('failed', 'Group Menu Tidak Memiliki Role!');
                    }
                } else {
                    $this->db->trans_rollback();
                    $success = false;
                    $this->session->set_flashdata('failed', $delete_auth['message']);
                }
            } else {
                $this->session->set_flashdata('failed', 'Menu Tidak Ditemukan!');
            }
        } else {
            $this->db->from('menu');
            $this->db->where('id', $id);
            $menu = $this->db->get()->row();

            if (isset($menu)) {
                $_menu = $this->db->query("select * from auth_item_child where parent = CONCAT('GROUPMENU-','" . $menu->slug . "')  and SUBSTRING(child,1,10)<>'GROUPMENU-'")->result_array();
                foreach ($_menu as $ind => $item) {
                    $arr_menu[$item['child']] = $item['child'];
                }
            }
        }

        $data['title'] = 'Update Group Menu';
        $data['main_content'] = 'group-menu/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Group Menu', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['data'] = $menu;
        $data['arr_menu'] = $arr_menu;
        $data['data_menu'] = $this->menu_model->getParent();
        $data['cruda'] = $this->menu_model->cruda();

        $this->load->view('layouts/main_layout', $data);

    }
}