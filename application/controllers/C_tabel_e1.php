<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e1 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => 'tabel_e1_alias_v1',
			'konten' => $this->v1['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1'])->result(),
			'tbl_e1' => $this->tl_e1->get_all_e1()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => 'tabel_e1_alias_v3',
			'konten' => $this->v3['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1'])->result(),
			'tbl_e1' => $this->tl_e1->get_all_e1()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view('_layouts/template', $data);
	}

	function tambah()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel_e1_field2',
			'tabel_e1_field3',
			'tabel_e1_field4'
		];
		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->views['flash2'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata('modal', $this->views['flash2_func1']);
				// Functional requirement: Redirect user to 'tabel_e1' page
				redirect($_SERVER['HTTP_REFERER']); 
			}
		}

		// Authentication and Authorization (if applicable)

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel_e1_field1'] => '',
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3'],
			$this->aliases['tabel_e1_field4'] => $this->v_post['tabel_e1_field4'],
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Save data to database
			$aksi = $this->tl_e1->insert_e1($data);

			$notif = $this->handle_1b($aksi, 'tabel_e1');
			
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash2'], "Error occurred while adding data: " . $e->getMessage());
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']); 
	}



	public function update()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel_e1_field2',
			'tabel_e1_field3'
		];

		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->views['flash3'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata('modal', $this->views['flash3_func1']);
				// Functional requirement: Redirect user to 'tabel_e1' page
				redirect($_SERVER['HTTP_REFERER']); 
			}
		}

		$tabel_e1_field1 = htmlspecialchars(trim($this->v_post['tabel_e1_field1']));

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3']
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Update data in the database
			$aksi = $this->tl_e1->update_e1($data, $tabel_e1_field1);

			$notif = $this->handle_2b($aksi, 'tabel_e1', $tabel_e1_field1);

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash2'], "Error occurred while updating data: " . $e->getMessage());
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']); 
	}



	public function delete($tabel_e1_field1 = null)
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		$tabel_e1 = $this->tl_e1->get_e1_by_e1_field1($tabel_e1_field1)->result();
		$tabel_e1_field3 = $tabel_e1[0]->img;

		unlink($this->v_upload_path['tabel_e1'] . $tabel_e1_field3);

		try {
			// Functional requirement: Delete data from the database
			$aksi = $this->tl_e1->delete_e1($tabel_e1_field1);

			$notif = $this->handle_3b($aksi, 'tabel_e1_field1', $tabel_e1_field1);

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash1'], "Error occurred while deleting data: " . $e->getMessage());
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']); 
	}


	// Halaman cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => 'tabel_e1_alias_v4',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1'])->result(),
			'tbl_e1' => $this->tl_e1->get_all_e1()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_e1'], $data);
	}
}
