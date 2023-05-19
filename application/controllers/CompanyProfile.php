<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyProfile extends CI_Controller
{
    var $js_page = 'profile/company_profile';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('companyProfile_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Company Profile';
        $data['breadcrumbs'][] = ['label' => 'Company', 'active' => 'active'];
        $data['main_content'] = 'company_profile/index';
        $data['data'] = $this->companyProfile_model->company_profile();
        $data['js_page'] = $this->js_page;
        $this->load->view('layouts/main_layout', $data);
    }

    public function load_setting()
    {
        $data['data'] = $this->companyProfile_model->company_profile();
        $this->load->view('company_profile/_form', $data);
    }

    public function update()
    {
        $success = false;
        $message = '';
        if ($this->input->post()) {
            $post = $this->input->post();
            $model = $this->companyProfile_model;
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

        redirect(site_url('companyProfile'));
    }
}