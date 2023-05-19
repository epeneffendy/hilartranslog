<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Clients_model extends CI_Model
{
    private $_table = "clients";
    public $id, $client, $status, $created_at, $updated_at, $created_by, $updated_by, $image;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('helper');
    }

    public function getAll()
    {
        $sql = $this->db->query("select * from clients")->result();
        return $sql;
    }

    public function getById($id)
    {
        $sql = $this->db->query("select * from clients where id= '".$id."'")->row();
        return $sql;
    }

    public function getAllByStatus()
    {
        $sql = $this->db->query(
            "select a.id as id,  a.title, a.status, a.content,a.short_content, b.name as created_by, a.created_at, a.image, a.slug
            from blogs a
            inner join profile b on b.user_id = a.created_by
            where a.status = 2
        ")->result();
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

            if (!empty($_FILES['image']['name'])) {
                $helper_upload = $this->helper->upload_image($_FILES['image'], 'client');
                $this->upload->initialize($helper_upload);
                if ($this->upload->do_upload('image')) {
                    $foto = $this->upload->data();
                    $this->image = $foto['file_name'];
                }
            }

            $this->client = $post['client'];
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
            $client = $this->getById($post['id']);
            if (isset($client)) {
                $image = '';
                if (!empty($_FILES['image']['name'])) {
                    $helper_upload = $this->helper->upload_image($_FILES['image'], 'client');
                    $this->upload->initialize($helper_upload);
                    if ($this->upload->do_upload('image')) {
                        $foto = $this->upload->data();
                        $image = $foto['file_name'];
                    }
                } else {
                    $image = $client->image;
                }
                $data = [
                    'id' => $post['id'],
                    'client' => $post['client'],
                    'status' => ($post['status'] == 0) ? 1 : $post['status'],
                    'image' => $image,
                    'created_at' => $client->created_at,
                    'updated_at' => $date->getTimestamp(),
                    'created_by' => $client->created_by,
                    'updated_by' => $this->session->userdata('id'),
                ];
                $save = $this->db->update($this->_table, $data, array('id' => $post['id']));
                if ($save) {
                    $client_id = $client->id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            } else {
                $success = false;
                $message = 'Product tidak ditemukan!';
            }
        }
        return ['success' => $success, 'message' => $message, 'client_id' => $client_id];
    }
}