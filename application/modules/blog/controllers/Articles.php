<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blogs_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Articles';
        $data['breadcrumbs'][] = ['label' => 'Articles', 'active' => 'active'];
        $data['main_content'] = 'article/index';
        $data['data'] = $this->blogs_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->blogs_model;
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
                    redirect(site_url('blog/articles/view/' . encrypt_url($blog['article_id'])));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
            }
            redirect(site_url('blog/articles/index'));
        }

        $data['error'] = $error;
        $data['title'] = 'Create Article';
        $data['main_content'] = 'article/_form';
//        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Article', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = true;
        $this->load->view('layouts/main_layout', $data);
    }

    public function view($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Article';
        $data['breadcrumbs'][] = ['label' => 'View', 'active' => 'active'];
        $data['main_content'] = 'article/view';
        $data['model'] = $this->blogs_model->getById($id);
        $this->load->view('layouts/main_layout', $data);
    }

    public function isPublish($id)
    {
        $id = decrypt_url($id);
        $model = $this->blogs_model->getById($id);
        if (isset($model)) {
            if ($model->status == 1) {
                //rubah data menjadi publish
                $status = $this->blogs_model->update_status($id, 2);
            } else {
                //rubah data menjadi draft
                $status = $this->blogs_model->update_status($id, 1);
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
        redirect(site_url('blog/articles/index'));
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->blogs_model;
            $this->db->trans_begin();
            $blog = $model->save();
            if ($blog['success']) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(base_url('blog/articles/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Diupdate!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('blog/articles/view/' . encrypt_url($blog['article_id'])));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('blog/articles/index'));
            }
        }

        $model = $this->blogs_model->getById($id);

        $data['title'] = 'Article';
        $data['breadcrumbs'][] = ['label' => 'Article', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['main_content'] = 'article/_form';
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }



}