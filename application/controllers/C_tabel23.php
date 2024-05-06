<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel23 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v1_title['tabel23_alias'],
			'konten' => $this->v1['tabel23'],
			'dekor' => $this->tl12->dekor('tabel23')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel23_alias'],
			'konten' => $this->v3['tabel23'],
			'dekor' => $this->tl12->dekor('tabel23')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel23'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel23_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->v_input['tabel23_field4_input'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->views['flash2'], $this->flash_msg2['tabel23_field4_alias']);
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel23_field1'] => '',
			$this->aliases['tabel23_field2'] => $this->v_post['tabel23_field2'],
			$this->aliases['tabel23_field3'] => $this->v_post['tabel23_field3'],
			$this->aliases['tabel23_field4'] => $gambar,
			$this->aliases['tabel23_field5'] => $this->v_post['tabel23_field5'],
		);

		$simpan = $this->tl23->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel23_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel23_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel23/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel23'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel23_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->v_input['tabel23_field4_input'])) {
			$gambar = $this->v_post_old['tabel23_field4'];
		} else {

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];

		}

		$tabel23_field1 = $this->v_post['tabel23_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel23_field2'] => $this->v_post['tabel23_field2'],
			$this->aliases['tabel23_field3'] => $this->v_post['tabel23_field3'],
			$this->aliases['tabel23_field4'] => $gambar,
			$this->aliases['tabel23_field5'] => $this->v_post['tabel23_field5'],
		);

		$update = $this->tl23->update($data, $tabel23_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel23_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel23_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel23/admin'));
	}

	public function hapus($tabel23_field1 = null)
	{
		$this->declarew();

		$tabel23 = $this->tl23->ambil_tabel23_field1($tabel23_field1)->result();
		$img = $tabel23[0]->img;

		unlink($this->v_upload_path['tabel23'] . $img);

		$hapus = $this->tl23->hapus($tabel23_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel23_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel23_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel23/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel23_alias'],
			'dekor' => $this->tl12->dekor('tabel23')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel23'], $data);
	}

	// Cetak satu data
}
