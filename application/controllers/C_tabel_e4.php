<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e4 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v1_title'),
			'konten' => $this->v1['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4'])->result(),
			'tbl_e4' => $this->tl_e4->get_all_e4()->result(),
			'tbl_e1' => $this->tl_e1->get_all_e1()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Halaman khusus akun

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v3_title'),
			'konten' => $this->v3['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4'])->result(),
			'tbl_e4' => $this->tl_e4->get_all_e4()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e4' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e4' table.
	 * It then redirects the user back to the previous page with a notification message.
	 *
	 * @return void
	 */
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		// Define validation rules
		$rules = array(
			'tabel_e4_field2' => array('label' => $this->v_input['tabel_e4_field2'], 'rules' => 'required'),
			'tabel_e4_field3' => array('label' => $this->v_input['tabel_e4_field3'], 'rules' => 'required')
		);


		$this->load->helper('validate');
		// Validate input using the helper
		if (!validate_form($rules)) {
			// Form validation failed, redirect back to form
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Form validation passed, proceed with data insertion
			$data = array(
				$this->aliases['tabel_e4_field2'] => post('tabel_e4_field2'),
				$this->aliases['tabel_e4_field3'] => post('tabel_e4_field3'),
			);

			$aksi = $this->tl_e4->insert_e4($data);

			$notif = $this->handle_1b($aksi, 'tabel_e4');

			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$this->session_3();


		$tabel_e4_field1 = $this->v_post['tabel_e4_field1'];
		$data = array(
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $this->v_post['tabel_e4_field3'],
		);

		$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

		$notif = $this->handle_1c($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_e4_field1 = null)
	{
		$this->declarew();

		// switch (userdata($this->aliases['tabel_c2_field6'])) {
		// 	case $this->aliases['tabel_c2_field6_value3']:
		// 		break;

		// 	case $this->aliases['tabel_c2_field6_value1']:
		// 	case $this->aliases['tabel_c2_field6_value2']:
		// 	case $this->aliases['tabel_c2_field6_value5']:
		// 	case $this->aliases['tabel_c2_field6_value4']:
		// 	default:
		// 		redirect(site_url($this->views['language'] . '/welcome/404'));
		// 		break;
		// }

		$this->session_3();

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$tabel_e4_field3 = $tabel_e4[0]->img;

		unlink($this->v_upload_path['tabel_e4'] . $tabel_e4_field3);
		$aksi = $this->tl_e4->delete_e4($tabel_e4_field1);

		$notif = $this->handle_1e($aksi, 'tabel_e4_field1', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v4_title'),
			'konten' => $this->v4['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4'])->result(),
			'tbl_e4' => $this->tl_e4->get_all_e4()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Cetak satu data

	// Import excel
	public function importExcel()
	{
		$this->load->library('spreadsheet_lib');

		// Check if the form was submitted
		if (post('submit')) {
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
