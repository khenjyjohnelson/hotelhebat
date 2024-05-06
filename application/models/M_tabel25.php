<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel25 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel25_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel25']);
	}

	public function tema($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel7']} 
		JOIN {$this->aliases['tabel25']} 
		ON {$this->aliases['tabel7']}.{$this->aliases['tabel7_field8']} = {$this->aliases['tabel25']}.{$this->aliases['tabel25_field1']}
		WHERE {$this->aliases['tabel7']}. {$this->aliases['tabel7_field1']} = $param1";
		return $this->db->query($sql);
	}

	public function ambil_tabel7_field1($param1)
	{
		$this->db->where($this->aliases['tabel25_field2'], $param1);
		$this->db->order_by($this->aliases['tabel25_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel25']);
	}

	public function ambil_tabel25_field1($param1)
	{
		$this->db->where($this->aliases['tabel25_field1'], $param1);
		$this->db->order_by($this->aliases['tabel25_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel25']);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel25'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel25_field1'], $param1);
		return $this->db->update($this->aliases['tabel25'], $data);
	}

	public function update_tabel5_field7($data, $param1, $param2)
	{
		$this->db->where($this->aliases['tabel25_field2'], $param1);
		$this->db->where($this->aliases['tabel25_field5'], $param2);
		return $this->db->update($this->aliases['tabel25'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel25_field1'], $param1);
		return $this->db->delete($this->aliases['tabel25']);
	}
}
