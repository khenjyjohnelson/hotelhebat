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
			'title' => $this->v6_title['tabel_a1_alias'],
			'konten' => $this->v6['tabel_a1'],
			'dekor' => $this->tl_b1->dekor('tabel_a1')->result(),
			'tbl_b2' => $this->tl_b2->ambildata()->result(),
			'tbl_b7' => $this->tl_b7->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_a1_alias'],
			'konten' => $this->v3['tabel_a1'],
			'dekor' => $this->tl_b1->dekor('tabel_a1')->result(),
			'tbl_a1_alt' => $this->tl_a1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function update()
	{
		$this->declarew();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];
		$data = array(
			$this->aliases['tabel_a1_field2'] => $this->v_post['tabel_a1_field2'],
			$this->aliases['tabel_a1_field3'] => $this->v_post['tabel_a1_field3'],
			$this->aliases['tabel_a1_field4'] => $this->v_post['tabel_a1_field4'],
			$this->aliases['tabel_a1_field5'] => $this->v_post['tabel_a1_field5'],
		);

		$update = $this->tl_a1->update($data, $tabel_a1_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_a1_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_a1_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_id_tema()
	{
		$this->declarew();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];
		$data = array(
			$this->aliases['tabel_a1_field8'] => $this->v_post['tabel_a1_field8'],
		);

		$update = $this->tl_a1->update($data, $tabel_a1_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel_a1_field8'], $this->flash1_msg_3['tabel_a1_field8_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_a1_field8']);
		} else {
			$this->session->set_flashdata($this->flash['tabel_a1_field8'], $this->flash1_msg_4['tabel_a1_field8_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_a1_field8']);
		}

		redirect(site_url('c_tabel_a1/profil'));
	}

	public function update_id_event()
	{
		$this->declarew();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];
		$data = array(
			$this->aliases['tabel_a1_field6'] => $this->v_post['tabel_a1_field6'],
		);

		$update = $this->tl_a1->update($data, $tabel_a1_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel_a1_field6'], $this->flash1_msg_3['tabel_a1_field6_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_a1_field6']);
		} else {
			$this->session->set_flashdata($this->flash['tabel_a1_field6'], $this->flash1_msg_4['tabel_a1_field6_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_a1_field6']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_id_lisensi()
	{
		$this->declarew();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];
		$data = array(
			$this->aliases['tabel_a1_field7'] => $this->v_post['tabel_a1_field7'],
		);

		$update = $this->tl_a1->update($data, $tabel_a1_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel_a1_field7'], $this->flash1_msg_3['tabel_a1_field7_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_a1_field7']);
		} else {
			$this->session->set_flashdata($this->flash['tabel_a1_field7'], $this->flash1_msg_4['tabel_a1_field7_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_a1_field7']);
		}
		redirect(site_url($this->aliases['tabel_a1'] . '/profil'));
	}
}
