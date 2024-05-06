<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel20 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel20_alias'],
			'konten' => $this->v3['tabel20'],
			'dekor' => $this->tl12->dekor('tabel20')->result(),
			'tbl20' => $this->tl20->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel20_field1'] => '',
			$this->aliases['tabel20_field2'] => $this->session->userdata($this->aliases['tabel9_field1']),
			$this->aliases['tabel20_field3'] => date("Y-m-d\TH:i:s"),
			$this->aliases['tabel20_field4'] => date("Y-m-d\TH:i:s"),
		);

		$simpan = $this->tl20->simpan($data);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel20_alias'],
			'dekor' => $this->tl12->dekor('tabel20')->result(),
			'tbl20' => $this->tl20->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel20'], $data);
	}

	// Cetak satu data
}
