<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BranchStore extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('branchStore_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Branch Store';
        $data['breadcrumbs'][] = ['label' => 'Branch Store', 'active' => 'active'];
        $data['main_content'] = 'branch-store/index';
        $data['data'] = $this->branchStore_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            if ($this->input->post()) {
                $model = $this->branchStore_model;
                $this->db->trans_begin();
                $model->save();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('master/branchStore/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('master/branchStore/index'));
                }
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Create Branch Store';
        $data['main_content'] = 'branch-store/_form';
        $data['breadcrumbs'][] = ['label' => 'Branch Store', 'url' => 'index'];
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
            $model = $this->branchStore_model;
            $this->db->trans_begin();
            $model->save();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Diupdate!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('master/branchStore/index'));
            } else {
                $this->db->trans_commit();
                $success = true;
                $message = "Data Berhasil Diupdate!";
                $this->session->set_flashdata('success', $message);
                redirect(site_url('master/branchStore/index'));
            }
        }


        $model = $this->branchStore_model->getById($id);

        $data['title'] = 'Update Branch Store';
        $data['main_content'] = 'branch-store/_form';
        $data['breadcrumbs'][] = ['label' => 'Branch Store', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $model = $this->branchStore_model;

        if ($model->delete($id)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
            redirect(site_url('master/branchStore/index'));
        }
    }

    public function view($id){
        $id = decrypt_url($id);
        $model = $this->branchStore_model->getById($id);
        $data['title'] = 'Branch Store';
        $data['breadcrumbs'][] = ['label' => 'View', 'active' => 'active'];
        $data['main_content'] = 'branch-store/view';
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }
}
