<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    var $js_page = 'profile/profile';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('user_model');
        $this->load->model('typeuser_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index($error = NULL)
    {
        $data['error'] = $error;
        $data['title'] = 'Profile';
        $data['breadcrumbs'][] = ['label' => 'Profile', 'active' => 'active'];
        $data['main_content'] = 'profile/index';
        $data['data'] = $this->profile_model->getAllData();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $post = $this->input->post();
            $model = $this->profile_model;
            $this->db->trans_begin();
            $profile = $model->save();
            if ($profile['success'] = true) {
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
                    redirect(site_url('profile/view/' . encrypt_url($profile['user_id'])));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
            }
            redirect(site_url('profile/index'));
        }

        $data['error'] = $error;
        $data['title'] = 'Create Profile';
        $data['main_content'] = 'profile/_form';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Profile', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = true;
        $data['typeuser'] = $this->typeuser_model->getType();
        $this->load->view('layouts/main_layout', $data);
    }

    public function view($id = NULL)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Profile';
        $data['breadcrumbs'][] = ['label' => 'View', 'active' => 'active'];
        $data['main_content'] = 'profile/view';
        $data['js_page'] = $this->js_page;
        $data['data'] = $this->profile_model->getById($id);
        $this->load->view('layouts/main_layout', $data);
    }

    public function update($id = NULL)
    {
        $id = decrypt_url($id);

        if ($this->input->post()) {
            $post = $this->input->post();
            $model = $this->profile_model;
            $this->db->trans_begin();
            $profile = $model->save();
            if ($profile['success'] = true) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(site_url('profile/index'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Ditambahkan!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('profile/view/' . encrypt_url($profile['user_id'])));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('profile/index'));
            }

        }

        $data['title'] = 'Profile';
        $data['breadcrumbs'][] = ['label' => 'View', 'active' => 'active'];
        $data['main_content'] = 'profile/_form';
        $data['isNewRecord'] = false;
        $data['data'] = $this->profile_model->getById($id);
        $data['typeuser'] = $this->typeuser_model->getType();
        $this->load->view('layouts/main_layout', $data);
    }

    public function blocked($id)
    {
        $id = decrypt_url($id);
        $this->db->trans_begin();
        $model = $this->user_model;
        $model->blocked($id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $success = false;
            $message = "Blocked Gagal!";
            $this->session->set_flashdata('failed', $message);
        } else {
            $this->db->trans_commit();
            $success = true;
            $message = "Blocked Success!";
            $this->session->set_flashdata('success', $message);
        }
        redirect(site_url('profile/index'));

    }

    function load_modal()
    {
        $id = decrypt_url($_POST['key']);

        $data['js_page'] = $this->js_page;
        $data['user_id'] = $id;
        $this->load->view('profile/_modal_reset_password', $data);
    }

    public function reset_password()
    {
        $this->db->trans_begin();
        $this->user_model->reset($_POST['user_id'], $_POST['password']);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $success = false;
            $message = "Reset Gagal!";
        } else {
            $this->db->trans_commit();
            $success = true;
            $message = "Reset Success!";
        }
        $return = ['success' => $success, 'message' => $message];
        echo json_encode($return);
    }
}