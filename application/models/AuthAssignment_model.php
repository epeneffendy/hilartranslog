<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class AuthAssignment_model extends CI_Model
{
    private $_table = "auth_assignment";
    public $item_name, $user_id, $created_at;

    public function delete_auth($user_id)
    {
        $success = true;
        $message = 'Berhasil Hapus Role Lama!';

        $delete = $this->db->delete('auth_assignment', array('user_id' => $user_id));
        if (!$delete) {
            $success = false;
            $message = 'Gagal Hapus Role Lama!';
        }

        return ['success' => $success, 'message' => $message];
    }

    public function save($user_id, $menu)
    {
        $success = true;
        $message = 'Auth Assignment Berhasil Disimpan!';
        $date = new DateTime();

        $this->item_name = $menu;
        $this->user_id = $user_id;
        $this->created_at = $date->getTimestamp();

        $save = $this->db->insert($this->_table, $this);
        if (!$save) {
            $success = false;
            $message = 'Auth Assignment Gagal Disimpan!';
        }
        return ['success' => $success, 'message' => $message];
    }

    public function dataRole()
    {
        $data = [];
        $sql = $this->db->query("select a.user_id, a.name, b.username, c.value as typeuser, f.name as name_menu, f.slug, e.item_name, f.id, a.typeuser_id
                                from profile a 
                                left join user b on b.id = a.user_id
                                left join typeuser c on c.id = a.typeuser_id
                                left join auth_assignment e on e.user_id = a.user_id
                                left join menu f on concat('GROUPMENU-',f.slug)= e.item_name or SUBSTRING_INDEX(e.item_name, '[', 1) = f.slug");
        $menus = $sql->result_array();

        if (count($menus) > 0) {
            foreach ($menus as $ind => $item) {
                $menuact = $this->menuAct($item['user_id'], $item['slug']);
                $data[$item['user_id']]['user_id'] = $item['user_id'];
                $data[$item['user_id']]['name'] = $item['name'];
                $data[$item['user_id']]['typeuser'] = $item['typeuser'];
                $data[$item['user_id']]['typeuser_id'] = $item['typeuser_id'];
                $data[$item['user_id']]['username'] = $item['username'];
                $data[$item['user_id']]['details'] = $menuact;
            }
        }
        return $data;
    }

    public function menuAct($user_id, $slug)
    {
        $sql_group_menus = $this->db->query("select slug, name from menu where level = 1 and type = 3");
        $groupMenus = $sql_group_menus->result_array();

        $ind_group = [];
        foreach ($groupMenus as $menu) {
            $ind_group[$menu['slug']] = $menu['name'];
        }

        $menu = ['group' => [], 'menu' => []];
        $sql_group = $this->db->query("select item_name from auth_assignment where user_id ='" . $user_id . "' and SUBSTRING(item_name,1,10)= 'GROUPMENU-'");
        $_group = $sql_group->result_array();
        $groupmenus = [];
        $groupmenus_role = [];
        foreach ($_group as $item) {
            if (isset($ind_group[str_replace('GROUPMENU-', '', $item['item_name'])])) {
                $nm = $ind_group[str_replace('GROUPMENU-', '', $item['item_name'])];
                if (isset($nm)) {
                    $groupmenus[] = $nm;
                    $groupmenus_role[$item['item_name']] = $item['item_name'];
                }
            }
        }

        $sql_menu = $this->db->query("select item_name from auth_assignment where user_id ='" . $user_id . "' and SUBSTRING(item_name,1,10)<>'GROUPMENU-'");
        $_menu = $sql_menu->result_array();
        $menus = [];
        $menus_role = [];
        foreach ($_menu as $role) {
            $key = explode('[', $role['item_name']);
            $slug = $key[0];
            if (isset($key[1])) {
                $act = substr($key[1], 0, 1);
                $this->db->where('slug', $slug);
                $mn = $this->db->get('menu')->row();
                if (isset($mn)) {
                    $menus[$mn->name][] = $act;
                    $menus_role[$role['item_name']] = $role['item_name'];
                }
            }
        }
        return ['group' => $groupmenus, 'menu' => $menus, 'menu_role' => $menus_role, 'group_role' => $groupmenus_role];
    }

    public function access($user_id)
    {
        $access = $this->menuAct($user_id, '');
        $arr_access = '';
        $menus = $access['menu_role'];
        $groups = $access['group_role'];
        $group = [];
        if (!empty($groups)) {
            foreach ($groups as $item) {
                $sql_group = $this->db->query("select child from auth_item_child where parent ='" . $item . "'");
                $_group = $sql_group->result_array();
                if (!empty($_group)) {
                    foreach ($_group as $gr) {
                        $group[$gr['child']] = $gr['child'];
                    }
                }
            }
        }

        $arr_access = array_merge($group, $menus);

        return $arr_access;
    }
}

