<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel24 extends Omnitags
{
	// Halaman publik

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
        $tabel7_field1 = $tabel7[0]->id;

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel24_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel24'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel24')->result(),
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata()->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

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
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_1['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_2['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
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
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_3['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_4['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel24/admin'));
	}

	public function hapus($tabel24_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl24->hapus($tabel24_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_5['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_6['tabel24_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel24/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
        $tabel7_field1 = $tabel7[0]->id;

		$data1 = array(
			$this->v_part1 => $this->v4_title['tabel24_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl24->dekor('tabel24')->result(),
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata()->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->v4['tabel24'], $data);
	}

	// Cetak satu data
}
