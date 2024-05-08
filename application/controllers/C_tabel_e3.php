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
			'title' => $this->v3_title['tabel_e3_alias'],
			'konten' => $this->v3['tabel_e3'],
			'dekor' => $this->tl_b1->dekor('tabel_e3')->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_c1' => $this->tl_c1->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_e3_field1'] => '',
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);

		$simpan = $this->tl_e3->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel_e3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel_e3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_e3/admin'));
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

		$update = $this->tl_e3->update($data, $tabel_e3_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_e3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_e3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_e3/admin'));
	}

	public function hapus($tabel_e3_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl_e3->hapus($tabel_e3_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel_e3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel_e3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_e3/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_e3_alias'],
			'dekor' => $this->tl_b1->dekor('tabel_e3')->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel_e3'], $data);
	}

	// Cetak satu data

}
