<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Setting_model extends CI_Model
{
    private $_table = "settings";
    public $id, $content, $desc, $slug, $flag, $flag_desc, $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('helper');
    }

    public function get()
    {
        $sql = $this->db->query("select  a.name as menu, a.slug as slug_menu, a.level, a.link, a.type, b.content, b.flag, b.status, b.flag_desc, b.desc
                  from menu a
                  inner join settings b on a.slug = b.slug
                  where a.type = 4 and b.active = 1")->result();
        return $sql;
    }

    public function getById($slug)
    {
        $sql = $this->db->query("select  a.name as menu, a.slug as slug_menu, a.level, a.link, a.type, b.content, b.flag, b.status, b.flag_desc, b.desc
                  from menu a
                  inner join settings b on a.slug = b.slug
                  where a.type = 4 and a.slug = '" . $slug . "'")->row();
        return $sql;
    }

    public function getSetting($slug)
    {
        $sql = $this->db->query("select * from settings where slug = '" . $slug . "' ")->row();
        return $sql;
    }

    public function save()
    {
        $success = false;
        $message = 'Data Gagal Disimpan!';
        $article_id = '';

        $date = new DateTime();
        $post = $this->input->post();
        if ($post['action'] == 'edit') {
            $model = $this->getSetting($post['id']);
            if (isset($model)) {
                $status = 1;
                if (isset($post['status'])){
                    if ($post['status'] == 'off'){
                        $status = 0;
                    }
                }


                $flag = 1;
                if (isset($post['flag'])){
                    if ($post['flag'] == 'off'){
                        $flag = 0;
                    }
                }

                $flag_desc = 1;
                if (isset($post['flag_desc'])){
                    if ($post['flag_desc'] == 'off'){
                        $flag_desc = 0;
                    }
                }

                $data = [
                    'id' => $model->id,
                    'slug' => $model->slug,
                    'content' => isset($post['content']) ?  $post['content'] : $model->content,
                    'desc' => isset($post['desc']) ?  $post['desc'] : $model->desc,
                    'status' => isset($post['status']) ?  $status : $model->desc,
                    'flag' => isset($post['flag']) ?  $flag : $model->flag,
                    'flag_desc' => isset($post['flag_desc']) ?  $flag_desc : $model->flag_desc,
                ];

                $save = $this->db->update($this->_table, $data, array('id' => $model->id));
                if ($save) {
                    $setting_id = $model->id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            }
        }
        return ['success' => $success, 'message' => $message, 'setting' => $setting_id];
    }


}