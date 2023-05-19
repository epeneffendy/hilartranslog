<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class User_model extends CI_Model
{
    private $_table = "user";
    public $id, $username, $email, $password_hash, $auth_key, $confirmed_at, $unconfirmed_email, $blocked_at, $created_at, $updated_at, $flags, $last_login_at, $status;

    public function save($post, $isNewRecord, $user_id, $email)
    {
        $success = false;
        $message = 'Gagal Create User!';
        $date = new DateTime();

        $this->username = $post['username'];
        $this->email = $email;
        $this->created_at = $date->getTimestamp();
        $this->status = 1;

        if ($isNewRecord == 'true') {
            $this->updated_at = $date->getTimestamp();
            $this->password_hash = password_hash($post['password'], PASSWORD_DEFAULT);
            $this->db->insert($this->_table, $this);
            $user_id = $this->db->insert_id();
            $success = true;
            $message = 'Berhasil Create User!';
        } else {
            $this->id = $user_id;
            $this->updated_at = $date->getTimestamp();
            $this->db->update($this->_table, $this, array('id' => $user_id));
            $success = true;
            $message = 'Berhasil Update User!';
        }
        return ['success' => $success, 'message' => $message, 'user_id' => $user_id];
    }

    public function blocked($id)
    {
        $date = new DateTime();
        $update_status = array(
            'status' => 0,
            'blocked_at' => $date->getTimestamp()
        );
        $this->db->where('id', $id);
        $this->db->update($this->_table, $update_status);
    }

    public function reset($id, $password)
    {
        $date = new DateTime();
        $reset_password = array(
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'updated_at' => $date->getTimestamp()
        );
        $this->db->where('id', $id);
        $this->db->update($this->_table, $reset_password);
    }

    public function getAllUser()
    {
        $data = $this->db->query("select a.id as user_id, a.username, b.name, c.value as typeuser, b.typeuser_id, b.email from user a
                                inner join profile b on b.user_id = a.id
                                left join typeuser c on c.id = b.typeuser_id")->result_array();
        return $data;
    }

    public function getById($id)
    {
        $data = $this->db->query("select a.id as user_id, a.username, b.name, c.value as typeuser, b.typeuser_id, a.status, a.password_hash  
                                from user a
                                inner join profile b on b.user_id = a.id
                                left join typeuser c on c.id = b.typeuser_id
                                where a.id = '" . $id . "' ")->row();
        return $data;
    }

    public function check_account($username, $password, $switch)
    {
        $user = $this->db->query("select a.id as user_id, a.username, b.name, c.value as typeuser, b.typeuser_id, a.status, a.password_hash, b.foto from user a
                                inner join profile b on b.user_id = a.id
                                left join typeuser c on c.id = b.typeuser_id
                                where a.username = '" . $username . "' ")->row();
        if (!$switch) {
            if (!$user) {
                return 1;
            }
            if ($user->status == 0) {
                return 2;
            }
            if (!hash_verified($password, $user->password_hash)) {
                return 3;
            }
        }

        return $user;
    }

    public function last_login($id, $time)
    {
        $update_status = array(
            'last_login_at' => $time,
        );

        $this->db->where('id', $id);
        $this->db->update($this->_table, $update_status);
    }

}