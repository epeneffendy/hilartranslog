<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Service_model extends CI_Model
{
    private $_table = "services";
    public $id, $name, $status, $created_at, $updated_at, $created_by, $updated_by, $desc;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('helper');
    }

    public function getAll()
    {
        $sql = $this->db->query("select * from services")->result();
        return $sql;
    }

    public function getById($id)
    {
        $sql = $this->db->query("select * from services where id= '".$id."'")->row();
        return $sql;
    }

    public function save()
    {
        $success = false;
        $message = 'Data Gagal Disimpan!';
        $article_id = '';

        $date = new DateTime();
        $post = $this->input->post();
        if ($post['isNewRecord'] == 'true') {
            $this->created_at = $date->getTimestamp();

            $this->name = $post['name'];
            $this->desc = $post['desc'];
            $this->status = ($post['status'] == 0) ? 1 : $post['status'];
            $this->updated_at = $date->getTimestamp();
            $this->created_by = $this->session->userdata('id');
            $this->updated_by = $this->session->userdata('id');
            $save = $this->db->insert($this->_table, $this);
            if ($save) {
                $article_id = $this->db->insert_id();
                $success = true;
                $message = 'Data Berhasil Disimpan!';
            }
        } else {
            $service = $this->getById($post['id']);
            if (isset($service)) {

                $data = [
                    'id' => $post['id'],
                    'name' => $post['name'],
                    'desc' => $post['desc'],
                    'status' => ($post['status'] == 0) ? 1 : $post['status'],
                    'created_at' => $service->created_at,
                    'updated_at' => $date->getTimestamp(),
                    'created_by' => $service->created_by,
                    'updated_by' => $this->session->userdata('id'),
                ];
                $save = $this->db->update($this->_table, $data, array('id' => $post['id']));
                if ($save) {
                    $service_id = $service->id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            } else {
                $success = false;
                $message = 'Product tidak ditemukan!';
            }
        }
        return ['success' => $success, 'message' => $message, 'service_id' => $service_id];
    }

    public function update_status($id, $status)
    {
        $success = false;
        $message = 'Failed, Updated!';

        $update_status = array(
            'status' => $status,
        );

        $this->db->where('id', $id);
        $update = $this->db->update($this->_table, $update_status);
        if ($update) {
            $success = true;
            $message = 'Updated Status Successfuly!';
        }

        return ['success' => $success, 'message' => $message];
    }
}