<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
    var $js_page = 'site/site';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->model('authAssignment_model');
    }

    public function login($error = NULL)
    {

        if ($this->session->userdata('is_login') == true) {
            redirect('site');
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $is_check = $this->check_account();

            if ($this->form_validation->run() && $is_check === true) {
                $this->user_model->last_login($this->session->userdata('id'), $this->session->userdata('__ci_last_regenerate'));
                redirect('site');
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Login';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = '';
        $this->load->view('site/login', $data);
    }

    public function index($error = NULL)
    {
        if ($this->session->userdata('is_login') == true) {
            redirect('site');
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $is_check = $this->check_account();

            if ($this->form_validation->run() && $is_check === true) {
                $this->user_model->last_login($this->session->userdata('id'), $this->session->userdata('__ci_last_regenerate'));
                redirect('site');
            }
        }

        $data['error'] = $error;
        $data['title'] = 'Login';
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = '';
        $this->load->view('site/login', $data);
    }

    public function check_account()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = $this->user_model->check_account($username, $password, false);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<div class="info-box bg-gradient-danger">
                                        <span class="info-box-icon"><i class="fas fa-exclamation-circle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">FAILED</span>
                                            <span class="progress-description">Username is not Registered</span>
                                        </div>
                                    </div>');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<div class="info-box bg-gradient-danger">
                                        <span class="info-box-icon"><i class="fas fa-exclamation-circle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">FAILED</span>
                                            <span class="progress-description">Your Account is not Active!, Please Contact Admin</span>
                                        </div>
                                    </div>');
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<div class="info-box bg-gradient-danger">
                                        <span class="info-box-icon"><i class="fas fa-exclamation-circle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">FAILED</span>
                                            <span class="progress-description">Your Password is Wrong!</span>
                                        </div>
                                    </div>');
        } else {

            $auth = $this->authAssignment_model->access($query->user_id);

            $userdata = array(
                'is_login' => true,
                'is_developer' => ($query->typeuser_id == 1) ? true : false,
                'id' => $query->user_id,
                'typeuser_id' => $query->typeuser_id,
                'name' => $query->name,
                'foto' => $query->foto,
                'typeuser' => $query->typeuser,
                'username' => $query->username,
                'switch' => false,
                'you_can' => $auth,
                'user_initial' => ''
            );

            $this->session->set_userdata($userdata);
            return true;
        }
    }

    public function logout()
    {
        $id = $this->session->userdata('id');
        $user_data = $this->session->userdata();

        foreach ($user_data as $key => $value) {
            if ($key != '__ci_last_regenerate' && $key != '__ci_vars')
                $this->session->unset_userdata($key);
        }
        redirect('site/login');
    }
}
