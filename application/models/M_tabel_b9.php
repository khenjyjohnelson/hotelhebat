<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b9 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_b9_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function ambil_tabel_a1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b9_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_b9_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function ambil_tabel_b9_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b9_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b9_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function ambil_tabel_b8($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_b9']} 
		JOIN {$this->aliases['tabel_b8']} 
		ON {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field3']} = {$this->aliases['tabel_b8']}.{$this->aliases['tabel_b8_field2']}
		WHERE {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field2']} = $param1
		ORDER BY {$this->aliases['tabel_b9_field1']} DESC";
		return $this->db->query($sql);
	}

	public function ambil_tabel_b8_limit($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_b9']} 
		JOIN {$this->aliases['tabel_b8']} 
		ON {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field3']} = {$this->aliases['tabel_b8']}.{$this->aliases['tabel_b8_field2']}
		WHERE {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field2']} = $param1
		ORDER BY {$this->aliases['tabel_b9_field1']} DESC LIMIT 3";
		return $this->db->query($sql);
	}

	public function ambil_tabel_b9_field2($param1)
	{
		$this->db->where($this->aliases['tabel_b9_field2'], $this->session->userdata($this->aliases['tabel_c2_field1']));
		$this->db->where($this->aliases['tabel_b9_field6'], NULL);
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b9'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_b9_field2'], $param1);
		return $this->db->update($this->aliases['tabel_b9'], $data);
	}

	public function update_satu($data, $param1, $param2)
	{
		$this->db->where($this->aliases['tabel_b9_field1'], $param1);
		$this->db->where($this->aliases['tabel_b9_field2'], $param2);
		return $this->db->update($this->aliases['tabel_b9'], $data);
	}

	public function update_tabel_e3_field7($data, $param1, $param2)
	{
		$this->db->where($this->aliases['tabel_b9_field2'], $param1);
		$this->db->where($this->aliases['tabel_b9_field5'], $param2);
		return $this->db->update($this->aliases['tabel_b9'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_b9_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b9']);
	}
}
