<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    // var $js_page = 'inventory/inventory_terima';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {

        $data['title'] = 'Kategori';
        $data['breadcrumbs'][] = ['label' => 'Kategori', 'active' => 'active'];
        $data['main_content'] = 'kategori/index';
        $data['data'] = $this->kategori_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            if ($this->input->post()) {
                // $post = $this->input->post();
                $model = $this->kategori_model;
                $this->db->trans_begin();
                $model->save();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('master/kategori/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('master/kategori/index'));
                }
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Create Kategori';
        $data['main_content'] = 'kategori/_form';
        // $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Kategori', 'url' => 'index'];
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
            $model = $this->kategori_model;
            $this->db->trans_begin();
            $model->save();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Diupdate!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('master/kategori/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Diupdate!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('master/kategori/index'));
            }
        }


        $model = $this->kategori_model->getById($id);

        $data['title'] = 'Update Kategori';
        $data['main_content'] = 'kategori/_form';
        $data['breadcrumbs'][] = ['label' => 'Kategori', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $model = $this->kategori_model;

        if ($model->delete($id)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
            redirect(site_url('master/kategori/index'));
        }
    }
}
