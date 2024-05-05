<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel7 extends Omnitags
{
	// Halaman admin
	public function admin()
	{
		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		$this->declarew();

		$tabel7 = $this->tl7->ambil_tabel7_field12($this->aliases['tabel7_field12_value1'])->result();
        $tabel7_field1 = $tabel7[0]->id;

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel7_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel7'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel7')->result(),
			'tbl23' => $this->tl23->ambildata()->result(),
			'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl13' => $this->tl13->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
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

		redirect(site_url('c_tabel7/admin'));
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

		redirect(site_url('c_tabel7/admin'));
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

	public function update_tabel7_field3()
	{
		$this->declarew();

		$table = $this->tl7->ambil_tabel7_field1($this->v_post['tabel7_field1'])->result();
		$tabel7_field3 = $table[0]->favicon;
		unlink($this->v_upload_path['tabel7'] . $tabel7_field3);

		$config['upload_path'] = $this->v_upload_path['tabel7'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel7_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel7_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel7_field3_input'])) {
			$gambar = $this->v_post_old['tabel7_field3'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel7_field1 = $this->v_post['tabel7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel7_field3'] => $this->aliases['tabel7_field3'] . "." . $file_extension,
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field3'], $this->flash1_msg_3['tabel7_field3_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field3']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field3'], $this->flash1_msg_4['tabel7_field3_alias']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field3']);
			redirect($_SERVER['HTTP_REFERER']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel7_field4()
	{
		$this->declarew();

		$table = $this->tl7->ambil_tabel7_field1($this->v_post['tabel7_field1'])->result();
		$tabel7_field4 = $table[0]->logo;
		unlink($this->v_upload_path['tabel7'] . $tabel7_field4);

		$config['upload_path'] = $this->v_upload_path['tabel7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel7_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel7_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel7_field4_input'])) {
			$gambar = $this->v_post_old['tabel7_field4'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel7_field1 = $this->v_post['tabel7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel7_field4'] => $this->aliases['tabel7_field4'] . "." . $file_extension,
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field4'], $this->flash1_msg_3['tabel7_field4']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field4']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field4'], $this->flash1_msg_4['tabel7_field4']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field4']);
		}

		redirect(site_url('c_tabel7/admin'));
	}

	public function update_tabel7_field5()
	{
		$this->declarew();

		$table = $this->tl7->ambil_tabel7_field1($this->v_post['tabel7_field1'])->result();
		$tabel7_field5 = $table[0]->foto;
		unlink($this->v_upload_path['tabel7'] . $tabel7_field5);

		$config['upload_path'] = $this->v_upload_path['tabel7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel7_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel7_field5_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel7_field5_input'])) {
			$gambar = $this->v_post_old['tabel7_field5'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel7_field1 = $this->v_post['tabel7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel7_field5'] => $this->aliases['tabel7_field5'] . "." . $file_extension,
		);

		$update = $this->tl7->update($data, $tabel7_field1);

		if ($update) {
			$this->session->set_flashdata($this->flash['tabel7_field5'], $this->flash1_msg_3['tabel7_field5']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field5']);
		} else {
			$this->session->set_flashdata($this->flash['tabel7_field5'], $this->flash1_msg_4['tabel7_field5']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel7_field5']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel7/admin'));
	}
}
