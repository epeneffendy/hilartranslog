<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    var $js_page = 'settings/setting';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Setting';
        $data['breadcrumbs'][] = ['label' => 'Setting', 'active' => 'active'];
        $data['main_content'] = 'setting/setting/index';
        $data['data'] = $this->setting_model->get();
        $data['js_page'] = $this->js_page;
        $this->load->view('layouts/main_layout', $data);
    }

    function load_modal()
    {
        $data_temp = '';
        if ($_POST['action'] == 'edit') {
            $model = $this->setting_model->getById($_POST['key']);
        }

        $subContentEnable = ['home'];
        $sectionDisable = ['tentang-kami','layanan-kami','kontak-kami','galeri','klien-kami'];

        $data['action'] = $_POST['action'];
        $data['js_page'] = $this->js_page;
        $data['data'] = $model;
        $data['subContentEnable'] = $subContentEnable;
        $data['sectionDisable'] = $sectionDisable;
        $this->load->view('setting/setting/_modal_detail', $data);
    }

    public function update($slug = null)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->setting_model;
            $this->db->trans_begin();
            $blog = $model->save();
            if ($blog['success']) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $return = ['success' => $success, 'message' => $message];
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Diupdate!";
                    $return = ['success' => $success, 'message' => $message];
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $return = ['success' => $success, 'message' => $message];
            }
        }
        echo json_encode($return);
    }



}
