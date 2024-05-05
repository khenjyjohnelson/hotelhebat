<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';


class C_tabel2 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
		$tabel7_field1 = $tabel7[0]->id;
		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel2_field11'];
		$param2 = $this->v_filter2_get['tabel2_field11'];
		$param3 = $this->v_filter1_get['tabel2_field12'];
		$param4 = $this->v_filter2_get['tabel2_field12'];

		$param5 = $this->session->userdata($this->aliases['tabel9_field1']);

		$data1 = array(
			$this->v_part1 => $this->v2_title['tabel2_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v2['tabel2'],
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl2' => $this->tl2->ambil_tabel9_field1($param5)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel2_field11_filter1_value' => $param1,
			'tabel2_field11_filter2_value' => $param2,
			'tabel2_field12_filter1_value' => $param3,
			'tabel2_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function filter_tabel4()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
		$tabel7_field1 = $tabel7[0]->id;

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel2_field11'];
		$param2 = $this->v_filter2_get['tabel2_field11'];
		$param3 = $this->v_filter1_get['tabel2_field12'];
		$param4 = $this->v_filter2_get['tabel2_field12'];

		$param5 = $this->session->userdata($this->aliases['tabel9_field1']);

		$data1 = array(
			$this->v_part1 => $this->v2_title['tabel2_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v2['tabel2'],
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl2' => $this->tl2->filter_tabel4($param1, $param2, $param3, $param4, $param5)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel2_field11_filter1_value' => $param1,
			'tabel2_field11_filter2_value' => $param2,
			'tabel2_field12_filter1_value' => $param3,
			'tabel2_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
		$tabel7_field1 = $tabel7[0]->id;

		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel2_field11'];
		$param2 = $this->v_filter2_get['tabel2_field11'];
		$param3 = $this->v_filter1_get['tabel2_field12'];
		$param4 = $this->v_filter2_get['tabel2_field12'];

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel2_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel2'],
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl2' => $this->tl2->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel2_field11_filter1_value' => $param1,
			'tabel2_field11_filter2_value' => $param2,
			'tabel2_field12_filter1_value' => $param3,
			'tabel2_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// public function hapus($tabel2_field1 = null)
	// {
	// 	$this->declarew();

	// 	$hapus = $this->tl2->hapus($tabel2_field1);
	// 	redirect(site_url('c_tabel2/admin'));
	// }

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
		$tabel7_field1 = $tabel7[0]->id;

		$data1 = array(
			$this->v_part1 => $this->v4_title['tabel2_alias'],
			$this->v_part2 => $this->head,
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl2' => $this->tl2->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->v4['tabel2'], $data);
	}

	public function filter()
	{
		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
		$tabel7_field1 = $tabel7[0]->id;

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel2_field11'];
		$param2 = $this->v_filter2_get['tabel2_field11'];
		$param3 = $this->v_filter1_get['tabel2_field12'];
		$param4 = $this->v_filter2_get['tabel2_field12'];

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel2_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel2'],
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl2' => $this->tl2->filter($param1, $param2, $param3, $param4)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel2_field11_filter1_value' => $param1,
			'tabel2_field11_filter2_value' => $param2,
			'tabel2_field12_filter1_value' => $param3,
			'tabel2_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}
}
