<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_f4 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_f4_alias_v3_title'),
			'konten' => $this->v3['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4'])->result(),
			'tbl_f4' => $this->tl_f4->get_all_f4()->result(),
			'tbl_c1' => $this->tl_c1->get_all_c1()->result(),
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
				$this->v_input['tabel_f4_field2_input'],
				$this->v_input['tabel_f4_field3_input'],
				$this->v_input['tabel_f4_field4_input'],
				$this->v_input['tabel_f4_field5_input'],
				$this->v_input['tabel_f4_field6_input'],
			),
			$this->views['flash1']
		);

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f4_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel_f4_field2 = $this->v_post['tabel_f4_field2'];
		$data = array(
			$this->aliases['tabel_f4_field1'] => '',
			$this->aliases['tabel_f4_field2'] => $tabel_f4_field2,
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
			$this->aliases['tabel_f4_field4'] => $this->v_post['tabel_f4_field4'],
			$this->aliases['tabel_f4_field5'] => $this->v_post['tabel_f4_field5'],
			$this->aliases['tabel_f4_field6'] => $this->v_post['tabel_f4_field6'],
			$this->aliases['tabel_f4_field7'] => $tabel_f4_field7,
		);

		$data2 = array(
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);
		$update_status = $this->tl_e3->update_e3($data2, $tabel_f4_field2);

		$aksi = $this->tl_f4->insert_f4($data);

		$notif = $this->handle_4b($aksi, 'tabel_f4');

		redirect($_SERVER['HTTP_REFERER']); 
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_4();

		validate_input(
			array(
				$this->v_input['tabel_f4_field1_input'],
				$this->v_input['tabel_f4_field2_input'],
				$this->v_input['tabel_f4_field3_input'],
			),
			$this->views['flash1']
		);

		$tabel_f4_field1 = $this->v_post['tabel_f4_field1'];
		$data = array(
			$this->aliases['tabel_f4_field2'] => $this->v_post['tabel_f4_field2'],
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
		);

		$aksi = $this->tl_f4->update_f4($data, $tabel_f4_field1);

		$notif = $this->handle_4c($aksi, 'tabel_f4', $tabel_f4_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}

	public function delete($tabel_f4_field1 = null)
	{
		$this->declarew();
		$this->session_4();

		$aksi = $this->tl_f4->delete_f4($tabel_f4_field1);

		$notif = $this->handle_4e($aksi, 'tabel_f4_field1', $tabel_f4_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_f4_alias_v4_title'),
			'konten' => $this->v4['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4'])->result(),
			'tbl_f4' => $this->tl_f4->get_all_f4()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}
}
