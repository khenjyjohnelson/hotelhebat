<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel1 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v1_title['tabel1_alias'],
			'konten' => $this->v1['tabel1'],
			'dekor' => $this->tl12->dekor('tabel1')->result(),
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
			'title' => $this->v3_title['tabel1_alias'],
			'konten' => $this->v3['tabel1'],
			'dekor' => $this->tl12->dekor('tabel1')->result(),
			'tbl1' => $this->tl1->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->v_input, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	function tambah()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel1_field2',
			'tabel1_field3',
			'tabel1_field4'
		];
		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->views['flash2'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata('modal', $this->views['flash2_func1']);
				// Functional requirement: Redirect user to 'tabel1' page
				redirect(site_url('c_tabel1/admin'));
			}
		}

		// Authentication and Authorization (if applicable)

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel1_field1'] => '',
			$this->aliases['tabel1_field2'] => $this->v_post['tabel1_field2'],
			$this->aliases['tabel1_field3'] => $this->v_post['tabel1_field3'],
			$this->aliases['tabel1_field4'] => $this->v_post['tabel1_field4'],
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Save data to database
			$simpan = $this->tl1->simpan($data);

			if ($simpan) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel1_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel1_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash2'], "Error occurred while adding data: " . $e->getMessage());
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
		}

		// Functional requirement: Redirect user to 'tabel1' page
		redirect(site_url('c_tabel1/admin'));
	}



	public function update()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel1_field2',
			'tabel1_field3'
		];

		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->views['flash3'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata('modal', $this->views['flash3_func1']);
				// Functional requirement: Redirect user to 'tabel1' page
				redirect(site_url('c_tabel1/admin'));
			}
		}

		$tabel1_field1 = htmlspecialchars(trim($this->v_post['tabel1_field1']));

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel1_field2'] => $this->v_post['tabel1_field2'],
			$this->aliases['tabel1_field3'] => $this->v_post['tabel1_field3']
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Update data in the database
			$update = $this->tl1->update($data, $tabel1_field1);

			if ($update) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel1_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel1_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash2'], "Error occurred while updating data: " . $e->getMessage());
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel1' page
		redirect(site_url('c_tabel1/admin'));
	}



	public function hapus($tabel1_field1 = null)
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		$tabel1 = $this->tl1->ambil_tabel1_field1($tabel1_field1)->result();
		$tabel1_field3 = $tabel1[0]->img;

		unlink($this->v_upload_path['tabel1_field3'] . $tabel1_field3);

		try {
			// Functional requirement: Delete data from the database
			$hapus = $this->tl1->hapus($tabel1_field1);

			if ($hapus) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel1_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel1_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash1'], "Error occurred while deleting data: " . $e->getMessage());
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel1' page
		redirect(site_url('c_tabel1/admin'));
	}


	// Halaman cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel1_alias'],
			'dekor' => $this->tl12->dekor('tabel1')->result(),
			'tbl1' => $this->tl1->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel1'], $data);
	}
}