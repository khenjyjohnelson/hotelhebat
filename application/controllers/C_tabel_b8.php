<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b8 extends Omnitags
{
	// Halaman publik

	
	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_b8_alias'],
			'konten' => $this->v3['tabel_b8'],
			'dekor' => $this->tl_b1->dekor('tabel_b8')->result(),
			'tbl_b8' => $this->tl_b8->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_b8_field1'] => '',
			$this->aliases['tabel_b8_field2'] => $this->v_post['tabel_b8_field2'],
			$this->aliases['tabel_b8_field6'] => htmlspecialchars($this->v_post['tabel_b8_field6']),
		);

		$simpan = $this->tl_b8->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_b8/admin'));
	}


	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel_b8_field1 = $this->v_post['tabel_b8_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field2'] => $this->v_post['tabel_b8_field2'],
			$this->aliases['tabel_b8_field6'] => $this->v_post['tabel_b8_field6'],
		);

		$update = $this->tl_b8->update($data, $tabel_b8_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel_b8/admin'));
	}


	public function update_favicon()
	{
		$this->declarew();

		$param = $this->v_post['tabel_b8_field2'] . "_";	

		$table = $this->tl_b8->ambil_tabel_b8_field1($this->v_post['tabel_b8_field1'])->result();
		$tabel_b8_field3 = $table[0]->favicon;
		unlink($this->v_upload_path['tabel_b8'] . $tabel_b8_field3);

		$config['upload_path'] = $this->v_upload_path['tabel_b8'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b8_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b8_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b8_field3_input'])) {
			$gambar = $this->v_post_old['tabel_b8_field3'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b8_field1 = $this->v_post['tabel_b8_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field3'] => $param . $this->aliases['tabel_b8_field3'] . "." . $file_extension,
		);

		$update = $this->tl_b8->update($data, $tabel_b8_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_b8_field3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_b8_field3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_logo()
	{
		$this->declarew();

		$param = $this->v_post['tabel_b8_field2'] . "_";	

		$table = $this->tl_b8->ambil_tabel_b8_field1($this->v_post['tabel_b8_field1'])->result();
		$tabel_b8_field4 = $table[0]->logo;
		unlink($this->v_upload_path['tabel_b8'] . $tabel_b8_field4);

		$config['upload_path'] = $this->v_upload_path['tabel_b8'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b8_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b8_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b8_field4_input'])) {
			$gambar = $this->v_post_old['tabel_b8_field4'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b8_field1 = $this->v_post['tabel_b8_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field4'] => $param . $this->aliases['tabel_b8_field4'] . "." . $file_extension,
		);

		$update = $this->tl_b8->update($data, $tabel_b8_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_b8_field4_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_b8_field4_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_b8/admin'));
	}

	public function update_foto()
	{
		$this->declarew();

		$param = $this->v_post['tabel_b8_field2'] . "_";		

		$table = $this->tl_b8->ambil_tabel_b8_field1($this->v_post['tabel_b8_field1'])->result();
		$tabel_b8_field5 = $table[0]->foto;
		unlink($this->v_upload_path['tabel_b8'] . $tabel_b8_field5);

		$config['upload_path'] = $this->v_upload_path['tabel_b8'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b8_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b8_field5_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b8_field5_input'])) {
			$gambar = $this->v_post_old['tabel_b8_field5'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b8_field1 = $this->v_post['tabel_b8_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field5'] => $param . $this->aliases['tabel_b8_field5'] . "." . $file_extension,
		);

		$update = $this->tl_b8->update($data, $tabel_b8_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_b8_field5_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_b8_field5_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel_b8/admin'));
	}


	public function hapus($tabel_b8_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl_b8->hapus($tabel_b8_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel_b8_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_b8/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_b8_alias'],
			'dekor' => $this->tl_b1->dekor('tabel_b8')->result(),
			'tbl_b8' => $this->tl_b8->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_b8'], $data);
	}

	// Cetak satu data
}
