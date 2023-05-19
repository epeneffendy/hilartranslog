<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Typeuser extends CI_Controller
{
    var $js_page = 'typeuser/typeuser';
    public function __construct()
    {

        parent::__construct();
        $this->load->model('typeuser_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Typeuser';
        $data['breadcrumbs'][] = ['label' => 'Typeuser', 'active' => 'active'];
        $data['main_content'] = 'typeuser/index';
        $data['data'] = $this->typeuser_model->getAll();


        $this->load->view('layouts/main_layout', $data);
    }

    public function create()
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            //print_r($_POST);die();

            if ($this->input->post()) {
                $model = $this->typeuser_model;
                $this->db->trans_begin();
                $model->add();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('typeuser/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('typeuser/index'));
                }
            }
        }

        $data['title'] = 'Create Typeuser';
        $data['main_content'] = 'typeuser/_form';
        $data['breadcrumbs'][] = ['label' => 'Typeuser', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = true;
        $this->load->view('layouts/main_layout', $data);
    }
    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->typeuser_model;
            $this->db->trans_begin();
            $model->add();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Diupdate!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('typeuser/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Diupdate!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('typeuser/index'));
            }
        }


        $model = $this->typeuser_model->getById($id);

        $data['title'] = 'Update Type User';
        $data['main_content'] = 'typeuser/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'typeuser', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $model = $this->typeuser_model;

        if ($model->delete($id)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
            redirect(site_url('typeuser/index'));
        }
    }
}
