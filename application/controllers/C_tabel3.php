<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel3 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v1_title['tabel3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v1['tabel3'],
			$this->v_part5 => $this->tl12->dekor('tabel3')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part6 => $this->tl25->tema($this->tabel7_field1)->result(),
			$this->v_part7 => $this->tl23->ambildata()->result(),
			$this->v_part8 => $this->tl24->ambil_tabel7_field1()->result(),
			$this->v_part9 => $this->tl7->ambil_tabel7_field1($this->tabel7_field1)->result(),
			'tbl3' => $this->tl3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel3'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel3')->result(),
			$this->v_part6 => $this->tl25->tema($this->tabel7_field1)->result(),
			$this->v_part7 => $this->tl23->ambildata()->result(),
			$this->v_part8 => $this->tl24->ambil_tabel7_field1()->result(),
			$this->v_part9 => $this->tl7->ambil_tabel7_field1($this->tabel7_field1)->result(),
			'tbl3' => $this->tl3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel3_field1'] => '',
			$this->aliases['tabel3_field2'] => $this->v_post['tabel3_field2'],
			$this->aliases['tabel3_field3'] => $this->v_post['tabel3_field3'],
		);

		// $query = 'INSERT INTO tabel3 VALUES('.$data.')';

		$simpan = $this->tl3->simpan($data);
		// $simpan = $this->tl3->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_1['tabel3_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_2['tabel3_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel3/admin'));
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel3_field1 = $this->v_post['tabel3_field1'];
		$data = array(
			$this->aliases['tabel3_field2'] => $this->v_post['tabel3_field2'],
			$this->aliases['tabel3_field3'] => $this->v_post['tabel3_field3'],
		);

		$update = $this->tl3->update($data, $tabel3_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_3['tabel3_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_4['tabel3_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel3/admin'));
	}

	public function hapus($tabel3_field1 = null)
	{
		$this->declarew();

		$tabel3 = $this->tl3->ambil_tabel3_field1($tabel3_field1)->result();
		$tabel3_field3 = $tabel3[0]->img;

		unlink($this->v_upload_path['tabel3_field3'] . $tabel3_field3);
		$hapus = $this->tl3->hapus($tabel3_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_5['tabel3_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_6['tabel3_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel3/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v4_title['tabel3_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel3')->result(),
			$this->v_part6 => $this->tl25->tema($this->tabel7_field1)->result(),
			$this->v_part7 => $this->tl23->ambildata()->result(),
			$this->v_part8 => $this->tl24->ambil_tabel7_field1()->result(),
			$this->v_part9 => $this->tl7->ambil_tabel7_field1($this->tabel7_field1)->result(),
			'tbl3' => $this->tl3->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->v4['tabel3'], $data);
	}

	// Cetak satu data


}
