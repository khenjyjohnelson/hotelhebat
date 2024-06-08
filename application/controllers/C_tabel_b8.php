<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b8 extends Omnitags
{
	// Halaman publik

	
	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_b8_alias_v3_title'),
			'konten' => $this->v3['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8'])->result(),
			'tbl_b8' => $this->tl_b8->get_all_b8()->result(),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_b8_field1'] => '',
			$this->aliases['tabel_b8_field2'] => $this->v_post['tabel_b8_field2'],
			$this->aliases['tabel_b8_field3'] => $this->v_post['tabel_b8_field3'],
			$this->aliases['tabel_b8_field4'] => $this->v_post['tabel_b8_field4'],
		);

		$aksi = $this->tl_b8->insert_b8($data);

		$notif = $this->handle_1b($aksi, 'tabel_b8');

		redirect($_SERVER['HTTP_REFERER']); 
	}


	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel_b8_field1 = $this->v_post['tabel_b8_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field3'] => $this->v_post['tabel_b8_field3'],
			$this->aliases['tabel_b8_field4'] => $this->v_post['tabel_b8_field4'],
		);

		$aksi = $this->tl_b8->update_b8($data, $tabel_b8_field1);

		$notif = $this->handle_2b($aksi, 'tabel_a1_field1', $tabel_b8_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}


	public function delete($tabel_b8_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_b8->delete_b8($tabel_b8_field1);

		$notif = $this->handle_3b($aksi, 'tabel_b8_field1', $tabel_b8_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_b8_alias_v4_title'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8'])->result(),
			'tbl_b8' => $this->tl_b8->get_all_b8()->result(),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view($this->v4['tabel_b8'], $data);
	}

	// Cetak satu data
}
