<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Settingimage_model extends CI_Model
{
    private $_table = "master_image";
    public $id, $name, $description, $title, $image, $created_at, $updated_at, $type;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('helper');
    }

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getById($code)
    {
        $sql = $this->db->query("select * from master_image where id = '" . $code . "' ")->row();

        return $sql;
    }

    public function save()
    {
        $success = true;
        $message = 'Update Image Berhasil!';

        $post = $this->input->post();
        $data = $this->getById($post['id']);
        if (!empty($_FILES['image']['name'])) {
            if ($data->image != $_FILES['image']['name']) {
                $type_image = 'image_header';
                if ($post['type'] == 2) {
                    $type_image = 'image_brand';
                }
                $helper_upload = $this->helper->upload_image($_FILES['image'], $type_image);
                $this->upload->initialize($helper_upload);
                if ($this->upload->do_upload('image')) {
                    $foto = $this->upload->data();
                    $this->image = $foto['file_name'];
                }
            } else {
                $this->image = $data->image;
            }
        } else {
            $this->image = $data->image;
        }

        $this->name = $post['name'];
        $this->title = $post['title'];
        $this->description = $post['description'];
        $this->type = $post['type'];
        $this->id = $post['id'];
        $this->size_image = $post['size_image'];

        $save = $this->db->update($this->_table, $this, array('id' => $post['id']));
        if (!$save) {
            $success = false;
            $message = 'Update Image Gagal!';
        }

        return ['success' => $success, 'message' => $message];
    }

}