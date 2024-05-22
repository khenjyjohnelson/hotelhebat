<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_d3 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => 'tabel_d3_alias_v3',
			'konten' => $this->v3['tabel_d3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_d3'])->result(),
			'tbl_d3' => $this->tl_d3->get_all_d3()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_d3_field1'] => '',
			$this->aliases['tabel_d3_field2'] => $this->session->userdata($this->aliases['tabel_c2_field1']),
			$this->aliases['tabel_d3_field3'] => date("Y-m-d\TH:i:s"),
			$this->aliases['tabel_d3_field4'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_d3->insert_d3($data);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => 'tabel_d3_alias_v4',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_d3'])->result(),
			'tbl_d3' => $this->tl_d3->get_all_d3()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_d3'], $data);
	}

	// Cetak satu data
}
