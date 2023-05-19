<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class BranchStore_model extends CI_Model
{
	private $_table = "master_branch_store";
    public $id, $name, $address, $phone, $url_maps, $created_at, $updated_at;

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }
    public function getById($id)
    {
        $data = $this->db->query("select * from master_branch_store where id ='" . $id . "'")->row();
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
            $this->address = isset($post['address']) ? $post['address'] : '';
            $this->phone = isset($post['phone']) ? $post['phone'] : '';
            $this->url_maps = isset($post['url_maps']) ? $post['url_maps'] : '';
            $this->url_embed = isset($post['url_embed']) ? $post['url_embed'] : '';
            $this->db->insert($this->_table, $this);
        } else {
            $this->id = $post['id'];
            $this->updated_at = $date->getTimestamp();
            $this->name = $post['name'];
            $this->address = isset($post['address']) ? $post['address'] : '';
            $this->phone = isset($post['phone']) ? $post['phone'] : '';
            $this->url_maps = isset($post['url_maps']) ? $post['url_maps'] : '';
            $this->url_embed = isset($post['url_embed']) ? $post['url_embed'] : '';
            $this->db->update($this->_table, $this, array('id' => $post['id']));
        }
    }


    public function delete($id)
    {
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
}
