<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    var $js_page = 'menu/menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index($error = NULL)
    {
        $data['error'] = $error;
        $data['title'] = 'Menu';
        $data['breadcrumbs'][] = ['label' => 'Menu', 'active' => 'active'];
        $data['main_content'] = 'menu/index';
        $data['data'] = $this->menu_model->getAllIndex();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->menu_model;
            $this->db->trans_begin();
            $model->save();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('menu/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Ditambahkan!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('menu/index'));
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Create Menu';
        $data['main_content'] = 'menu/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Menu', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['parent'] = $this->menu_model->getParent();
        $data['isNewRecord'] = true;
        $this->load->view('layouts/main_layout', $data);
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->menu_model;
            $this->db->trans_begin();
            $model->save();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Diupdate!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('menu/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Diupdate!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('menu/index'));
            }
        }


        $model = $this->menu_model->getById($id);

        $data['title'] = 'Update Menu';
        $data['main_content'] = 'menu/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Menu', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['parent'] = $this->menu_model->getParent();
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $data['parent'] = $this->menu_model->find_parent($model->parent_id, $model->level);
        $this->load->view('layouts/main_layout', $data);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $model = $this->menu_model;

        if ($model->delete($id)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
            redirect(site_url('menu/index'));
        }
    }

    function getParent()
    {
        $return = '';
        if (isset($_POST['key'])) {
            $this->db->select('id, name, type, level');
            $this->db->from('menu');
            $this->db->where('type', $_POST['key']);
            $this->db->where('level', 1);
            $return = $this->db->get()->result();
        }
        echo json_encode($return);
    }

    function getChild()
    {
        $return = '';
        if (isset($_POST['key'])) {
            $this->db->select('id, name, type, level');
            $this->db->from('menu');
            $this->db->where('parent_id', $_POST['key']);
            $this->db->where('level', 2);
            $return = $this->db->get()->result();
        }
        echo json_encode($return);
    }
}