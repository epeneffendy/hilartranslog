<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class AuthItemChild_model extends CI_Model
{
    private $_table = "auth_item_child";
    private $_table_menu = "menu";
    public $parent, $child;

    public function getAll()
    {
        $sql = $this->db->query("select a.id, a.name, a.slug, b.parent, b.child from menu a
                                inner join auth_item_child b on b.parent = concat('GROUPMENU-', a.slug)
                                where a.type = 3");
        $menus = $sql->result_array();
        return $menus;
    }

    public function save($slug)
    {
        $post = $this->input->post();
        $role_menu = $post['MenuRoleForm']['menus'];
        if (isset($post)) {
            $this->db->where('slug', $slug);
            $menu = $this->db->get('menu')->row();
            if (isset($menu)) {
                $this->db->where('name', 'GROUPMENU-' . $slug);
                $auth_item = $this->db->get('auth_item')->row();
                if (isset($auth_item)) {
                    foreach ($role_menu as $ind => $val) {
                        $this->parent = $auth_item->name;
                        $this->child = $val;
                        $this->db->insert($this->_table, $this);
                    }
                }
            }
        }
    }

    public function dataMenu()
    {
        $data = [];
        $sql = $this->db->query("select a.id, a.name, a.slug, b.name as name_auth from menu a
                inner join auth_item b on b.name = concat('GROUPMENU-',a.slug)");
        $menus = $sql->result_array();
        if (count($menus) > 0) {
            foreach ($menus as $ind => $item) {
                $menuact = $this->menuAct($item['name_auth'], $item['slug']);
                $data[$item['id']]['id'] = $item['id'];
                $data[$item['id']]['name'] = $item['name'];
                $data[$item['id']]['details'] = $menuact;
            }
        }
        return $data;
    }

    public function menuAct($name, $slug)
    {
        $sql_group_menus = $this->db->query("select name from menu where level = 1 and type = 3");
        $groupMenus = $sql_group_menus->result_array();

        $menu = ['group' => [], 'menu' => []];
        $sql_group = $this->db->query("select child from auth_item_child where parent ='" . $name . "' and SUBSTRING(child,1,10)= 'GROUPMENU-'");
        $_group = $sql_group->result_array();
        foreach ($_group as $role) {
            $nm = isset($groupMenus[str_replace('GROUPMENU-', '', $role['child'])]) ? $groupMenus[str_replace('GROUPMENU-', '', $role['child'])] : '';
            if (!empty($nm)) {
                $menu['group'][] = $nm;
            }
        }

        $sql_menu = $this->db->query("select child from auth_item_child where parent ='" . $name . "' and SUBSTRING(child,1,10)<>'GROUPMENU-'");
        $_menu = $sql_menu->result_array();
        foreach ($_menu as $role) {
            $key = explode('[', $role['child']);
            $slug = $key[0];
            if (isset($key[1])) {
                $act = substr($key[1], 0, 1);
                $this->db->where('slug', $slug);
                $mn = $this->db->get('menu')->row();
                if (isset($mn)) {
                    $menu['menu'][$mn->name][] = $act;
                }
            }
        }
        return $menu;
    }

    public function delete_auth($parent)
    {
        $success = true;
        $message = 'Berhasil Hapus Role Lama!';

        $delete = $this->db->delete('auth_item_child', array('parent' => 'GROUPMENU-' . $parent));
        if (!$delete) {
            $success = false;
            $message = 'Gagal Hapus Role Lama!';
        }

        return ['success' => $success, 'message' => $message];
    }
}