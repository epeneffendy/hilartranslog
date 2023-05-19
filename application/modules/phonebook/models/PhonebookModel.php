<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class PhonebookModel extends CI_Model
{
    private $_table = "phonebook";
    public $id, $first_name, $last_name, $phone_number, $email, $status, $created_at, $updated_at;
    private $STATUS_ACTIVE = 1;
    private $STATUS_NONACTIVE = 0;

    public function getAll()
    {
        $data = $this->db->get($this->_table)->result();
        return $data;
    }

    public function getById($id)
    {
        $data = $this->db->where('id', $id)->get($this->_table)->row();
        return $data;
    }

    public function save()
    {
        $success = false;
        $message = 'Data Gagal Disimpan!';
        $product_id = '';

        $date = new DateTime();
        $post = $this->input->post();

        if ($post['isNewRecord'] == 'true') {
            $this->first_name = $post['first_name'];
            $this->last_name = $post['last_name'];
            $this->phone_number = $post['phone_number'];
            $this->email = $post['email'];
            $this->status = $this->STATUS_ACTIVE;
            $this->created_at = $date->getTimestamp();
            $this->updated_at = $date->getTimestamp();
            $save = $this->db->insert($this->_table, $this);
            if ($save) {
                $product_id = $this->db->insert_id();
                $success = true;
                $message = 'Data Berhasil Disimpan!';
            }
        } else {
            $model = $this->getById($post['id']);
            $image = '';
            if (isset($model)) {
                $data = [
                    'id' => $post['id'],
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'phone_number' => $post['phone_number'],
                    'email' => $post['email'],
                    'status' => $post['status'],
                    'created_at' => $model->created_at,
                    'updated_at' => $date->getTimestamp()
                ];
                $save = $this->db->update($this->_table, $data, array('id' => $post['id']));
                if ($save) {
                    $phonebook_id = $model->phonebook_id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            } else {
                $success = false;
                $message = 'Product tidak ditemukan!';
            }
        }
        return ['success' => $success, 'message' => $message, 'phonebook_id' => $phonebook_id];
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