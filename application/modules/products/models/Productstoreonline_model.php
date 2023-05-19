<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Productstoreonline_model extends CI_Model
{
    private $_table = "product_store_online";

    public function getAllById($id)
    {
        $this->db->where('product_id', $id);
        $this->db->order_by('store_name', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function save($id, $item)
    {
        $success = false;
        $message = 'Data Gagal Disimpan!';

        $data = [
            'product_id' => $id,
            'store_name' => $item['store_name'],
            'type_store' => $item['store'],
            'url' => $item['url'],
        ];

        $save = $this->db->insert($this->_table, $data);
        if ($save) {
            $success = true;
            $message = 'Data Berhasil Disimpan!';
        }
        return ['success' => $success, 'message' => $message];
    }

    public function delete()
    {
        $success = false;
        $message = 'Data Gagal Dihpus!';
        $delete = $this->db->delete($this->_table, array('id' => $_POST['key']));

        if ($delete) {
            $success = true;
            $message = 'Data Berhasil Dihapus!';
        }
        return ['success' => $success, 'message' => $message];
    }
}