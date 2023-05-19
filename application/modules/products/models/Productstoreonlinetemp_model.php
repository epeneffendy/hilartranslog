<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Productstoreonlinetemp_model extends CI_Model
{
    private $_table = "product_store_online_temp";

    public function save($item)
    {
        $success = true;
        $message = 'Data Temp Added Successfully!';

        $post = $this->input->post();
        if (isset($item)) {
            $post = $item;
        }
        if ($post['action'] == 'new') {
            $data = [
                'store_name' => $post['store_name'],
                'store' => $post['store'],
                'url' => $post['url'],
                'user_id' => $this->session->userdata('id'),
            ];
            $save = $this->db->insert($this->_table, $data);
            if (!$save) {
                $success = false;
                $message = 'Data Temp Gagal Disimpan!';
            }
        }else{

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

    public function insert_temp($temps)
    {
        $temp = [];
        if (!empty($temps)) {
            foreach ($temps as $item) {
                $data = [
                    'store_name' => $item->store_name,
                    'store' => $item->type_store,
                    'url' => $item->url,
                    'user_id' => $this->session->userdata('id'),
                ];
                $save = $this->db->insert($this->_table, $data);
            }
        }
    }
}