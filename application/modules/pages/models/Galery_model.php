<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Galery_model extends CI_Model
{
    private $_table = "galery";
    public $id, $title, $image, $created_at, $updated_at;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('helper');
    }

    public function get()
    {
        $sql = $this->db->query("select * from galery")->result();
        return $sql;
    }

    public function getById($id)
    {
        $sql = $this->db->query("select * from galery where id= '" . $id . "'")->row();
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

            $this->title = $post['title'];
            $this->status = 2;
            $this->updated_at = $date->getTimestamp();
            $save = $this->db->insert($this->_table, $this);
            if ($save) {
                $article_id = $this->db->insert_id();
                $success = true;
                $message = 'Data Berhasil Disimpan!';
            }
        } else {
            $galery = $this->getById($post['id']);
            if (isset($galery)) {
                $image = '';

                if (!empty($_FILES['image']['name'])) {
                    $helper_upload = $this->helper->upload_image($_FILES['image'], 'galery');
                    $this->upload->initialize($helper_upload);
                    if ($this->upload->do_upload('image')) {
                        $foto = $this->upload->data();
                        $image = $foto['file_name'];
                    }
                } else {
                    $image = $galery->image;
                }
                $data = [
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'image' => $image,
                    'status' => 2,
                    'created_at' => $galery->created_at,
                    'updated_at' => $date->getTimestamp(),
                ];
                $save = $this->db->update($this->_table, $data, array('id' => $post['id']));
                if ($save) {
                    $galery_id = $galery->id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            } else {
                $success = false;
                $message = 'Product tidak ditemukan!';
            }
        }
        return ['success' => $success, 'message' => $message, 'galery_id' => $galery_id];
    }

    public function update_status($id, $status)
    {
        $success = false;
        $message = 'Failed, Updated!';

        $update_status = array(
            'image' => '',
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