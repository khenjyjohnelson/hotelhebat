<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_a1 extends Omnitags
{
	// Halaman publik


	// Halaman detail
	public function profil()
	{
		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_a1_alias_v6_title'),
			'konten' => $this->v6['tabel_a1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_a1'])->result(),
			'tbl_b7' => $this->tl_b7->get_all_b7()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	public function update()
	{
		$this->declarew();
		$this->session_3();
		
		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];

		validate_input(
			array(
				$this->v_post['tabel_a1_field1'],
				$this->v_post['tabel_a1_field2'],
				$this->v_post['tabel_a1_field3'],
				$this->v_post['tabel_a1_field4'],
				$this->v_post['tabel_a1_field5'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_a1_field1
		);
		
		$data = array(
			$this->aliases['tabel_a1_field2'] => $this->v_post['tabel_a1_field2'],
			$this->aliases['tabel_a1_field3'] => $this->v_post['tabel_a1_field3'],
			$this->aliases['tabel_a1_field4'] => $this->v_post['tabel_a1_field4'],
			$this->aliases['tabel_a1_field5'] => $this->v_post['tabel_a1_field5'],
		);

		$aksi = $this->tl_a1->update_a1($data, $tabel_a1_field1);

		$notif = $this->handle_4c($aksi, 'tabel_a1', $tabel_a1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_id_tema()
	{
		$this->declarew();
		$this->session_3();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];

		validate_input(
			array(
				$this->v_post['tabel_a1_field1'],
				$this->v_post['tabel_a1_field6'],
			),
			$this->views['flash3'],
			'tema' . $tabel_a1_field1
		);

		$data = array(
			$this->aliases['tabel_a1_field6'] => $this->v_post['tabel_a1_field6'],
		);

		$aksi = $this->tl_a1->update_a1($data, $tabel_a1_field1);

		$notif = $this->handle_4d($aksi, 'tabel_b7', $tabel_a1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

}
