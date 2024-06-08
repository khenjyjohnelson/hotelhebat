<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e3 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e3_alias_v3_title'),
			'konten' => $this->v3['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3'])->result(),
			'tbl_e3' => $this->tl_e3->get_e3_with_e4()->result(),
			'tbl_c1' => $this->tl_c1->get_all_c1()->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_e3_field1'] => '',
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);

		$aksi = $this->tl_e3->insert_e3($data);

		$notif = $this->handle_1b($aksi, 'tabel_e3');

		redirect($_SERVER['HTTP_REFERER']); 
	}

	public function update()
	{
		$this->declarew();

		$tabel_e3_field1 = $this->v_post['tabel_e3_field1'];
		$data = array(
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
			$this->aliases['tabel_e3_field5'] => $this->v_post['tabel_e3_field5'],
		);

		$aksi = $this->tl_e3->update_e3($data, $tabel_e3_field1);

		$notif = $this->handle_2b($aksi, 'tabel_e3', $tabel_e3_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}

	public function delete($tabel_e3_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_e3->delete_e3($tabel_e3_field1);

		$notif = $this->handle_3b($aksi, 'tabel_e3_field1', $tabel_e3_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e3_alias_v4_title'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3'])->result(),
			'tbl_e3' => $this->tl_e3->get_all_e3()->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data($this->v4['tabel_e3'], $data);
	}

	// Cetak satu data

}
