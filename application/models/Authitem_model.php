<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Authitem_model extends CI_Model
{
    private $_table = "auth_item";
    public $name, $type, $created_at, $updated_at;

    public function create_role($slug)
    {
        $date = new DateTime();

        $this->name = $slug;
        $this->type = 1;
        $this->created_at = $date->getTimestamp();
        $this->updated_at = $date->getTimestamp();
        $this->db->insert($this->_table, $this);
    }
}