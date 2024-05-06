<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Omnitags.php';

class C_tabel9 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		redirect(site_url('no_page'));
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel9_alias'],
			'konten' => $this->v3['tabel9'],
			'dekor' => $this->tl12->dekor('tabel9')->result(),
			'tbl9' => $this->tl9->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$tabel9_field3 = $this->v_post['tabel9_field3'];
		$tabel9_field4 = $this->v_post['tabel9_field4'];

		$method3 = $this->tl9->cek_tabel9_field3($tabel9_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $tabel9_field4) {
				$this->load->library('encryption');

				$data = array(
					$this->aliases['tabel9_field1'] => '',
					$this->aliases['tabel9_field2'] => $this->v_post['tabel9_field2'],
					$this->aliases['tabel9_field3'] => $this->v_post['tabel9_field3'],

					// mengubah password menjadi password berenkripsi
					$this->aliases['tabel9_field4'] => password_hash($tabel9_field4, PASSWORD_DEFAULT),

					$this->aliases['tabel9_field5'] => $this->v_post['tabel9_field5'],
					$this->aliases['tabel9_field6'] => $this->v_post['tabel9_field6'],
				);

				$simpan = $this->tl9->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata($this->aliases['tabel9_field3'])) {

					redirect(site_url('c_tabel9/admin'));
				} else {

					redirect(site_url('c_tabel9/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata($this->views['flash1'], 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->aliases['tabel9_field3'] . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$this->declarew();

		$tabel9_field1 = $this->v_post['tabel9_field1'];
		$data = array(
			$this->aliases['tabel9_field2'] => $this->v_post['tabel9_field2'],
			$this->aliases['tabel9_field3'] => $this->v_post['tabel9_field3'],
			$this->aliases['tabel9_field5'] => $this->v_post['tabel9_field5'],
		);

		$update = $this->tl9->update($data, $tabel9_field1);

		if ($update) {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel9_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel9_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel9_field1 = null)
	{
		$this->declarew();

		$hapus = $this->tl9->hapus($tabel9_field1);


		if ($hapus) {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel9_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel9_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}


		redirect(site_url('c_tabel9/admin'));
	}


	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel9_alias'],
			'dekor' => $this->tl12->dekor('tabel9')->result(),
			'tbl9' => $this->tl9->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->v4['tabel9'], $data);
	}


	public function detail()
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		$data1 = array(
			'title' => $this->v6_title['tabel9_alias2'],
			'konten' => $this->v6['tabel9'],
			'dekor' => $this->tl12->dekor('tabel9')->result(),
			'tbl9' => $this->tl9->ambil_tabel9_field1($tabel9_field1)->result(),
			'tbl20' => $this->tl20->ambil_tabel9_field1($tabel9_field1)->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function login()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v2_title'],
			'dekor' => $this->tl12->dekor('v2')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v2'], $data);
	}

	public function signup()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v3_title'],
			'dekor' => $this->tl12->dekor('v3')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v3'], $data);
	}

	public function update_profil()
	{
		$this->declarew();

		$tabel9_field1 = $this->v_post['tabel9_field1'];
		$data = array(
			$this->aliases['tabel9_field2'] => $this->v_post['tabel9_field2'],
			$this->aliases['tabel9_field3'] => $this->v_post['tabel9_field3'],
			$this->aliases['tabel9_field5'] => $this->v_post['tabel9_field5'],
		);

		$update = $this->tl9->update($data, $tabel9_field1);

		if ($update) {

			$this->session->set_flashdata($this->views['flash1'], 'Profil berhasil diubah!');
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], 'Profil gagal diubah!');
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// mengambil data profil yang baru dirubah
		$tabel9 = $this->tl9->ambil_tabel9_field1($tabel9_field1)->result();
		$tabel9_field2 = $tabel9[0]->nama;
		$tabel9_field3 = $tabel9[0]->email;
		$tabel9_field4 = $tabel9[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata($this->aliases['tabel9_field2'], $tabel9_field2);
		$this->session->set_userdata($this->aliases['tabel9_field3'], $tabel9_field3);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_tabel9_field4()
	{
		$this->declarew();

		$tabel9_field1 = $this->v_post['tabel9_field1'];

		$cek_id = $this->tl9->ambil_tabel9_field1($tabel9_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel9 = $cek_id->result();
			$cek_tabel9_field4 = $tabel9[0]->password;

			$old_tabel9_field4 = $this->v_post_old['tabel9_field4'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel9_field4, $cek_tabel9_field4)) {
				$tabel9_field4 = $this->v_post['tabel9_field4'];

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $tabel9_field4) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel9_field4'] => password_hash($tabel9_field4, PASSWORD_DEFAULT),
					);

					$update = $this->tl9->update($data, $tabel9_field1);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata($this->flash['tabel9_field4'], $this->flash_msg3_alt2['tabel9_field4_alias']);
					$this->session->set_flashdata('modal', $this->flash_func['tabel9_field4']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata($this->flash['tabel9_field4'], $this->flash_msg3_alt1['tabel9_field4_alias']);
				$this->session->set_flashdata('modal', $this->flash_func['tabel9_field4']);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata($this->flash['tabel9_field4'], $this->flash_msg5['tabel9_alias2']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel9_field4']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		$this->declarew();

		$tabel9_field3 = $this->v_post['tabel9_field3'];
		$tabel9_field4 = $this->v_post['tabel9_field4'];

		$method3 = $this->tl9->cek_tabel9_field3($tabel9_field3);

		// mencari apakah jumlah data kurang dari 0
		if ($method3->num_rows() > 0) {
			$tabel9 = $method3->result();
			$method4 = $tabel9[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($tabel9_field4, $method4)) {
				$tabel9_field1 = $tabel9[0]->id_user;
				$tabel9_field2 = $tabel9[0]->nama;
				$tabel9_field3 = $tabel9[0]->email;
				$tabel9_field5 = $tabel9[0]->hp;
				$tabel9_field6 = $tabel9[0]->level;


				$this->session->set_userdata($this->aliases['tabel9_field1'], $tabel9_field1);
				$this->session->set_userdata($this->aliases['tabel9_field2'], $tabel9_field2);
				$this->session->set_userdata($this->aliases['tabel9_field3'], $tabel9_field3);
				$this->session->set_userdata($this->aliases['tabel9_field5'], $tabel9_field5);
				$this->session->set_userdata($this->aliases['tabel9_field6'], $tabel9_field6);

				// Function to get the device type
				function getDeviceType($userAgent)
				{
					// List of common mobile device strings
					$mobileDevices = array('iPhone', 'iPad', 'Android', 'Windows Phone', 'BlackBerry');

					// Check if the user agent contains any of the mobile device strings
					foreach ($mobileDevices as $device) {
						if (stripos($userAgent, $device) !== false) {
							return 'Mobile';
						}
					}

					// If no mobile device string is found, consider it as a desktop
					return 'Desktop';
				}

				// Get the user agent string
				$userAgent = $_SERVER['HTTP_USER_AGENT'];

				// Get the device type
				$deviceType = getDeviceType($userAgent);

				$loginh = array(
					$this->aliases['tabel20_field1'] => '',
					$this->aliases['tabel20_field2'] => $this->session->userdata($this->aliases['tabel9_field1']),
					$this->aliases['tabel20_field3'] => date("Y-m-d\TH:i:s"),
					$this->aliases['tabel20_field4'] => date("Y-m-d\TH:i:s"),
					$this->aliases['tabel20_field5'] => $deviceType,
				);

				$login_history = $this->tl20->simpan($loginh);

				redirect(site_url('home'));

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

				$this->session->set_flashdata($this->views['flash1'], $this->flash_msg3['tabel9_field4_alias']);
				redirect(site_url('c_tabel9/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash_msg4['tabel9_field3']);
			redirect(site_url('c_tabel9/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel9 = $cekemail->result();
		// 	$cekpass = $tabel9[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$tabel9_field1 = $tabel9[0]->id_user;
		// 		$nama = $tabel9[0]->nama;
		// 		$tabel9_field1 = $tabel9[0]->email;
		// 		$hp = $tabel9[0]->hp;
		// 		$level = $tabel9[0]->level;

		// 		$this->session->set_userdata('id_user', $tabel9_field1);
		// 		$this->session->set_userdata('nama', $nama);
		// 		$this->session->set_userdata('email', $tabel9_field1);
		// 		$this->session->set_userdata('hp', $hp);
		// 		$this->session->set_userdata('level', $level);

		// 		redirect(site_url('home'));

		// 		// jika password salah
		// 	} else {

		// 		$this->session->set_flashdata($this->views['flash1'], 'Password Salah!');
		// 		redirect(site_url('c_tabel9/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	$this->session->set_flashdata($this->views['flash1'], 'Email tidak tersedia!');
		// 	redirect(site_url('c_tabel9/login'));
		// }


	}

	public function logout()
	{
		$this->declarew();

		// menghapus session
		session_destroy();
		redirect(site_url('home'));
	}
}
