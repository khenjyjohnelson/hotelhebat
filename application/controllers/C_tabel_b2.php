<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b2 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();
		
		$param1 = $this->v_get['tabel_b2_field7'];

		$data1 = array(
			'title' => $this->v3_title['tabel_b2_alias'],
			'konten' => $this->v3['tabel_b2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b2'])->result(),
			'tbl_b2' => $this->tl_b2->ambildata()->result(),
			'tbl_b7' => $this->tl_b7->ambildata()->result(),
			'tabel_b2_field7_value' => $param1
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	public function filter()
	{
		$this->declarew();
		$this->load->helper('text');

		$param1 = $this->v_get['tabel_b2_field7'];

		$data1 = array(
			'title' => $this->v3_title['tabel_b2_alias'],
			'konten' => $this->v3['tabel_b2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b2'])->result(),
			'tbl_b2' => $this->tl_b2->filter($param1)->result(),
			'tbl_b7' => $this->tl_b7->ambildata()->result(),
			'tabel_b2_field7_value' => $param1
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel_b2'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel_b2_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->v_input['tabel_b2_field4_input'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_b2_field4_alias']);
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel_b2_field1'] => '',
			$this->aliases['tabel_b2_field2'] => $this->v_post['tabel_b2_field2'],
			$this->aliases['tabel_b2_field3'] => $this->v_post['tabel_b2_field3'],
			$this->aliases['tabel_b2_field4'] => $gambar,
			$this->aliases['tabel_b2_field7'] => $this->v_post['tabel_b2_field7'],
		);

		$aksi = $this->tl_b2->simpan($data);

		$notif = $this->handle_1b($aksi, 'tabel_b2');

		redirect(site_url($this->aliases['tabel_b2'] . '/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel_b2'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel_b2_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->v_input['tabel_b2_field4_input'])) {
			$gambar = $this->v_post_old['tabel_b2_field4'];
		} else {

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];

		}

		$tabel_b2_field1 = $this->v_post['tabel_b2_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b2_field2'] => $this->v_post['tabel_b2_field2'],
			$this->aliases['tabel_b2_field3'] => $this->v_post['tabel_b2_field3'],
			$this->aliases['tabel_b2_field4'] => $gambar,
			$this->aliases['tabel_b2_field5'] => $this->v_post['tabel_b2_field5'],
			$this->aliases['tabel_b2_field7'] => $this->v_post['tabel_b2_field7'],
		);

		$aksi = $this->tl_b2->update($data, $tabel_b2_field1);

		$notif = $this->handle_2b($aksi, 'tabel_b2', $tabel_b2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function aktifkan($tabel_b2_field1 = null) //update tidak diperlukan di sini
	{
		$this->declarew();

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b2_field6'] => $this->aliases['tabel_b2_field6_value1'],
		);

		$aksi = $this->tl_b2->update($data, $tabel_b2_field1);

		$notif = $this->handle_2b($aksi, 'tabel_b2_field6', $tabel_b2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function nonaktifkan($tabel_b2_field1 = null) //update tidak diperlukan di sini
	{
		$this->declarew();

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b2_field6'] => $this->aliases['tabel_b2_field6_value2'],
		);

		$aksi = $this->tl_b2->update($data, $tabel_b2_field1);

		$notif = $this->handle_2b($aksi, 'tabel_b2_field6', $tabel_b2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel_b2_field1 = null)
	{
		$this->declarew();

		$tabel_b2 = $this->tl_b2->ambil_tabel_b2_field1($tabel_b2_field1)->result();
		$img = $tabel_b2[0]->img;

		unlink($this->v_upload_path['tabel_b2'] . $img);

		$aksi = $this->tl_b2->hapus($tabel_b2_field1);

		$notif = $this->handle_3b($aksi, 'tabel_b2_field1', $tabel_b2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_b2_alias'],
			'dekor' => $this->tl_b2->dekor($this->aliases['tabel_b2'])->result(),
			'tbl_b2' => $this->tl_b2->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_b2'], $data);
	}

	// Cetak satu data
}
