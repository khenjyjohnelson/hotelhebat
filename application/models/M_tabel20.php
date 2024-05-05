<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel20 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel20_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel20']);
	}

	public function ambil_tabel20_field1($param1)
	{
		$this->db->where($this->aliases['tabel20_field1'], $param1);
		$this->db->order_by($this->aliases['tabel20_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel20']);
	}

	public function ambil_tabel9_field1($param1)
	{
		$this->db->where($this->aliases['tabel9_field1'], $param1);
		$this->db->order_by($this->aliases['tabel20_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel20']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel20'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel20_field1'], $param1);
		return $this->db->update($this->aliases['tabel20'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel20_field1'], $param1);
		return $this->db->delete($this->aliases['tabel20']);
	}
}
