<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    var $js_page = 'products/product';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->model('master/kategori_model');
        $this->load->model('master/brand_model');
        $this->load->model('products/productstoreonlinetemp_model');
        $this->load->model('products/productstoreonline_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Products';
        $data['breadcrumbs'][] = ['label' => 'Products', 'active' => 'active'];
        $data['main_content'] = 'product/index';
        $data['data'] = $this->products_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    public function create($error = NULL)
    {
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->products_model;
            $this->db->trans_begin();
            $product = $model->save();
            if ($product['success']) {
                $temp = $this->db->query("select * from product_store_online_temp where user_id = '" . $this->session->userdata('id') . "'")->result_array();
                if (!empty($temp)) {
                    $id = $product['product_id'];
                    $this->delete_detail($id);
                    foreach ($temp as $item) {
                        $model_detail = $this->productstoreonline_model;
                        $detail = $model_detail->save($id, $item);
                        if ($detail['success'] == true) {
                            $success = $detail['success'];
                            $message = $detail['message'];
                        } else {
                            $success = $detail['success'];
                            $message = $detail['message'];
                        }
                    }
                }

                if ($success) {
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
                        redirect(site_url('products/products/view/' . encrypt_url($id)));
                    }
                } else {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                }
                redirect(site_url('products/products/index'));
            }
        }

        $this->delete_temp();
        $data['error'] = $error;
        $data['title'] = 'Create Products';
        $data['main_content'] = 'product/_form';
        $data['kategori'] = $this->kategori_model->getAll();
        $data['brand'] = $this->brand_model->getAll();
        $data['js_page'] = $this->js_page;
        $data['breadcrumbs'][] = ['label' => 'Products', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Create', 'active' => 'active'];
        $data['isNewRecord'] = true;
        $this->load->view('layouts/main_layout', $data);
    }

    function load_detail()
    {
        $return = '';
        $success = false;
        $user_id = $this->session->userdata('id');

        $temp = $this->db->query("select * from product_store_online_temp")->result_array();
        $data['temp'] = $temp;
        $data['js_page'] = $this->js_page;
        $this->load->view('product/_detail', $data);
    }

    function load_modal()
    {
        $data_temp = '';
//        if ($_POST['action'] == 'edit') {
//            $sql = $this->db->query("select a.kategori_id, a.barang_id, b.name as kategori_name, c.merk as merk, c.type, d.name as satuan_name, c.serial_number
//								from inventory_keluar_detail_temp a
//								left join master_kategori b on b.id = a.kategori_id
//								left join master_barang c on c.id = a.barang_id
//								left join master_satuan d on d.id = c.satuan_id where a.id = '" . $_POST['key'] . "'");
//            $temp = $sql->row();
//        }
        $data['action'] = $_POST['action'];
        $data['js_page'] = $this->js_page;
        $data['data_temp'] = $data_temp;
        $this->load->view('product/_modal_detail', $data);
    }

    public function save_detail_temp()
    {
        $success = true;
        $messgae = 'Link Added Successfully!';

        $temp = $this->productstoreonlinetemp_model->save($this->input->post());
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $success = $temp['success'];
            $message = $temp['message'];
        } else {
            $this->db->trans_commit();
            $success = $temp['success'];
            $message = $temp['message'];
        }

        $return = ['success' => $success, 'message' => $message];
        echo json_encode($return);
    }

    function delete_detail_temp()
    {
        $success = false;
        $message = 'Delete Successfully';
        $return = '';
        $model_temp = $this->productstoreonlinetemp_model->delete();
        if ($model_temp['success'] == true) {
            $success = true;
            $message = $model_temp['message'];
        }
        $return = ['success' => $success, 'message' => $message];
        echo json_encode($return);
    }

    public function isPublish($id)
    {
        $id = decrypt_url($id);
        $model = $this->products_model->getById($id);
        if (isset($model)) {
            if ($model->status == 1) {
                //rubah data menjadi publish
                $status = $this->products_model->update_status($id, 2);
            } else {
                //rubah data menjadi draft
                $status = $this->products_model->update_status($id, 1);
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
        redirect(site_url('products/products/index'));
    }

    public function view($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Product';
        $data['breadcrumbs'][] = ['label' => 'View', 'active' => 'active'];
        $data['main_content'] = 'product/view';
        $data['model'] = $this->products_model->getById($id);
        $data['detail'] = $this->productstoreonline_model->getAllById($id);
        $this->load->view('layouts/main_layout', $data);
    }

    function delete_temp()
    {
        $this->db->delete('product_store_online_temp', array('user_id' => $this->session->userdata('id')));
    }

    function delete_detail($id)
    {
        $this->db->delete('product_store_online', array('product_id' => $id));
    }

    public function update($id = null)
    {
        $id = decrypt_url($id);
        $success = false;
        $message = '';

        if ($this->input->post()) {
            $model = $this->products_model;
            $this->db->trans_begin();
            $product = $model->save();
            if ($product['success'] == true) {
                $temp = $this->db->query("select * from product_store_online_temp where user_id = '" . $this->session->userdata('id') . "'")->result_array();
                if (!empty($temp)) {
                    $id = $product['product_id'];
                    $this->delete_detail($id);
                    foreach ($temp as $item) {
                        $model_detail = $this->productstoreonline_model;
                        $detail = $model_detail->save($id, $item);
                        if ($detail['success'] == true) {
                            $success = true;
                            $message = $detail['message'];
                        } else {
                            $success = false;
                            $message = $detail['message'];
                        }
                    }
                }
            } else {
                $success = false;
                $message = $product['product_id'];
            }

            if ($success) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false;
                    $message = "Data Gagal Disimpan!";
                    $this->session->set_flashdata('failed', $message);
                    redirect(base_url('products/products/'));
                } else {
                    $this->db->trans_commit();
                    $success = true;
                    $message = "Data Berhasil Diupdate!";
                    $this->session->set_flashdata('success', $message);
                    redirect(site_url('products/products/view/' . encrypt_url($product['product_id'])));
                }
            } else {
                $this->db->trans_rollback();
                $success = false;
                $message = "Data Gagal Disimpan!";
                $this->session->set_flashdata('failed', $message);
                redirect(site_url('products/products'));
            }
        }

        $model = $this->products_model->getById($id);

        $this->delete_temp();
        $this->insert_temp($id);

        $data['title'] = 'Products';
        $data['breadcrumbs'][] = ['label' => 'Products', 'url' => 'index'];
        $data['breadcrumbs'][] = ['label' => 'Update', 'active' => 'active'];
        $data['main_content'] = 'product/_form';
        $data['js_page'] = $this->js_page;
        $data['isNewRecord'] = false;
        $data['data'] = $model;
        $data['kategori'] = $this->kategori_model->getAll();
        $data['brand'] = $this->brand_model->getAll();
        $this->load->view('layouts/main_layout', $data);
    }

    function insert_temp($id)
    {
        $data = $this->productstoreonline_model->getAllById($id);
        $this->productstoreonlinetemp_model->insert_temp($data);
    }
}