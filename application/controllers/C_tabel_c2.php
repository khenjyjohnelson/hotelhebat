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

		$data1 = array(
			'title' => lang('tabel_c2_alias_v3_title'),
			'konten' => $this->v3['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->get_all_c2()->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$this->session_3();

		$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
		$tabel_c2_field4 = $this->v_post_new['tabel_c2_field4'];

		$method3 = $this->tl_c2->get_c2_by_c2_field3($tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->v_post_confirm['tabel_c2_field4'] === $tabel_c2_field4) {
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

					redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c2'] . '/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				set_flashdata($this->views['flash1'], 'Konfirmasi ' . $this->aliases['tabel_c2_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_c2_field3'] . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$this->declarew();

		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];
		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
			$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
		);

		$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

		$notif = $this->handle_2b($aksi, 'tabel_c2', $tabel_c2_field1);

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_c2_field1 = null)
	{
		$this->declarew();

		$this->session_3();

		$aksi = $this->tl_c2->delete_c2($tabel_c2_field1);

		$notif = $this->handle_3b($aksi, 'tabel_c2_field1', $tabel_c2_field1);

		redirect($_SERVER['HTTP_REFERER']);
		
	}


	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_c2_alias_v4_title'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->get_all_c2()->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data($this->v4['tabel_c2'], $data);
	}


	public function profil()
	{
		$this->declarew();

		$tabel_c2_field1 = userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => lang('tabel_c2_alias_v6_title'),
			'konten' => $this->v6['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1)->result(),
			'tbl_d3' => $this->tl_d3->get_d3_by_c2_field1($tabel_c2_field1)->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data('_layouts/template', $data);
	}

	public function login()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('login'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'login')->result(),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('login', $data);
	}

	public function signup()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('signup'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'signup')->result(),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('signup', $data);
	}

	public function update_profil()
	{
		$this->declarew();

		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];
		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
			$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
		);

		$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

		$notif = $this->handle_2b($aksi, 'tabel_c2', $tabel_c2_field1);

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
	}

	public function update_password()
	{
		$this->declarew();

		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		$cek_id = $this->tl_c2->get_c2_by_c2_field1($tabel_c2_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel_c2 = $cek_id->result();
			$cek_tabel_c2_field4 = $tabel_c2[0]->password;

			$old_tabel_c2_field4 = $this->v_post_old['tabel_c2_field4'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel_c2_field4, $cek_tabel_c2_field4)) {
				$tabel_c2_field4 = $this->v_post_new['tabel_c2_field4'];

				// jika konfirmasi password sama dengan password baru
				if ($this->v_post_confirm['tabel_c2_field4'] === $tabel_c2_field4) {
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
		$this->declarew();

		$this->session_3();

		$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
		$tabel_c2_field4 = $this->v_post['tabel_c2_field4'];

		$method3 = $this->tl_c2->get_c2_by_c2_field3($tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 0
		if ($method3->num_rows() > 0) {
			$tabel_c2 = $method3->result();
			$method4 = $tabel_c2[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($tabel_c2_field4, $method4)) {
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

				// Function to get the device type
				// Function to get the device type and operating system
				function getDeviceTypeAndOS($userAgent)
				{
					// List of common mobile device strings
					$mobileDevices = array(
						'iPhone',
						'iPad',
						'iPod',
						'Android',
						'Windows Phone',
						'BlackBerry',
					);

					// List of common desktop operating system strings
					$desktopOS = array(
						'Windows',
						'Linux',
						'Macintosh',
						'Mac OS X',
						'Mac OS'
					);

					// Check if the user agent contains any of the mobile device strings
					foreach ($mobileDevices as $device) {
						if (stripos($userAgent, $device) !== false) {
							return $device . ' (Mobile)';
						}
					}

					// Check if the user agent contains any of the desktop operating system strings
					foreach ($desktopOS as $os) {
						if (stripos($userAgent, $os) !== false) {
							return 'Desktop on ' . $os;
						}
					}

					// If no specific device category is found, consider it as a desktop with unknown OS
					return 'Desktop (Unknown OS)';
				}


				// Get the user agent string
				$userAgent = $_SERVER['HTTP_USER_AGENT'];

				// Get the device type
				$deviceType = getDeviceTypeAndOS($userAgent);

				$loginh = array(
					$this->aliases['tabel_d3_field1'] => '',
					$this->aliases['tabel_d3_field2'] => userdata($this->aliases['tabel_c2_field1']),
					$this->aliases['tabel_d3_field3'] => date("Y-m-d\TH:i:s"),
					$this->aliases['tabel_d3_field4'] => date("Y-m-d\TH:i:s"),
					$this->aliases['tabel_d3_field5'] => $deviceType,
				);

				$login_history = $this->tl_d3->insert_d3($loginh);

				$notif = $this->handle_4b();


				redirect(site_url($this->language_code . '/' . 'home'));

				// jika password salah
			} else {

				// Selama ini hal yang menampilkan pesan hanyalah toast
				// Di sini aku akan mencoba menerapkan menampilkan modal secara otomatis ketika password salah
				// Namun nanti hanya ketika password salah saja, melainkan semua proses yang melibatkan elemen modal
				// Kemungkinan ke depannya bakal ada yang lain juga selain modal dan toast 
				// Hal ini tentunya akan menggunakan beberapa file diantara lain
				// Welcome.php, halaman template bagian javascript, dan masing-masing halaman tujuan
				// Selain itu aku ingin mencoba menerapkannya juga pada button notifikasi jika ada nanti
				// Supaya bisa menyimpan proses apa saja yang telah selesai dilakukan

				// Dan terakhir, aku perlu menambahkan fungsi flashdata baru selain 'panggil'
				// Alasannya karena ada banyak sekali jenis pesan yang tidak boleh digunakan dalam satu tempat
				// Kalau tidak bisa merusak experience dari user

				set_flashdata($this->views['flash1'], $this->flash_msg3['tabel_c2_field4_alias']);
				redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c2'] . '/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->flash_msg4['tabel_c2_field3']);
			redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c2'] . '/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel_c2 = $cekemail->result();
		// 	$cekpass = $tabel_c2[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$tabel_c2_field1 = $tabel_c2[0]->id_user;
		// 		$nama = $tabel_c2[0]->nama;
		// 		$tabel_c2_field1 = $tabel_c2[0]->email;
		// 		$hp = $tabel_c2[0]->hp;
		// 		$level = $tabel_c2[0]->level;

		// 		set_userdata('id_user', $tabel_c2_field1);
		// 		set_userdata('nama', $nama);
		// 		set_userdata('email', $tabel_c2_field1);
		// 		set_userdata('hp', $hp);
		// 		set_userdata('level', $level);

		// 		redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url($this->language_code . '/' . 'home'));

		// 		// jika password salah
		// 	} else {

		// 		set_flashdata($this->views['flash1'], 'Password Salah!');
		// 		redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c2'] . '/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	set_flashdata($this->views['flash1'], 'Email tidak tersedia!');
		// 	redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c2'] . '/login'));
		// }


	}

	public function logout()
	{
		$this->declarew();

		// menghapus session
		session_destroy();
		redirect(site_url($this->language_code . '/' . 'home'));
	}
}
