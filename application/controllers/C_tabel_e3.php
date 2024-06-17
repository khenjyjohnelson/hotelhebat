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
		$this->page_session_4();

		$data1 = array(
			'title' => lang('tabel_e3_alias_v3_title'),
			'konten' => $this->v3['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_e3_with_e4(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();
		$this->session_4();

		validate_input(
			array(
				$this->v_post['tabel_e3_field2'],
				$this->v_post['tabel_e3_field4'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$data = array(
			$this->aliases['tabel_e3_field1'] => '',
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);

		$aksi = $this->tl_e3->insert_e3($data);

		$notif = $this->handle_4b($aksi, 'tabel_e3');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		$this->declarew();
		$this->session_4();

		$tabel_e3_field1 = $this->v_post['tabel_e3_field1'];

		$tabel = $this->tl_e3->get_e3_by_e3_field1($tabel_e3_field1)->result();
		$this->check_data($tabel);

		validate_input(
			array(
				$this->v_post['tabel_e3_field1'],
				$this->v_post['tabel_e3_field4'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e3_field1
		);

		$data = array(
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
			$this->aliases['tabel_e3_field5'] => $this->v_post['tabel_e3_field5'],
		);

		$aksi = $this->tl_e3->update_e3($data, $tabel_e3_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e3', $tabel_e3_field1);

		redirect($_SERVER['HTTP_REFERER']);


	}

	public function delete($tabel_e3_field1 = null)
	{
		$this->declarew();
		$this->session_4();

		$tabel = $this->tl_e3->get_e3_by_e3_field1($tabel_e3_field1)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_e3->delete_e3($tabel_e3_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e3', $tabel_e3_field1);

		redirect($_SERVER['HTTP_REFERER']);


	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_4();

		$data1 = array(
			'title' => lang('tabel_e3_alias_v4_title'),
			'konten' => $this->v4['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Cetak satu data

}
