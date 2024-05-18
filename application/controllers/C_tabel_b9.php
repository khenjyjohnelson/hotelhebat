<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b9 extends Omnitags
{
	// Halaman publik
	public function detail($tabel_b9_field1 = NULL)
	{
		$this->declarew();

		$tabel_b9_field2 = $this->session->userdata($this->aliases['tabel_c2_field1']);

		// menggunakan nama khusus sama dengan konfigurasi
		$notif = array(
			$this->aliases['tabel_b9_field6'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b9->update_satu($notif, $tabel_b9_field1, $tabel_b9_field2);

		if ($aksi) {
			$data1 = array(
				'title' => $this->v8_title['tabel_b9_alias'],
				'konten' => $this->v8['tabel_b9'],
				'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9'])->result(),
				'tbl_b9' => $this->tl_b9->get_b9_by_b9_field1($tabel_b9_field1)->result(),
			);

			$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

			$this->load->view('_layouts/template', $data);
		} else {
			redirect($_SERVER['HTTP_REFERER']);

		}
	}

	public function lihat($tabel_b9_field1 = NULL)
	{
		$this->declarew();

		$tabel_b9_field2 = $this->session->userdata($this->aliases['tabel_c2_field1']);

		// menggunakan nama khusus sama dengan konfigurasi
		$notif = array(
			$this->aliases['tabel_b9_field6'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b9->update_satu($notif, $tabel_b9_field1, $tabel_b9_field2);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();

		$tabel_b9_field2 = $this->session->userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => $this->v2_title['tabel_b9_alias'],
			'konten' => $this->v2['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9'])->result(),
			'tbl_b9' => $this->tl_b9->get_b9_with_b8_by_b9_field2($tabel_b9_field2)->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_b9_alias'],
			'konten' => $this->v3['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9'])->result(),
			'tbl_b9' => $this->tl_b9->get_all_b9()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_b9_field1'] => '',
			$this->aliases['tabel_b9_field2'] => $this->v_post['tabel_b9_field2'],
			$this->aliases['tabel_b9_field6'] => htmlspecialchars($this->v_post['tabel_b9_field6']),
		);

		$aksi = $this->tl_b9->insert_b9($data);

		$notif = $this->handle_1b($aksi, 'tabel_b9');

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update()
	{
		$this->declarew();

		$tabel_b9_field2 = $this->session->userdata($this->aliases['tabel_c2_field1']);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b9_field6'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b9->update_null($data, $tabel_b9_field2);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_b9_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_b9->delete_b9($tabel_b9_field1);

		$notif = $this->handle_3b($aksi, 'tabel_b9_field1', $tabel_b9_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_b9_alias'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9'])->result(),
			'tbl_b9' => $this->tl_b9->get_all_b9()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_b9'], $data);
	}

	// Cetak satu data
}
