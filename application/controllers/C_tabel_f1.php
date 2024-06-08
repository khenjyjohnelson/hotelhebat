<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';


class C_tabel_f1 extends Omnitags
{
	// Halaman publik
	
	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();
		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$param5 = userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => lang('tabel_f1_alias_v2_title'),
			'konten' => $this->v2['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->get_c2_with_e4($param5)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('_layouts/template', $data);
	}


	public function filter_c1()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$param5 = userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => lang('tabel_f1_alias_v2_title'),
			'konten' => $this->v2['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->filter_c1_with_e4($param1, $param2, $param3, $param4, $param5)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('_layouts/template', $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$data1 = array(
			'title' => lang('tabel_f1_alias_v3_title'),
			'konten' => $this->v3['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->get_f1_with_e4()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('_layouts/template', $data);
	}

	// public function delete($tabel_f1_field1 = null)
	// {
	// 	$this->declarew();

	// 	$aksi = $this->tl_f1->delete_f1($tabel_f1_field1);
	// 	redirect($_SERVER['HTTP_REFERER']); 
	// redirect(site_url($this->language_code . '/' . $this->aliases['tabel_f1/admin'));
	// }

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_f1_alias_v4_title'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->get_f1_with_e4()->result(),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view($this->v4['tabel_f1'], $data);
	}

	public function filter()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$data1 = array(
			'title' => lang('tabel_f1_alias_v3_title'),
			'konten' => $this->v3['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->search_with_e4_between_dates($param1, $param2, $param3, $param4)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('_layouts/template', $data);
	}
}
