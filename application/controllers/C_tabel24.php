<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel24 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		redirect(site_url('no_page'));
	}
	
	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel24_alias'],
			'konten' => $this->v3['tabel24'],
			'dekor' => $this->tl12->dekor('tabel24')->result(),
			'tbl24' => $this->tl24->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();
		// Check if the field contains "https://" at the beginning
		if (strpos($this->v_post['tabel24_field4'], 'https://') === 0) {
			// It contains "https://" at the beginning
			// Additional actions if needed
			$tabel24_field4 = $this->v_post['tabel24_field4'];
		} else {
			// It does not contain "https://" at the beginning
			// Additional actions if needed
			$tabel24_field4 = 'https://' . $this->v_post['tabel24_field4'];
		}

		$data = array(
			$this->aliases['tabel24_field1'] => '',
			$this->aliases['tabel24_field2'] => $this->v_post['tabel24_field2'],
			$this->aliases['tabel24_field3'] => $this->v_post['tabel24_field3'],
			$this->aliases['tabel24_field4'] => $tabel24_field4,
		);

		$simpan = $this->tl24->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel24/admin'));
	}


	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel24_field1 = $this->v_post['tabel24_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel24_field2'] => $this->v_post['tabel24_field2'],
			$this->aliases['tabel24_field3'] => $this->v_post['tabel24_field3'],
			$this->aliases['tabel24_field4'] => $this->v_post['tabel24_field4'],
		);

		$update = $this->tl24->update($data, $tabel24_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel24/admin'));
	}

	public function hapus($tabel24_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl24->hapus($tabel24_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel24/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel24_alias'],
			'dekor' => $this->tl12->dekor('tabel24')->result(),
			'tbl24' => $this->tl24->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel24'], $data);
	}

	// Cetak satu data
}
