<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel25 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		redirect(site_url('no_page'));
	}
	
	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel25_alias'],
			'konten' => $this->v3['tabel25'],
			'dekor' => $this->tl12->dekor('tabel25')->result(),
			'tbl25' => $this->tl25->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel25_field1'] => '',
			$this->aliases['tabel25_field2'] => $this->v_post['tabel25_field2'],
			$this->aliases['tabel25_field6'] => htmlspecialchars($this->v_post['tabel25_field6']),
		);

		$simpan = $this->tl24->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel25_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel25_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel25/admin'));
	}


	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel25_field1 = $this->v_post['tabel25_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel25_field2'] => $this->v_post['tabel25_field2'],
			$this->aliases['tabel25_field6'] => $this->v_post['tabel25_field6'],
		);

		$update = $this->tl24->update($data, $tabel25_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel25_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel25_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel25/admin'));
	}


	public function update_tabel25_field3()
	{
		$this->declarew();

		$table = $this->tl25->ambil_tabel25_field1($this->v_post['tabel25_field1'])->result();
		$tabel25_field3 = $table[0]->favicon;
		unlink($this->v_upload_path['tabel25'] . $tabel25_field3);

		$config['upload_path'] = $this->v_upload_path['tabel25'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel25_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel25_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel25_field3_input'])) {
			$gambar = $this->v_post_old['tabel25_field3'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel25_field1 = $this->v_post['tabel25_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel25_field3'] => $this->aliases['tabel25_field3'] . "." . $file_extension,
		);

		$update = $this->tl25->update($data, $tabel25_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel25_field3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel25_field3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel25_field4()
	{
		$this->declarew();

		$table = $this->tl25->ambil_tabel25_field1($this->v_post['tabel25_field1'])->result();
		$tabel25_field4 = $table[0]->logo;
		unlink($this->v_upload_path['tabel25'] . $tabel25_field4);

		$config['upload_path'] = $this->v_upload_path['tabel25'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel25_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel25_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel25_field4_input'])) {
			$gambar = $this->v_post_old['tabel25_field4'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel25_field1 = $this->v_post['tabel25_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel25_field4'] => $this->aliases['tabel25_field4'] . "." . $file_extension,
		);

		$update = $this->tl25->update($data, $tabel25_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel25_field4_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel25_field4_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel25/admin'));
	}

	public function update_tabel25_field5()
	{
		$this->declarew();

		$table = $this->tl25->ambil_tabel25_field1($this->v_post['tabel25_field1'])->result();
		$tabel25_field5 = $table[0]->foto;
		unlink($this->v_upload_path['tabel25'] . $tabel25_field5);

		$config['upload_path'] = $this->v_upload_path['tabel25'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->aliases['tabel25_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel25_field5_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel25_field5_input'])) {
			$gambar = $this->v_post_old['tabel25_field5'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel25_field1 = $this->v_post['tabel25_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel25_field5'] => $this->aliases['tabel25_field5'] . "." . $file_extension,
		);

		$update = $this->tl25->update($data, $tabel25_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel25_field5_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel25_field5_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel25/admin'));
	}


	public function hapus($tabel25_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl24->hapus($tabel25_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel25_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel25_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel25/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel25_alias'],
			'dekor' => $this->tl12->dekor('tabel25')->result(),
			'tbl25' => $this->tl25->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel25'], $data);
	}

	// Cetak satu data
}
