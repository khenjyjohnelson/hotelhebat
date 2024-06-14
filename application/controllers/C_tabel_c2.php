<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Omnitags.php';

class C_tabel_c2 extends Omnitags
{
	// Halaman publik


	// Halaman admin
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_c2_alias_v3_title'),
			'count' => $this->tl_c2->get_all_c2()->num_rows(),
			'konten' => $this->v3['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->get_all_c2()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();
		$this->session_all();

		validate_input(
			array(
				$this->v_post['tabel_c2_field2'],
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field4'],
				$this->v_post['tabel_c2_field4_confirm'],
				$this->v_post['tabel_c2_field5'],
				$this->v_post['tabel_c2_field6'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
		$tabel_c2_field4 = $this->v_post['tabel_c2_field4_new'];

		$method3 = $this->tl_c2->get_c2_by_c2_field3($tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->v_post['tabel_c2_field4_confirm'] === $tabel_c2_field4) {
				$this->load->library('encryption');

				$data = array(
					$this->aliases['tabel_c2_field1'] => '',
					$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
					$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],

					// mengubah password menjadi password berenkripsi
					$this->aliases['tabel_c2_field4'] => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),

					$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
					$this->aliases['tabel_c2_field6'] => $this->v_post['tabel_c2_field6'],
				);

				$aksi = $this->tl_c2->insert_c2($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if (userdata($this->aliases['tabel_c2_field3'])) {

					redirect($_SERVER['HTTP_REFERER']);
				} else {

					redirect(site_url($this->language_code . '/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				set_flashdata($this->views['flash1'], 'Konfirmasi ' . $this->aliases['tabel_c2_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_c2_field3'] . ' telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$this->declarew();
		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		$tabel_c2 = $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1)->result();

		if ($tabel_c2) {

			validate_input(
				array(
					$this->v_post['tabel_c2_field1'],
					$this->v_post['tabel_c2_field2'],
					$this->v_post['tabel_c2_field3'],
					$this->v_post['tabel_c2_field5'],
					$this->v_post['tabel_c2_field6'],
				),
				$this->views['flash3'],
				'ubah' . $tabel_c2_field1
			);

			$data = array(
				$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
				$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
				$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
				$this->aliases['tabel_c2_field6'] => $this->v_post['tabel_c2_field6'],
			);

			$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

			$notif = $this->handle_4c($aksi, 'tabel_c2', $tabel_c2_field1);

			// kembali ke halaman sebelumnya
			redirect($_SERVER['HTTP_REFERER']);


		} else {
			// error handling
			set_flashdata($this->views['flash1'], "Error occurred while processing data!");
			set_flashdata('toast', $this->views['flash1_func1']);
			redirect(userdata('previous_url'));
		}
	}

	public function delete($tabel_c2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1)->result();

		if ($tabel) {

			$aksi = $this->tl_c2->delete_c2($tabel_c2_field1);

			$notif = $this->handle_4e($aksi, 'tabel_c2', $tabel_c2_field1);

			redirect($_SERVER['HTTP_REFERER']);

		} else {
			// error handling
			set_flashdata($this->views['flash1'], "Error occurred while processing data!");
			set_flashdata('toast', $this->views['flash1_func1']);
			redirect(userdata('previous_url'));
		}

	}


	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_c2_alias_v4_title'),
			'konten' => $this->v4['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->get_all_c2()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}


	public function profil()
	{
		$this->declarew();
		$this->page_session_2_3_4_5();

		$tabel_c2_field1 = userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => lang('tabel_c2_alias_v6_title'),
			'konten' => $this->v6['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1)->result(),
			'tbl_d3' => $this->tl_d3->get_d3_by_c2_field1($tabel_c2_field1)->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	public function login()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => lang('login'),
			'konten' => 'login',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'login')->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/logpage', $data);
	}

	public function signup()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => lang('signup'),
			'konten' => 'signup',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'signup')->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/logpage', $data);
	}

	public function update_profil()
	{
		$this->declarew();
		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		$tabel = $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1)->result();

		if (!$tabel) {

			validate_input(
				array(
					$this->v_post['tabel_c2_field1'],
					$this->v_post['tabel_c2_field2'],
					$this->v_post['tabel_c2_field3'],
					$this->v_post['tabel_c2_field5'],
				),
				$this->views['flash1'],
				'ubah' . $tabel_c2_field1
			);

			$data = array(
				$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
				$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
				$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
			);

			$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

			$notif = $this->handle_4c($aksi, 'tabel_c2', $tabel_c2_field1);

			// mengambil data profil yang baru dirubah
			$tabel_c2 = $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1)->result();
			$tabel_c2_field2 = $tabel_c2[0]->nama;
			$tabel_c2_field3 = $tabel_c2[0]->email;
			$tabel_c2_field4 = $tabel_c2[0]->hp;

			// membuat session baru berdasarkan data yang telah diupdate
			set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
			set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);

			// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
			redirect($_SERVER['HTTP_REFERER']);


		} else {
			// error handling
			set_flashdata($this->views['flash1'], "Error occurred while processing data!");
			set_flashdata('toast', $this->views['flash1_func1']);
			redirect(userdata('previous_url'));
		}
	}

	public function update_password()
	{
		$this->declarew();
		$this->session_2_3_4_5();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		validate_input(
			array(
				$this->v_post['tabel_c2_field1'],
				$this->v_post['tabel_c2_field4_old'],
				$this->v_post['tabel_c2_field4_new'],
				$this->v_post['tabel_c2_field4_confirm'],
			),
			$this->views['flash1'],
			'password' . $tabel_c2_field1
		);


		$cek_id = $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel_c2 = $cek_id->result();
			$cek_tabel_c2_field4 = $tabel_c2[0]->password;

			$old_tabel_c2_field4 = $this->v_post['tabel_c2_field4_old'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel_c2_field4, $cek_tabel_c2_field4)) {
				$tabel_c2_field4 = $this->v_post['tabel_c2_field4_new'];

				// jika konfirmasi password sama dengan password baru
				if ($this->v_post['tabel_c2_field4_confirm'] === $tabel_c2_field4) {
					$this->load->library('encryption');

					$data = array(
						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel_c2_field4'] => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),
					);

					$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg3_alt2['tabel_c2_field4_alias']);
					set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg3_alt1['tabel_c2_field4_alias']);
				set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg5['tabel_c2_alias2']);
			set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		// Ensure that necessary dependencies are loaded
		$this->declarew();
		$this->session_all();

		validate_input(
			array(
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field4'],
			),
			$this->views['flash1'],
			''
		);

		$tabel_c2_field3 = xss_clean($this->v_post['tabel_c2_field3']);
		$tabel_c2_field4 = xss_clean($this->v_post['tabel_c2_field4']);

		// Get user data based on email
		$method3 = $this->tl_c2->get_c2_by_c2_field3($tabel_c2_field3);

		// Check if user data exists
		if ($method3->num_rows() > 0) {
			$tabel_c2 = $method3->result();
			$method4 = $tabel_c2[0]->password;

			// Verify password
			if (password_verify($tabel_c2_field4, $method4)) {
				// Set user session data
				$tabel_c2_field1 = $tabel_c2[0]->id_user;
				$tabel_c2_field2 = $tabel_c2[0]->nama;
				$tabel_c2_field3 = $tabel_c2[0]->email;
				$tabel_c2_field5 = $tabel_c2[0]->hp;
				$tabel_c2_field6 = $tabel_c2[0]->level;

				set_userdata($this->aliases['tabel_c2_field1'], $tabel_c2_field1);
				set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
				set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);
				set_userdata($this->aliases['tabel_c2_field5'], $tabel_c2_field5);
				set_userdata($this->aliases['tabel_c2_field6'], $tabel_c2_field6);

				// Record login history
				$userAgent = $_SERVER['HTTP_USER_AGENT'];
				$deviceType = getDeviceTypeAndOS($userAgent);
				$loginh = array(
					$this->aliases['tabel_d3_field1'] => '',
					$this->aliases['tabel_d3_field2'] => userdata($this->aliases['tabel_c2_field1']),
					$this->aliases['tabel_d3_field3'] => date("Y-m-d\TH:i:s"),
					$this->aliases['tabel_d3_field4'] => date("Y-m-d\TH:i:s"),
					$this->aliases['tabel_d3_field5'] => $deviceType,
				);
				$login_history = $this->tl_d3->insert_d3($loginh);

				// Handle notifications
				$notif = $this->handle_2a();

				// Redirect to home page after successful login
				redirect(site_url($this->language_code . '/' . 'home'));
			} else {
				// Set flash message for incorrect password
				set_flashdata($this->views['flash1'], 'Incorrect email or password.');
				redirect(site_url($this->language_code . '/login'));
			}
		} else {
			// Set flash message for non-existent email
			set_flashdata($this->views['flash1'], 'Email not found.');
			redirect(site_url($this->language_code . '/login'));
		}

		// Define validation rules
		// $rules = array(
		// 	'tabel_c2_field3' => array('field' => $this->v_input['tabel_c2_field3_input'], 'rules' => 'required|valid_email'),
		// 	'tabel_c2_field4' => array('field' => $this->v_input['tabel_c2_field4_input'], 'rules' => 'required')
		// 	// Add more fields and rules as needed
		// );

		// Validate input using the helper
		// $is_valid = validate_form($rules, $this->views['flash1']);

		// Proceed with the rest of the logic if validation is successful
		// if ($is_valid) {
		// Get and sanitize user inputs

		// }

	}


	// public function ceklogin()
	// {
	// 	$this->declarew();

	// 	$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
	// 	$tabel_c2_field4 = $this->v_post['tabel_c2_field4'];

	// 	$method3 = $this->tl_c2->get_c2_by_c2_field3($tabel_c2_field3);

	// 	// mencari apakah jumlah data kurang dari 0
	// 	if ($method3->num_rows() > 0) {
	// 		$tabel_c2 = $method3->result();
	// 		$method4 = $tabel_c2[0]->password;

	// 		// memverifikasi password dengan password di database
	// 		if (password_verify($tabel_c2_field4, $method4)) {
	// 			$tabel_c2_field1 = $tabel_c2[0]->id_user;
	// 			$tabel_c2_field2 = $tabel_c2[0]->nama;
	// 			$tabel_c2_field3 = $tabel_c2[0]->email;
	// 			$tabel_c2_field5 = $tabel_c2[0]->hp;
	// 			$tabel_c2_field6 = $tabel_c2[0]->level;


	// 			set_userdata($this->aliases['tabel_c2_field1'], $tabel_c2_field1);
	// 			set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
	// 			set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);
	// 			set_userdata($this->aliases['tabel_c2_field5'], $tabel_c2_field5);
	// 			set_userdata($this->aliases['tabel_c2_field6'], $tabel_c2_field6);

	// 			// Get the user agent string
	// 			$userAgent = $_SERVER['HTTP_USER_AGENT'];

	// 			// Get the device type
	// 			$deviceType = getDeviceTypeAndOS($userAgent);

	// 			$loginh = array(
	// 				$this->aliases['tabel_d3_field1'] => '',
	// 				$this->aliases['tabel_d3_field2'] => userdata($this->aliases['tabel_c2_field1']),
	// 				$this->aliases['tabel_d3_field3'] => date("Y-m-d\TH:i:s"),
	// 				$this->aliases['tabel_d3_field4'] => date("Y-m-d\TH:i:s"),
	// 				$this->aliases['tabel_d3_field5'] => $deviceType,
	// 			);

	// 			$login_history = $this->tl_d3->insert_d3($loginh);

	// 			$notif = $this->handle_2a();


	// 			redirect(site_url($this->language_code . '/' . 'home'));

	// 			// jika password salah
	// 		} else {

	// 			// Selama ini hal yang menampilkan pesan hanyalah toast
	// 			// Di sini aku akan mencoba menerapkan menampilkan modal secara otomatis ketika password salah
	// 			// Namun nanti hanya ketika password salah saja, melainkan semua proses yang melibatkan elemen modal
	// 			// Kemungkinan ke depannya bakal ada yang lain juga selain modal dan toast 
	// 			// Hal ini tentunya akan menggunakan beberapa file diantara lain
	// 			// Welcome.php, halaman template bagian javascript, dan masing-masing halaman tujuan
	// 			// Selain itu aku ingin mencoba menerapkannya juga pada button notifikasi jika ada nanti
	// 			// Supaya bisa menyimpan proses apa saja yang telah selesai dilakukan

	// 			// Dan terakhir, aku perlu menambahkan fungsi flashdata baru selain 'panggil'
	// 			// Alasannya karena ada banyak sekali jenis pesan yang tidak boleh digunakan dalam satu tempat
	// 			// Kalau tidak bisa merusak experience dari user

	// 			set_flashdata($this->views['flash1'], $this->flash_msg3['tabel_c2_field4_alias']);
	// 			redirect(site_url($this->language_code . '/login'));
	// 		}

	// 		// jika jumlah data lebih dari 0
	// 	} else {

	// 		set_flashdata($this->views['flash1'], $this->flash_msg4['tabel_c2_field3']);
	// 		redirect(site_url($this->language_code . '/login'));
	// 	}

	// 	// // mencari apakah jumlah data kurang dari 0
	// 	// if ($cekemail->num_rows() > 0) {
	// 	// 	$tabel_c2 = $cekemail->result();
	// 	// 	$cekpass = $tabel_c2[0]->password;

	// 	// 	// memverifikasi password dengan password di database
	// 	// 	if (password_verify($password, $cekpass)) {
	// 	// 		$tabel_c2_field1 = $tabel_c2[0]->id_user;
	// 	// 		$nama = $tabel_c2[0]->nama;
	// 	// 		$tabel_c2_field1 = $tabel_c2[0]->email;
	// 	// 		$hp = $tabel_c2[0]->hp;
	// 	// 		$level = $tabel_c2[0]->level;

	// 	// 		set_userdata('id_user', $tabel_c2_field1);
	// 	// 		set_userdata('nama', $nama);
	// 	// 		set_userdata('email', $tabel_c2_field1);
	// 	// 		set_userdata('hp', $hp);
	// 	// 		set_userdata('level', $level);

	// 	// 		redirect($_SERVER['HTTP_REFERER']); 
	// 	redirect(site_url($this->language_code . '/' . 'home'));

	// 	// 		// jika password salah
	// 	// 	} else {

	// 	// 		set_flashdata($this->views['flash1'], 'Password Salah!');
	// 	// 		redirect($_SERVER['HTTP_REFERER']); 
	// 	redirect(site_url($this->language_code . '/login'));
	// 	// 	}

	// 	// 	// jika jumlah data lebih dari 0
	// 	// } else {

	// 	// 	set_flashdata($this->views['flash1'], 'Email tidak tersedia!');
	// 	// 	redirect($_SERVER['HTTP_REFERER']); 
	// 	redirect(site_url($this->language_code . '/login'));
	// 	// }


	// }

	public function logout()
	{
		$this->declarew();
		$this->session_2_3_4_5();

		// menghapus session
		session_destroy();
		redirect(site_url($this->language_code . '/' . 'home'));
	}
}
