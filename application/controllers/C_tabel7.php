<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel7 extends Omnitags
{
	// Halaman detail
	public function detail()
	{
		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v6_title['tabel7_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v6['tabel7'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel7')->result(),
			$this->v_part6 => $this->tl25->tema($this->tabel7_field1)->result(),
			$this->v_part7 => $this->tl23->ambildata()->result(),
			$this->v_part8 => $this->tl24->ambil_tabel7_field1()->result(),
			$this->v_part9 => $this->tl7->ambil_tabel7_field1($this->tabel7_field1)->result(),
			'tbl7_alt' => $this->tl7->ambildata()->result(),
			'tbl13' => $this->tl13->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel7_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel7'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel7')->result(),
			$this->v_part6 => $this->tl25->tema($this->tabel7_field1)->result(),
			'tbl24' => $this->tl24->ambil_tabel7_field1($this->tabel7_field1)->result(),
			'tbl7_alt' => $this->tl7->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel7_field2'] => $this->v_post['tabel7_field2'],
			$this->aliases['tabel7_field3'] => $this->v_post['tabel7_field3'],
			$this->aliases['tabel7_field4'] => $this->v_post['tabel7_field4'],
			$this->aliases['tabel7_field5'] => $this->v_post['tabel7_field5'],
			$this->aliases['tabel7_field6'] => $this->v_post['tabel7_field6'],
			$this->aliases['tabel7_field7'] => $this->v_post['tabel7_field7'],
			$this->aliases['tabel7_field8'] => $this->v_post['tabel7_field8'],
			$this->aliases['tabel7_field9'] => $this->v_post['tabel7_field9'],
			$this->aliases['tabel7_field10'] => $this->v_post['tabel7_field10'],
			$this->aliases['tabel7_field11'] => $this->v_post['tabel7_field11'],
			$this->aliases['tabel7_field12'] => $this->v_post['tabel7_field12'],
			$this->aliases['tabel7_field13'] => $this->v_post['tabel7_field13'],
		);

		$simpan = $this->tl7->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_1['tabel7_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_2['tabel7_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel7/admin'));
	}

	public function update()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field2'] => $this->v_post['tabel7_field2'],
			$this->aliases['tabel7_field6'] => $this->v_post['tabel7_field6'],
			$this->aliases['tabel7_field7'] => $this->v_post['tabel7_field7'],
			$this->aliases['tabel7_field8'] => $this->v_post['tabel7_field8'],
			$this->aliases['tabel7_field9'] => htmlspecialchars($this->v_post['tabel7_field9']),
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_3['tabel7_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_4['tabel7_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel7_field13()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field13'] => $this->v_post['tabel7_field13'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field13'], $this->flash1_msg_3['tabel7_field13']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field13']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field13'], $this->flash1_msg_4['tabel7_field13']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field13']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel7_field10()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field10'] => $this->v_post['tabel7_field10'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field10'], $this->flash1_msg_3['tabel7_field10']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field10']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field10'], $this->flash1_msg_4['tabel7_field10']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field10']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel7_field11()
	{
		$this->declarew();

		$tabel7_field1 = $this->v_post['tabel7_field1'];
		$data = array(
			$this->aliases['tabel7_field11'] => $this->v_post['tabel7_field11'],
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field11'], $this->flash1_msg_3['tabel7_field11_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field11']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field11'], $this->flash1_msg_4['tabel7_field11_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field11']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
