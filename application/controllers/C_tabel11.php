<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel11 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel11_alias'],
			'konten' => $this->v3['tabel11'],
			'dekor' => $this->tl12->dekor('tabel11')->result(),
			'tbl11' => $this->tl11->ambildata()->result(),
			'tbl4' => $this->tl4->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel11_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel11_field2 = $this->v_post['tabel11_field2'];
		$data = array(
			$this->aliases['tabel11_field1'] => '',
			$this->aliases['tabel11_field2'] => $tabel11_field2,
			$this->aliases['tabel11_field3'] => $this->v_post['tabel11_field3'],
			$this->aliases['tabel11_field4'] => $this->v_post['tabel11_field4'],
			$this->aliases['tabel11_field5'] => $this->v_post['tabel11_field5'],
			$this->aliases['tabel11_field6'] => $this->v_post['tabel11_field6'],
			$this->aliases['tabel11_field7'] => $tabel11_field7,
		);

		$status = array(
			$this->aliases['tabel5_field4'] => $this->v_post['tabel5_field4'],
		);
		$update_status = $this->tl5->update($status, $tabel11_field2);

		$simpan = $this->tl11->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel11_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel11_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel5/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel11_field1 = $this->v_post['tabel11_field1'];
		$data = array(
			$this->aliases['tabel11_field2'] => $this->v_post['tabel11_field2'],
			$this->aliases['tabel11_field3'] => $this->v_post['tabel11_field3'],
		);

		$update = $this->tl11->update($data, $tabel11_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel11_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel11_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}
		-
			redirect(site_url('c_tabel11/admin'));
	}

	public function hapus($tabel11_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl11->hapus($tabel11_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel11_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel11_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel11/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel11_alias'],
			'dekor' => $this->tl12->dekor('tabel11')->result(),
			'tbl11' => $this->tl11->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel11'], $data);
	}
}
