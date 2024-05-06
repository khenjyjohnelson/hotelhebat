<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel6 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v1_title['tabel6_alias'],
			'konten' => $this->v1['tabel6'],
			'dekor' => $this->tl12->dekor('tabel6')->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl1' => $this->tl1->ambildata()->result()
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
			'title' => $this->v3_title['tabel6_alias'],
			'konten' => $this->v3['tabel6'],
			'dekor' => $this->tl12->dekor('tabel6')->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel6_field1'] => '',
			$this->aliases['tabel6_field2'] => $this->v_post['tabel6_field2'],
			$this->aliases['tabel6_field3'] => $this->v_post['tabel6_field3'],
		);

		// $query = 'INSERT INTO tipe_kamar VALUES('.$data.')';

		$simpan = $this->tl6->simpan($data);
		// $simpan = $this->tl6->simpan($query);

		if ($simpan) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel6_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel6_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel6/admin'));
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel6_field1 = $this->v_post['tabel6_field1'];
		$data = array(
			$this->aliases['tabel6_field2'] => $this->v_post['tabel6_field2'],
			$this->aliases['tabel6_field3'] => $this->v_post['tabel6_field3'],
		);

		$update = $this->tl6->update($data, $tabel6_field1);

		if ($update) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel6_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel6_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel6/admin'));
	}

	public function hapus($tabel6_field1 = null)
	{
		$this->declarew();

		$tabel6 = $this->tl6->ambil_tabel6_field1($tabel6_field1)->result();
		$tabel6_field3 = $tabel6[0]->img;

		unlink($this->v_upload_path['tabel6_field3'] . $tabel6_field3);
		$hapus = $this->tl6->hapus($tabel6_field1);

		if ($hapus) {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel6_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel6_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel6/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel6_alias'],
			'dekor' => $this->tl12->dekor('tabel6')->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel6'], $data);
	}

	// Cetak satu data

	// Import excel
	public function importExcel()
	{
		$this->load->library('spreadsheet_lib');

		// Check if the form was submitted
		if ($this->input->post('submit')) {
			// Handle file upload
			$file_path = $_FILES['filepegawai']['tmp_name'];

			// Read Excel file using the library
			$excel_data = $this->spreadsheet_lib->readExcel($file_path);

			// Process $excel_data as needed (e.g., insert into database)

			// Redirect or show success message
		} else {
			// Display form view
			$this->load->view('import_excel_form');
		}
	}


}
