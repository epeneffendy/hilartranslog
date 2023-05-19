<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    // var $js_page = 'inventory/inventory_terima';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('brand_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Brands';
        $data['breadcrumbs'][] = ['label' => 'Brands', 'active' => 'active'];
        $data['main_content'] = 'brand/index';
        $data['data'] = $this->brand_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            if ($this->input->post()) {
                // $post = $this->input->post();
                $model = $this->brand_model;
                $this->db->trans_begin();
                $model->save();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('master/brand/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('master/brand/index'));
                }
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Create Brands';
        $data['main_content'] = 'brand/_form';
        // $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Brands', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = true;
        // $data['kategori'] = true;
        $this->load->view('layouts/main_layout', $data);
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->brand_model;
            $this->db->trans_begin();
            $model->save();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Diupdate!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('master/brand/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Diupdate!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('master/brand/index'));
            }
        }


        $model = $this->brand_model->getById($id);

        $data['title'] = 'Update Brands';
        $data['main_content'] = 'brand/_form';
        $data['breadcrumbs'][] = ['label' => 'Brands', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $model = $this->brand_model;

        if ($model->delete($id)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
            redirect(site_url('master/brand/index'));
        }
    }
}
