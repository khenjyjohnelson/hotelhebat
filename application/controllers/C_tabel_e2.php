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
			'dekor' => $this->tl_b1->dekor('tabel_e2')->result(),
			'tbl_e2' => $this->tl_e2->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_e2_alias'],
			'konten' => $this->v3['tabel_e2'],
			'dekor' => $this->tl_b1->dekor('tabel_e2')->result(),
			'tbl_e2' => $this->tl_e2->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
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

		$simpan = $this->tl_e2->simpan($data);
		// $simpan = $this->tl_e2->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel_e2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel_e2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_e2/admin'));
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

		$aksi = $this->tl_e2->update($data, $tabel_e2_field1);

		if ($aksi) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_e2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_e2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_e2/admin'));
	}

	public function hapus($tabel_e2_field1 = null)
	{
		$this->declarew();

		$tabel_e2 = $this->tl_e2->ambil_tabel_e2_field1($tabel_e2_field1)->result();
		$tabel_e2_field3 = $tabel_e2[0]->img;

		unlink($this->v_upload_path['tabel_e2_field3'] . $tabel_e2_field3);
		$aksi = $this->tl_e2->hapus($tabel_e2_field1);

		if ($aksi) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel_e2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel_e2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_e2/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_e2_alias'],
			'dekor' => $this->tl_b1->dekor('tabel_e2')->result(),
			'tbl_e2' => $this->tl_e2->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_e2'], $data);
	}

	// Cetak satu data


}
