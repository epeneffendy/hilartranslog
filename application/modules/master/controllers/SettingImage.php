<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingImage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/settingimage_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $datas = $this->db->query("select * from master_image order by type asc")->result();
        $data['title'] = 'Master Image';
        $data['breadcrumbs'][] = ['label' => 'Master Image', 'active' => 'active'];
        $data['main_content'] = 'setting-image/index';
        $data['data'] = $datas;
        $this->load->view('layouts/main_layout', $data);
    }

    public function update($code = null)
    {
        $code = decrypt_url($code);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $post = $this->input->post();
            $model = $this->settingimage_model;
            $this->db->trans_begin();
            $company = $model->save();
            if ($company['success'] == true) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('master/settingImage'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('master/settingImage'));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('master/settingImage'));
            }

        }

        $model = $this->settingimage_model->getById($code);

        $data['title'] = 'Setting Image';
        $data['breadcrumbs'][] = ['label' => 'Setting Image', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['main_content'] = 'setting-image/_form';
//        $data['js_page'] = $this->js_page;
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $this->load->view('layouts/main_layout', $data);
    }

}
