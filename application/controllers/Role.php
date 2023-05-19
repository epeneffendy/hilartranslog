<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller
{
    var $js_page = 'menu/group_menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('authItemChild_model');
        $this->load->model('authAssignment_model');
        $this->load->model('menu_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Role Access';
        $data['breadcrumbs'][] = ['label' => 'Role Access', 'active' => 'active'];
        $data['main_content'] = 'role/index';
        $data['user'] = $this->user_model->getAllUser();
        $data['model'] = $this->authAssignment_model->dataRole();
        $this->load->view('layouts/main_layout', $data);
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';
        $arr_group = [];
        $arr_menu = [];

        if ($this->input->post()) {
            $post = $this->input->post();
            $this->db->trans_begin();
            $delete_auth = $this->authAssignment_model->delete_auth($post['user_id']);

            if ($delete_auth['success'] == true) {
                $success = true;
                if (isset($post['MenuRoleForm']['groupmenus'])) {
                    foreach ($post['MenuRoleForm']['groupmenus'] as $group) {
                        $assign_groupmenu = $this->authAssignment_model->save($post['user_id'], 'GROUPMENU-' . $group);
                        if ($assign_groupmenu['success'] == true) {
                            $success = true;
                        } else {
                            $success = false;
                            $message = $assign_groupmenu['message'];
                        }
                    }
                }

                if (isset($post['MenuRoleForm']['menus'])) {
                    foreach ($post['MenuRoleForm']['menus'] as $ind => $menu) {
                        $assign_menu = $this->authAssignment_model->save($post['user_id'], $menu);
                        if ($assign_menu['success'] == true) {
                            $success = true;
                        } else {
                            $success = false;
                            $message = $assign_menu['message'];
                        }
                    }
                }
            } else {
                $success = false;
                $message = $delete_auth['message'];
            }

            if ($success) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Role Access User Gagal!";
                    $this->session->set_flashdata('failed', $message);
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Role Access User Berhasil!";
                    $this->session->set_flashdata('success', $message);
                }
            } else {
                $this->session->set_flashdata('failed', $message);
            }
            redirect(site_url('role/index'));
        } else {
            $_group = $this->db->query("select * from auth_assignment where user_id = '" . $id . "' and SUBSTRING(item_name,1,10)='GROUPMENU-'")->result_array();
            foreach ($_group as $ind => $item) {
                $arr_group[str_replace('GROUPMENU-','',$item['item_name'])] = $item['item_name'];
            }

            $_menu = $this->db->query("select * from auth_assignment where user_id = '" . $id . "' and SUBSTRING(item_name,1,10)<>'GROUPMENU-'")->result_array();
            foreach ($_menu as $ind => $item) {
                $arr_menu[$item['item_name']] = $item['item_name'];
            }
        }

        $data['title'] = 'Role Access';
        $data['main_content'] = 'role/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Role', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['user_id'] = $id;
        $data['arr_menu'] = $arr_menu;
        $data['arr_group'] = $arr_group;
        $data['model'] = $this->user_model->getById($id);
        $data['data_menu'] = $this->menu_model->getParent();
        $data['group_menu'] = $this->menu_model->getGroupMenu();
        $data['cruda'] = $this->menu_model->cruda();

        $this->load->view('layouts/main_layout', $data);
    }


}