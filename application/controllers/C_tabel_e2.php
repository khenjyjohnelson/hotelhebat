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
			'title' => $this->v1_title['tabel_e2_alias'],
			'konten' => $this->v1['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2'])->result(),
			'tbl_e2' => $this->tl_e2->get_all_e2()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_e2_alias'],
			'konten' => $this->v3['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2'])->result(),
			'tbl_e2' => $this->tl_e2->get_all_e2()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_e2_field1'] => '',
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
		);

		// $query = 'INSERT INTO tabel_e2 VALUES('.$data.')';

		$aksi = $this->tl_e2->insert_e2($data);
		// $aksi = $this->tl_e2->insert_e2($query);

		$notif = $this->handle_1b($aksi, 'tabel_e2');

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

		$tabel_e2_field1 = $this->v_post['tabel_e2_field1'];
		$data = array(
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
		);

		$aksi = $this->tl_e2->update_e2($data, $tabel_e2_field1);

		$notif = $this->handle_2b($aksi, 'tabel_e2', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_e2_field1 = null)
	{
		$this->declarew();

		$tabel_e2 = $this->tl_e2->get_e2_by_e2_field1($tabel_e2_field1)->result();
		$tabel_e2_field3 = $tabel_e2[0]->img;

		unlink($this->v_upload_path['tabel_e2'] . $tabel_e2_field3);
		$aksi = $this->tl_e2->delete_e2($tabel_e2_field1);

		$notif = $this->handle_3b($aksi, 'tabel_e2_field1', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_e2_alias'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2'])->result(),
			'tbl_e2' => $this->tl_e2->get_all_e2()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_e2'], $data);
	}

	// Cetak satu data


}
