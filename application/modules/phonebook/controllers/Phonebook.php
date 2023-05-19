<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phonebook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('phonebookModel');

    }

    public function index()
    {
        $data['title'] = 'Phonebook';
        $data['breadcrumbs'][] = ['label' => 'Phonebook', 'active' => 'active'];
        $data['main_content'] = 'phonebook/index';
        $data['data'] = $this->phonebookModel->getAll();

        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            if ($this->input->post()) {
                $model = $this->phonebookModel;
                $this->db->trans_begin();
                $model->save();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('phonebook/phonebook/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('phonebook/phonebook/index'));
                }
            }
        }
        $data['error'] = $error;
        $data['title'] = 'Create Phonebook';
        $data['main_content'] = 'phonebook/_form';
        $data['breadcrumbs'][] = ['label' => 'Phonebook', 'url' => 'index'];
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
            $model = $this->phonebookModel;
            $this->db->trans_begin();
            $model->save();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Diupdate!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('phonebook/phonebook/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Diupdate!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('phonebook/phonebook/index'));
            }
        }

        $model = $this->phonebookModel->getById($id);

        $data['title'] = 'Update Phonebook';
        $data['main_content'] = 'phonebook/_form';
        $data['breadcrumbs'][] = ['label' => 'Phonebook', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

    public function isPublish($id)
    {
        $id = decrypt_url($id);
        $model = $this->phonebookModel->getById($id);
        if (isset($model)) {
            if ($model->status == 1) {
                $status = $this->phonebookModel->update_status($id, 0);
            } else {
                $status = $this->phonebookModel->update_status($id, 1);
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
        redirect(site_url('phonebook/phonebook/index'));
    }



}