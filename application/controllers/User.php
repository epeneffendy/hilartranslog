<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    var $js_page = 'user/user';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('authAssignment_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'List User';
        $data['breadcrumbs'][] = ['label' => 'List User', 'active' => 'active'];
        $data['main_content'] = 'user/index';
        $data['js_page'] =  $this->js_page;
        $data['model'] = $this->user_model->getAllUser();
        $this->load->view('layouts/main_layout', $data);
    }

    public function switch_user($id = NULL)
    {
        $id = $this->input->post('id');
        $initialId = $this->session->userdata('id');

        if ($id == $initialId) {
            $this->session->set_flashdata('failed', "Can't swicth, same user !");
            $array_respon = [
                'status' => FALSE,
            ];
            echo json_encode($array_respon);
//            redirect('user/index');
        } else {
            $user = $this->user_model->getById($id);
            $user_initial = $this->user_model->getById($initialId);

            if (!empty($user)) {
                if ($user->status == 1) {
                    $query = $this->user_model->check_account($user->username, $user->password_hash, true);
                    if (!empty($query)) {
                        $user_initial = [
                            'id' => $user_initial->user_id,
                            'username' => $user_initial->username,
                            'password' => $user_initial->password_hash,
                            'name' => $user_initial->name,
                            'typeuser_id' => $user_initial->typeuser_id,
                        ];

                        $auth = $this->authAssignment_model->access($query->user_id);

                        $userdata = array(
                            'is_login' => true,
                            'is_developer' => ($query->typeuser_id == 1) ? true : false,
                            'id' => $query->user_id,
                            'typeuser_id' => $query->typeuser_id,
                            'name' => $query->name,
                            'typeuser' => $query->typeuser,
                            'username' => $query->username,
                            'switch' => true,
                            'you_can' => $auth,
                            'user_initial' => $user_initial
                        );

                        $this->session->set_userdata($userdata);

                        $this->user_model->last_login($this->session->userdata('id'), $this->session->userdata('__ci_last_regenerate'));
                        $array_respon = [
                            'status' => TRUE,
                        ];
                        echo json_encode($array_respon);
//                        redirect('site/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('failed', 'Switch Failed, user "' . $user->name . '" is already blocked');
                    $array_respon = [
                        'status' => FALSE,
                    ];
                    echo json_encode($array_respon);
//                    redirect('user/index');
                }
            } else {
                $this->session->set_flashdata('failed', "User not found!");
                $array_respon = [
                    'status' => FALSE,
                ];
                echo json_encode($array_respon);
//                redirect('user/index');
            }
        }
    }

    public function switch_user_back($id = NULL)
    {
        $id = $this->input->post('id');
        $initialId = $this->session->userdata('id');
        $user = $this->user_model->getById($id);
        if (!empty($user)) {
            $query = $this->user_model->check_account($user->username, $user->password_hash, true);
            if (!empty($query)) {

                $auth = $this->authAssignment_model->access($query->user_id);
                $userdata = array(
                    'is_login' => true,
                    'is_developer' => ($query->typeuser_id == 1) ? true : false,
                    'id' => $query->user_id,
                    'typeuser_id' => $query->typeuser_id,
                    'name' => $query->name,
                    'typeuser' => $query->typeuser,
                    'username' => $query->username,
                    'switch' => false,
                    'you_can' => $auth,
                    'user_initial' => ''
                );
                $this->session->set_userdata($userdata);
                $this->user_model->last_login($this->session->userdata('id'), $this->session->userdata('__ci_last_regenerate'));
                $array_respon = [
                    'status' => TRUE,
                ];
                echo json_encode($array_respon);
//                redirect('site/dashboard');
            }
        } else {
            $this->session->set_flashdata('failed', "User not found!");
            $array_respon = [
                'status' => FALSE,
            ];
            echo json_encode($array_respon);
//            redirect('user/index');
        }
    }
}