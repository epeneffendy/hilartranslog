<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('clients_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Clients';
        $data['breadcrumbs'][] = ['label' => 'Clients', 'active' => 'active'];
        $data['main_content'] = 'client/index';
        $data['data'] = $this->clients_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->clients_model;
            $this->db->trans_begin();
            $blog = $model->save();
            if ($blog['success']) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('clients/client/index'));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
            }
            redirect(site_url('clients/client/index'));
        }

        $data['error'] = $error;
        $data['title'] = 'Create Client';
        $data['main_content'] = 'client/_form';
//        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Article', 'url' => 'index'];
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
            $model = $this->clients_model;
            $this->db->trans_begin();
            $blog = $model->save();
            if ($blog['success']) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(base_url('clients/client/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Diupdate!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('clients/client/index'));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('clients/client/index'));
            }
        }

        $model = $this->clients_model->getById($id);

        $data['title'] = 'Article';
        $data['breadcrumbs'][] = ['label' => 'Client', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['main_content'] = 'client/_form';
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

}