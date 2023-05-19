<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class About_model extends CI_Model
{
    private $_table = "about";
    public $id, $desc, $vision, $mision, $created_at, $updated_at;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('helper');
    }

    public function get()
    {
        $sql = $this->db->query("select * from about")->row();
        return $sql;
    }

    public function save()
    {
        $success = true;
        $message = 'Update Data Berhasil!';

        $post = $this->input->post();
        $data = $this->get();

        $this->desc = $post['about_desc'];
        $this->vision = $post['about_vision'];
        $this->mision = $post['about_mision'];
        $this->id = $post['id'];
        $save = $this->db->update($this->_table, $this, array('id' => $post['id']));
        if (!$save) {
            $success = false;
            $message = 'Update Company Profile Gagal!';
        }

        return ['success' => $success, 'message' => $message];
    }

}