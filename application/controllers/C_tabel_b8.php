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
			'title' => $this->v3_title['tabel_b8_alias'],
			'konten' => $this->v3['tabel_b8'],
			'dekor' => $this->tl_b1->dekor('tabel_b8')->result(),
			'tbl_b8' => $this->tl_b8->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
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

		$simpan = $this->tl_b8->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_b8/admin'));
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

		$aksi = $this->tl_b8->update($data, $tabel_b8_field1);

		$msg1 = $this->flash1_msg_3['tabel_b8_alias'];
		$msg2 = $this->flash1_msg_4['tabel_b8_alias'];
		$type1 = $this->aliases['tabel_b8_field2_value4'];
		$type2 = $this->aliases['tabel_b8_field2_value6'];
		$extra = ' (' . $this->aliases['tabel_b8_field1_alias'] . ') = ' . $this->v_post['tabel_b8_field1'];

		$notif = $this->add_notif($aksi, $msg1, $type1, $msg2, $type2, $extra);

		redirect(site_url('c_tabel_b8/admin'));
	}


	public function hapus($tabel_b8_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_b8->hapus($tabel_b8_field1);

		$msg1 = $this->flash1_msg_5['tabel_b8_alias'];
		$msg2 = $this->flash1_msg_6['tabel_b8_alias'];
		$type1 = $this->aliases['tabel_b8_field2_value4'];
		$type2 = $this->aliases['tabel_b8_field2_value6'];
		$extra = ' (' . $this->aliases['tabel_b8_field1'] . ') = ' . $tabel_b8_field1;

		$notif = $this->add_notif($aksi, $msg1, $type1, $msg2, $type2, $extra);

		redirect(site_url('c_tabel_b8/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_b8_alias'],
			'dekor' => $this->tl_b1->dekor('tabel_b8')->result(),
			'tbl_b8' => $this->tl_b8->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_b8'], $data);
	}

	// Cetak satu data
}
