<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel2 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel2']);
	}

	public function ambil_tabel2_field1($param1)
	{
		$this->db->where($this->aliases['tabel2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel2']);
	}

	public function ambil_tabel9_field1($param1)
	{
		$this->db->where($this->aliases['tabel9_field1'], $param1);
		$this->db->order_by($this->aliases['tabel9_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel2']);
	}

	public function ambil_tabel2_field2($param1)
	{
		$this->db->where($this->aliases['tabel2_field2'], $param1);
		$this->db->order_by($this->aliases['tabel2_field2'], 'DESC');
		return $this->db->get($this->aliases['tabel2']);
	}


	// Eventhought the codes below works, there's still flasws inside the code
	// To apply the filter, I actualy have two options, 
	// first, is to make the filter must be fill altogether so that the filter will perfectly work,
	// but it will make the website seems a bit messy and a lot of codes
	// second, is to make the a dropdown or a toggle that can switch between cek in or cek out filter
	// three, is to make a javascript that can switch the button from the one that using the filter function with OR 
	// and the filter function with AND, with that, the fiter will be fine
	public function filter($param1, $param2, $param3, $param4)
	{
		$filter = "SELECT * FROM $this->aliases['tabel2'] WHERE 
		
		$this->aliases['tabel2_field11'] BETWEEN '$param1' AND '$param2'
		 OR 
		 $this->aliases['tabel2_field12'] BETWEEN '$param3' AND '$param4'
		ORDER BY $this->aliases['tabel2_field1'] DESC";
		return $this->db->query($filter);
	}

	public function filter_tabel4($param1, $param2, $param3, $param4, $param5)
	{
		$filter = "SELECT * FROM $this->aliases['tabel2'] WHERE 
		$this->aliases['tabel9_field1'] IN ($param5) AND
		$this->aliases['tabel2_field11'] BETWEEN '$param1' AND '$param2'
		OR
		$this->aliases['tabel2_field12'] BETWEEN '$param3' AND '$param4'
		ORDER BY $this->aliases['tabel2_field1'] DESC";
		return $this->db->query($filter);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel2'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel2_field2'], $param1);
		return $this->db->update($this->aliases['tabel2'], $data);
	}

	public function update_tabel2($data, $param1)
	{
		$this->db->where($this->aliases['tabel2_field2'], $param1);
		return $this->db->update($this->aliases['tabel2'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel2_field1'], $param1);
		return $this->db->delete($this->aliases['tabel2']);
	}
}
