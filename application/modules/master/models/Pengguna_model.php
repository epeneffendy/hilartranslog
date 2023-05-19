<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Pengguna_model extends CI_Model
{
	private $_table = "master_pengguna";
	public $id, $name, $keterangan, $status;

	public function getAll()
	{
		$this->db->order_by('id', 'asc');
		return $this->db->get($this->_table)->result();
	}
}
