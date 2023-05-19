<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Profile_model extends CI_Model
{
    private $_table = "profile";
    public $user_id, $name, $email, $phone, $typeuser_id, $foto;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model'));
        $this->load->library(array('upload'));
        $this->load->library(array('helper'));
    }

    public function save()
    {
        $success = true;
        $message = 'Create Profile Berhasil!';
        $post = $this->input->post();

        if ($post['isNewRecord'] == 'true') {
            $user = $this->user_model->save($post['User'], $post['isNewRecord'], $post['user_id'], $post['email']);
        } else {
            $user['success'] = true;
        }

        if ($user['success'] == true) {

            $this->name = $post['name'];
            $this->email = $post['email'];
            $this->phone = $post['phone'];
            $this->typeuser_id = $post['typeuser_id'];
            if ($post['isNewRecord'] == 'true') {
                if (!empty($_FILES['foto']['name'])) {
                    $helper_upload = $this->helper->upload_image($_FILES['foto'], 'profile');
                    $this->upload->initialize($helper_upload);
                    if ($this->upload->do_upload('foto')) {
                        $foto = $this->upload->data();
                        $this->foto = $foto['file_name'];
                    }
                }

                $this->user_id = $user['user_id'];
                $save = $this->db->insert($this->_table, $this);
                if (!$save) {
                    $success = false;
                    $message = 'Create Profile Gagal!';
                }

            } else {
                $data = $this->getById($post['user_id']);
                if (!empty($_FILES['foto']['name'])) {
                    if ($data->foto != $_FILES['foto']['name']) {
                        $helper_upload = $this->helper->upload_image($_FILES['foto'], 'profile');
                        $this->upload->initialize($helper_upload);
                        if ($this->upload->do_upload('foto')) {
                            $foto = $this->upload->data();
                            $this->foto = $foto['file_name'];
                        }
                    } else {
                        $this->foto = $data->foto;
                    }
                } else {
                    $this->foto = $data->foto;
                }
                $this->user_id = $post['user_id'];
                $save = $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
                if (!$save) {
                    $success = false;
                    $message = 'Update Profile Gagal!';
                }
            }
        } else {
            $success = false;
            $message = $user['message'];
        }

        return ['success' => $success, 'message' => $message, 'user_id' => $this->user_id];
    }

    public function getAllData()
    {
        $sql = $this->db->query("
                                select a.user_id, a.name, a.email, a.phone, b.username, b.status, c.value as typeuser, a.typeuser_id from profile a
                                inner join user b on b.id = a.user_id
                                inner join typeuser c on c.id = a.typeuser_id");
        $data = $sql->result_array();
        return $data;
    }

    public function getById($id)
    {
        $sql = $this->db->query("
                                select a.user_id, a.name, a.email, a.phone, b.username, b.status, c.value as typeuser, 
                                b.status, a.typeuser_id, b.password_hash as password, a.foto  from profile a
                                inner join user b on b.id = a.user_id
                                inner join typeuser c on c.id = a.typeuser_id where a.user_id = '" . $id . "'");
        $data = $sql->row();
        return $data;
    }


}