<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    var $js_page = 'page/about';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('about_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'About Us';
        $data['breadcrumbs'][] = ['label' => 'About Us', 'active' => 'active'];
        $data['main_content'] = 'about/index';
        $data['data'] = $this->about_model->get();
        $data['js_page'] = $this->js_page;
        $this->load->view('layouts/main_layout', $data);
    }

    public function load_setting()
    {
        $data['data'] = $this->about_model->get();
        $this->load->view('about/_form', $data);
    }

    public function update()
    {
        $success = false;
        $message = '';
        if ($this->input->post()) {
            $post = $this->input->post();
            $model = $this->about_model;
            $this->db->trans_begin();
            $company = $model->save();
            if ($company['success'] == true) {
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
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
            }

        }
        redirect(site_url('pages/about/index'));
    }
}