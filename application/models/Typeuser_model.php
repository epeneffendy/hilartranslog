<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Typeuser_model extends CI_Model
{
   
    private $_table = "typeuser";
    public $id, $code, $value, $description;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('authitem_model'));
    }

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        $data = $this->db->query("select * from typeuser where id ='" . $id . "'")->row();
        return $data;
    }

    public function add()
    {
        $post = $this->input->post();

        if ($post['isNewRecord'] == 'true') {
            $this->code = isset($post['code']) ? $post['code'] : '';
            $this->value = isset($post['value']) ? $post['value'] : '';
            $this->description = isset($post['description']) ? $post['description'] : '';
            $data = $this->db->insert($this->_table, $this);
        } else {
            $this->id = $post['id'];
            $this->code = $post['code'];
            $this->value = $post['value'];
            $this->description = $post['description'];
            // print_r($this);die();

            $this->db->update($this->_table, $this, array('id' => $post['id']));
        }
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }

    public function getType()
    {
        $this->db->select('id, code, value, description');
        $this->db->from('typeuser');
        $this->db->order_by('value', 'asc');
        $query = $this->db->get()->result();
        return $query;
    }
}
