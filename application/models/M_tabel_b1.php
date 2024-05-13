<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b1 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function dekor($param1, $param2)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		$this->db->where($this->aliases['tabel_b1_field2'], $param2);
		$this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function filter($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		$this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function insert($param1)
	{
		$sql = "INSERT INTO your_table (name, value)
		SELECT 
			name,
			CASE 
				WHEN value = 'specific_value' THEN 'modified_value'
				ELSE value
			END AS modified_value
		FROM your_table
		WHERE value IN ('specific_value', 'another_specific_value');";

		return $this->db->query($sql);
	}


	public function ambil_tabel_b1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_b1'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_b1_field1'], $param1);
		return $this->db->update($this->aliases['tabel_b1'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b1']);
	}

	public function hapus_b7($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		return $this->db->delete($this->aliases['tabel_b1']);
	}
}
