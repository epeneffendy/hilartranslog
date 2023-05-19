<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Menu_model extends CI_Model
{
    private $_table = "menu";
    public $id, $name, $slug, $level, $link, $icon, $parent_id, $urutan, $type;

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

    public function save()
    {
        $post = $this->input->post();
        if ($post['isNewRecord'] == 'true') {
            $this->name = isset($post['name']) ? $post['name'] : '';
            $this->icon = isset($post['icon']) ? $post['icon'] : '';
            $this->urutan = isset($post['urutan']) ? $post['urutan'] : '';
            $this->type = isset($post['position']) ? $post['position'] : '';
            $this->parent_id = null;
            $this->level = 1;
            $this->link = isset($post['link']) ? $post['link'] : '';
            if (isset($post['level_1'])) {
                if (!empty($post['level_1'])) {
                    $this->parent_id = $post['level_1'];
                    $this->level = 2;
                    if (!empty($post['level_2'])) {
                        $this->parent_id = $post['level_2'];
                        $this->level = 3;
                    }
                }
            }
            $this->slug = $this->generate_url_slug($post['name'], 'menu');
            if (isset($post['link'])) {
                if (empty($post['link'])) {
                    $this->link = '#';
                }
            }
            $data = $this->db->insert($this->_table, $this);
            if ($data == true) {
                if ($post['position'] == 3) {
                    $auth = $this->authitem_model->create_role('GROUPMENU-' . $this->slug);
                } else {
                    foreach ($this->cruda() as $ind => $val) {
                        $auth = $this->authitem_model->create_role($this->slug . '[' . $ind . ']');
                    }
                }
            }
        } else {
            $this->id = $post['id'];
            $this->name = $post['name'];
            $this->icon = $post['icon'];
            $this->urutan = $post['urutan'];
            $this->type = $post['position'];
            $this->parent_id = null;
            $this->level = 1;
            $this->link = $post['link'];
            if (!empty($post['level_1'])) {
                $this->parent_id = $post['level_1'];
                $this->level = 2;
                if (!empty($post['level_2'])) {
                    $this->parent_id = $post['level_2'];
                    $this->level = 3;
                }
            }
            $this->slug = $post['slug'];
            if (empty($post['link'])) {
                $this->link = '#';
            }
            $this->db->update($this->_table, $this, array('id' => $post['id']));
        }

        return $this->slug;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }

    public function getAllIndex()
    {
        $this->db->select('a.id, a.name, a.type, a.level, a.urutan, a.link, a.icon, a.parent_id, b.name as parent');
        $this->db->from('menu a');
        $this->db->join('menu b', 'a.parent_id = b.id', 'left');
//        $this->db->where('type );
        $this->db->order_by('a.id', 'asc');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getParent()
    {
        $this->db->select('id, name, slug');
        $this->db->from('menu');
        $this->db->where('level', 1);
        $this->db->where_not_in('type', 3);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
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

    function find_parent($parent, $level)
    {
        $arr_parent = [
            1 => '',
            2 => ''
        ];

        if ($level == 2) {
            $arr_parent = [
                1 => $parent,
                2 => '',
            ];
        } else if ($level == 3) {
            $parent_2 = $this->db->get_where($this->_table, ["id" => $parent])->row();
            $arr_parent = [
                1 => $parent_2->parent_id,
                2 => $parent,
            ];
        }
        return $arr_parent;
    }

    function cruda()
    {
        return ['C' => 'CREATE', 'R' => 'READ', 'U' => 'UPDATE', 'D' => 'DELETE', 'A' => 'APPROVAL'];
    }

    public function getGroupMenu()
    {
        $data = $this->db->query("select * from menu where level = 1 and type = 3")->result_array();
        return $data;
    }

    public function getBySlug($slug)
    {
        $data = $this->db->query("select * from menu where slug ='" . $slug. "'")->row();
        return $data;
    }

    public function deleteBySlug($slug)
    {
        return $this->db->delete($this->_table, array('slug' => $slug));
    }
}