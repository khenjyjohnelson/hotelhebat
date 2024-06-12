<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e2 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e2_alias_v1_title'),
			'konten' => $this->v1['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2'])->result(),
			'tbl_e2' => $this->tl_e2->get_all_e2()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e2_alias_v3_title'),
			'konten' => $this->v3['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2'])->result(),
			'tbl_e2' => $this->tl_e2->get_all_e2()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_input(
			array(
				$this->v_post['tabel_e2_field2_input'],
				$this->v_post['tabel_e2_field3_input'],
			),
			$this->views['flash2']
		);

		$data = array(
			$this->aliases['tabel_e2_field1'] => '',
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
		);

		// $query = 'INSERT INTO tabel_e2 VALUES('.$data.')';

		$aksi = $this->tl_e2->insert_e2($data);
		// $aksi = $this->tl_e2->insert_e2($query);

		$notif = $this->handle_4b($aksi, 'tabel_e2');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$this->session_3();

		validate_input(
			array(
				$this->v_post['tabel_e2_field1_input'],
				$this->v_post['tabel_e2_field2_input'],
				$this->v_post['tabel_e2_field3_input'],
			),
			$this->views['flash3']
		);

		$tabel_e2_field1 = $this->v_post['tabel_e2_field1'];
		$data = array(
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
		);

		$aksi = $this->tl_e2->update_e2($data, $tabel_e2_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e2', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_e2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e2 = $this->tl_e2->get_e2_by_e2_field1($tabel_e2_field1)->result();
		$tabel_e2_field3 = $tabel_e2[0]->img;

		unlink($this->v_upload_path['tabel_e2'] . $tabel_e2_field3);
		$aksi = $this->tl_e2->delete_e2($tabel_e2_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e2_field1', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e2_alias_v4_title'),
			'konten' => $this->v4['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2'])->result(),
			'tbl_e2' => $this->tl_e2->get_all_e2()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Cetak satu data


}
