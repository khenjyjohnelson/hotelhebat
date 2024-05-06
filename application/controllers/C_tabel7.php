<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel7 extends Omnitags
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
			'title' => $this->v6_title['tabel7_alias'],
			'konten' => $this->v6['tabel7'],
			'dekor' => $this->tl12->dekor('tabel7')->result(),
			'tbl13' => $this->tl13->ambildata()->result(),
			'tbl25' => $this->tl25->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel7_alias'],
			'konten' => $this->v3['tabel7'],
			'dekor' => $this->tl12->dekor('tabel7')->result(),
			'tbl7_alt' => $this->tl7->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function update()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field2'] => $this->v_post['tabel7_field2'],
			$this->aliases['tabel7_field3'] => $this->v_post['tabel7_field3'],
			$this->aliases['tabel7_field4'] => $this->v_post['tabel7_field4'],
			$this->aliases['tabel7_field5'] => $this->v_post['tabel7_field5'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel7_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel7_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel7_field8()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field8'] => $this->v_post['tabel7_field8'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field8'], $this->flash1_msg_3['tabel7_field8_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field8']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field8'], $this->flash1_msg_4['tabel7_field8_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field8']);
		}

		redirect(site_url('c_tabel7/profil'));
	}

	public function update_tabel7_field6()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field6'] => $this->v_post['tabel7_field6'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field6'], $this->flash1_msg_3['tabel7_field6_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field6']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field6'], $this->flash1_msg_4['tabel7_field6_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field6']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel7_field7()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field7'] => $this->v_post['tabel7_field7'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field7'], $this->flash1_msg_3['tabel7_field7_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field7']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field7'], $this->flash1_msg_4['tabel7_field7_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field7']);
		}
		redirect(site_url($this->aliases['tabel7'] . '/profil'));
	}
}
