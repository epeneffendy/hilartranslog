<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Galery';
        $data['breadcrumbs'][] = ['label' => 'Galery', 'active' => 'active'];
        $data['main_content'] = 'galery/index';
        $data['data'] = $this->galery_model->get();
        $this->load->view('layouts/main_layout', $data);
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->galery_model;
            $this->db->trans_begin();
            $blog = $model->save();
            if ($blog['success']) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(base_url('pages/galery/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Diupdate!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('pages/galery/index'));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('pages/galery/index'));
            }
        }

        $model = $this->galery_model->getById($id);

        $data['title'] = 'Galery';
        $data['breadcrumbs'][] = ['label' => 'Galery', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['main_content'] = 'galery/_form';
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

    public function isPublish($id)
    {
        $id = decrypt_url($id);
        $model = $this->galery_model->getById($id);
        if (isset($model)) {
            if ($model->status == 1) {
                //rubah data menjadi publish
                $status = $this->galery_model->update_status($id, 2);
            } else {
                //rubah data menjadi draft
                $status = $this->galery_model->update_status($id, 1);
            }

            if ($status['success']) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('failed', $status['message']);
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('success', $status['message']);
                }
            } else {
                $this->session->set_flashdata('failed', $status['message']);
            }
        }
        redirect(site_url('pages/galery/index'));
    }


}