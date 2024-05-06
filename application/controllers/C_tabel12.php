<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel12 extends Omnitags
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
			'title' => $this->v3_title['tabel12_alias'],
			'konten' => $this->v3['tabel12'],
			'dekor' => $this->tl12->dekor('tabel12')->result(),
			'tbl12' => $this->tl12->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel12'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel12_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel12_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel12_field3_input'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->views['flash2'], $this->flash_msg2['tabel12_field3_alias']);
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel12_field1'] => '',
			$this->aliases['tabel12_field2'] => $this->v_post['tabel12_field2'],
			$this->aliases['tabel12_field3'] => $this->v_post['tabel12_field2'] . "." . $file_extension,
			$this->aliases['tabel12_field4'] => $this->v_post['tabel12_field4'],
		);

		$simpan = $this->tl12->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel12'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel12_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel12_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel12_field3_input'])) {
			$gambar = $this->views['tabel12_field3_alt'];
		} else {

			$upload = $this->upload->data();
			$gambar = $this->v_post['tabel12_field2'] . "." . $file_extension;
		}

		$tabel12_field1 = $this->v_post['tabel12_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel12_field2'] => $this->v_post['tabel12_field2'],
			$this->aliases['tabel12_field3'] => $gambar,
			$this->aliases['tabel12_field4'] => $this->v_post['tabel12_field4'],
		);

		$update = $this->tl12->update($data, $tabel12_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel12_field1 = null)
	{
		$this->declarew();

		$tabel12 = $this->tl12->ambil_tabel12_field1($tabel12_field1)->result();
		$img = $tabel12[0]->img;

		unlink($this->v_upload_path['tabel12'] . $img);

		$hapus = $this->tl12->hapus($tabel12_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel12_alias'],
			'dekor' => $this->tl12->dekor('tabel12')->result(),
			'tbl12' => $this->tl12->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel12'], $data);
	}
}
