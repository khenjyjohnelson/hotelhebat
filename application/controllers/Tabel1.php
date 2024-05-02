<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Tabel1 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel1_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel1'],
			$this->v_part5 => $this->tl12->dekor('tabel1')->result(),
			$this->v_part4 => $this->v_part4_msg1,
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl1' => $this->tl1->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views, $this->views_input, $this->views, $this->flashdatas);

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
			$input_value = htmlspecialchars(trim($this->views_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->flashdatas['v_flashdata3'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata($this->flashdatas['v_flashdata_c'], $this->flashdatas['v_flashdata_c_func1']);
				// Functional requirement: Redirect user to 'tabel1' page
				redirect(site_url('tabel1/admin'));
			}
		}

		// Authentication and Authorization (if applicable)

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel1_field1'] => '',
			$this->aliases['tabel1_field2'] => $this->views_post['tabel1_field2'],
			$this->aliases['tabel1_field3'] => $this->views_post['tabel1_field3'],
			$this->aliases['tabel1_field4'] => $this->views_post['tabel1_field4'],
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Save data to database
			$simpan = $this->tl1->simpan($data);

			if ($simpan) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_1['tabel1_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_2['tabel1_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->flashdatas['v_flashdata3'], "Error occurred while adding data: " . $e->getMessage());
			$this->session->set_flashdata($this->flashdatas['v_flashdata_c'], $this->flashdatas['v_flashdata_c_func1']);
		}

		// Functional requirement: Redirect user to 'tabel1' page
		redirect(site_url('tabel1/admin'));
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
			$input_value = htmlspecialchars(trim($this->views_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->flashdatas['v_flashdata4'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata($this->flashdatas['v_flashdata_d'], $this->flashdatas['v_flashdata_d_func1']);
				// Functional requirement: Redirect user to 'tabel1' page
				redirect(site_url('tabel1/admin'));
			}
		}

		$tabel1_field1 = htmlspecialchars(trim($this->views_post['tabel1_field1']));

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel1_field2'] => $this->views_post['tabel1_field2'],
			$this->aliases['tabel1_field3'] => $this->views_post['tabel1_field3']
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Update data in the database
			$update = $this->tl1->update($data, $tabel1_field1);

			if ($update) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_3['tabel1_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_4['tabel1_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->flashdatas['v_flashdata3'], "Error occurred while updating data: " . $e->getMessage());
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// Functional requirement: Redirect user to 'tabel1' page
		redirect(site_url('tabel1/admin'));
	}



	public function hapus($tabel1_field1 = null)
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		$tabel1 = $this->tl1->ambil_tabel1_field1($tabel1_field1)->result();
		$tabel1_field3 = $tabel1[0]->img;

		unlink($this->views['tabel1_field3_upload_path'] . $tabel1_field3);

		try {
			// Functional requirement: Delete data from the database
			$hapus = $this->tl1->hapus($tabel1_field1);

			if ($hapus) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_5['tabel1_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->flashdatas['v_flashdata1'], $this->flashdata1_msg_6['tabel1_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->flashdatas['v_flashdata1'], "Error occurred while deleting data: " . $e->getMessage());
			$this->session->set_flashdata($this->flashdatas['v_flashdata_a'], $this->flashdatas['v_flashdata_a_func1']);
		}

		// Functional requirement: Redirect user to 'tabel1' page
		redirect(site_url('tabel1/admin'));
	}


	// Halaman cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel1_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel1')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl1' => $this->tl1->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->views_input, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel1'], $data);
	}
}
