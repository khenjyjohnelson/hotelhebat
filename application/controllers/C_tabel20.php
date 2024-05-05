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

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
        $tabel7_field1 = $tabel7[0]->id;

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel20_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel20'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel20')->result(),
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl20' => $this->tl20->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

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

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
        $tabel7_field1 = $tabel7[0]->id;

		$data1 = array(
			$this->v_part1 => $this->v4_title['tabel20_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl20->dekor('tabel20')->result(),
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl20' => $this->tl20->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->v4['tabel20'], $data);
	}

	// Cetak satu data
}
