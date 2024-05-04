<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel13 extends Omnitags
{
	// Halaman publik

	
	// Halaman khusus akun

	
	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v3_title['tabel13_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v3['tabel13'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel13')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl13' => $this->tl13->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel13'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel13_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->v_input['tabel13_field4_input'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->flashdatas['flash2'], $this->flash_msg2['tabel13_field4_alias']);
			$this->session->set_flashdata('modal', $this->flashdatas['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel13_field1'] => '',
			$this->aliases['tabel13_field2'] => $this->v_post['tabel13_field2'],
			$this->aliases['tabel13_field3'] => $this->v_post['tabel13_field3'],
			$this->aliases['tabel13_field4'] => $gambar,
			$this->aliases['tabel13_field5'] => $this->v_post['tabel13_field5'],
		);

		$simpan = $this->tl13->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_1['tabel13_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_2['tabel13_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel13/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel13'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel13_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($this->v_input['tabel13_field4_input'])) {
			$gambar = $this->v_post_old['tabel13_field4'];
		} else {

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];

		}

		$tabel13_field1 = $this->v_post['tabel13_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel13_field2'] => $this->v_post['tabel13_field2'],
			$this->aliases['tabel13_field3'] => $this->v_post['tabel13_field3'],
			$this->aliases['tabel13_field4'] => $gambar,
			$this->aliases['tabel13_field5'] => $this->v_post['tabel13_field5'],
		);

		$update = $this->tl13->update($data, $tabel13_field1);

		if ($update) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_3['tabel13_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_4['tabel13_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(site_url('c_tabel13/admin'));
	}

	public function hapus($tabel13_field1 = null)
	{
		$this->declarew();

		$tabel13 = $this->tl13->ambil_tabel13_field1($tabel13_field1)->result();
		$img = $tabel13[0]->img;

		unlink($this->v_upload_path['tabel13'] . $img);

		$hapus = $this->tl13->hapus($tabel13_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_5['tabel13_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_6['tabel13_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('c_tabel13/admin'));
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->v4_title['tabel13_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl13->dekor('tabel13')->result(),
			'tbl23' => $this->tl23->ambildata()->result(), 'tbl24' => $this->tl24->ambildata($tabel7_field1)->result(), 'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl13' => $this->tl13->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->v4['tabel13'], $data);
	}

	// Cetak satu data
}
