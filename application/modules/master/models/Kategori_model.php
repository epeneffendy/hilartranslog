<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Kategori_model extends CI_Model
{
    private $_table = "master_kategori";
    public $id, $name, $keterangan, $created_at, $slug;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
    }

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        $data = $this->db->query("select * from master_kategori where id ='" . $id . "'")->row();
        return $data;
    }

    public function save()
    {
        $date = new DateTime();
        $post = $this->input->post();

        $this->created_at = $date->getTimestamp();

        if ($post['isNewRecord'] == 'true') {
            $this->updated_at = $date->getTimestamp();
            $this->name = isset($post['name']) ? $post['name'] : '';
            $this->keterangan = isset($post['keterangan']) ? $post['keterangan'] : '';
            $this->slug = $this->generate_url_slug($post['name'], 'master_kategori');
            $this->createMenu($this);
            $data = $this->db->insert($this->_table, $this);
        } else {
            $this->id = $post['id'];
            $this->updated_at = $date->getTimestamp();
            $this->name = $post['name'];
            $this->keterangan = $post['keterangan'];
            $this->slug = $post['slug'];
            $this->db->update($this->_table, $this, array('id' => $post['id']));
        }
    }


    public function delete($id)
    {
        $model = $this->getById($id);
        if (isset($model)) {
            $this->menu_model->deleteBySlug($model->slug);
        }
        return $this->db->delete($this->_table, array('id' => $id));
    }

    function generate_url_slug($string, $table, $field = 'slug', $key = NULL, $value = NULL)
    {
        $t =& get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key) $params["$key !="] = $value;

        while ($t->db->where($params)->get($table)->num_rows()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params [$field] = $slug;
        }
        return $slug;
    }

    function createMenu($data)
    {
        $parentMenu = $this->db->query("select * from menu where slug = 'shop' ")->row();
        if (isset($parentMenu)) {
            $urutan = $this->db->query("select max(urutan) as max from menu where parent_id = '" . $parentMenu->id . "' ")->row();

            $data = [
                'name' => $data->name,
                'slug' => $data->slug,
                'level' => 2,
                'link' => 'web/shops/' . $data->slug,
                'icon' => '',
                'parent_id' => $parentMenu->id,
                'urutan' => $urutan->max + 1,
                'type' => 4,
            ];
            $this->db->insert('menu', $data);
        }
    }
}
