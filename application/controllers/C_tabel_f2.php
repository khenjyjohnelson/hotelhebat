<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Masih banyak fitur-fitur yang kurang pada fitur pesanan seperti fitur cancel pesanan.
// Dan juga seharusnya ketika user melakukan pesanan seharusnya stok kamar tidak langsung berkurang
// // Melainkan harus menunggu tamu membooking kamar untuk customer terlebih dulu
// Saya baru berpikir untuk mengubah juga query sql pada trigger tambah kamar
// Yaitu untuk menambah stok kamar dan input ke history jika status pesannanya NOT IN (pending)
// Hal ini akan diperbaiki pada waktu-waktu mendatang. 

include 'Omnitags.php';
session_write_close();
class C_tabel_f2 extends Omnitags
{
	// Halaman publik/khusus akun
	public function index()
	{
		$this->declarew();

		switch ($this->session->userdata($this->aliases['tabel_c2_field6'])) {
			case $this->aliases['tabel_c2_field6_value5']:
				$data1 = array(
					'title' => $this->v1_title['tabel_f2'],
					'konten' => $this->v1['tabel_f2'],
					'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),
					'tbl_b5' => $this->tl_b5->ambildata()->result(),
					'tbl_b7' => $this->tl_b7->ambildata()->result(),
					'tbl_a1' => $this->tl_a1->ambil_tabel_a1_field1($this->tabel_a1_field1)->result(),
					'tbl_e4' => $this->tl_e4->ambildata()->result(),

					'tabel_f2_field10_value' => $this->v_get['tabel_f2_field10'],
					'tabel_f2_field11_value' => $this->v_get['tabel_f2_field11'],
					'tabel_f2_field8_value' => $this->v_get['tabel_f2_field8'],
				);

				$halaman = $this->views['v1'];
				break;

			default:
				$data1 = array(
					'title' => $this->views['v2'],
					'dekor' => $this->tl_b1->dekor('v2')->result(),
					'tbl_b5' => $this->tl_b5->ambildata()->result(),
					'tbl_a1' => $this->tl_a1->ambil_tabel_a1_field1($this->tabel_a1_field1)->result()

				);
				$halaman = $this->views['v2'];
		}

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_note2']);
		$this->session->set_flashdata('toast', $this->views['flash1_func1']);

		$this->load->view($halaman, $data);
	}

	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->session->userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => $this->v2_title['tabel_f2_alias'],
			'konten' => $this->v2['tabel_f2'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),
			'tbl_f2' => $this->tl_f2->ambil_tabel_c2_field1($tabel_c2_field1)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result(),

		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function filter_tabel_c1()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->session->userdata($this->aliases['tabel_c2_field1']);
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel_f2_field10'];
		$param2 = $this->v_filter2_get['tabel_f2_field10'];
		$param3 = $this->v_filter1_get['tabel_f2_field11'];
		$param4 = $this->v_filter2_get['tabel_f2_field11'];

		$data1 = array(
			'title' => $this->v2_title['tabel_f1_alias'],
			'konten' => $this->v2['tabel_f1'],
			'dekor' => $this->tl_b1->dekor('tabel_f1')->result(),
			'tbl_f2' => $this->tl_f2->filter_tabel_c1($param1, $param2, $param3, $param4, $tabel_c2_field1)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f2_field10_filter1_value' => $param1,
			'tabel_f2_field10_filter2_value' => $param2,
			'tabel_f2_field11_filter1_value' => $param3,
			'tabel_f2_field11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel_f2_field10'];
		$param2 = $this->v_filter2_get['tabel_f2_field10'];
		$param3 = $this->v_filter1_get['tabel_f2_field11'];
		$param4 = $this->v_filter2_get['tabel_f2_field11'];

		$data1 = array(
			'title' => $this->v3_title['tabel_f2_alias'],
			'konten' => $this->v3['tabel_f2'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),
			'tbl_f2' => $this->tl_f2->ambildata()->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f2_field10_filter1_value' => $param1,
			'tabel_f2_field10_filter2_value' => $param2,
			'tabel_f2_field11_filter1_value' => $param3,
			'tabel_f2_field11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel_f2_field4',
			'tabel_f2_field8',
			'tabel_f2_field10',
			'tabel_f2_field11',
			'tabel_f2_field2',
			'tabel_f2_field3',
			'tabel_f2_field5',
			'tabel_f2_field6',
			'tabel_f2_field7'
		];

		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->views['flash1'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_func1']);
				// Functional requirement: Redirect user to 'tabel_f2' confirmation page
				redirect(site_url('c_tabel_f2/konfirmasi'));
			}
		}

		// Calculate total price based on date difference
		$startTimeStamp = strtotime($this->v_post['tabel_f2_field10']);
		$endTimeStamp = strtotime($this->v_post['tabel_f2_field11']);
		$timedif = $endTimeStamp - $startTimeStamp;
		$numberdays = $timedif / 60 / 60 / 24; // 86400 seconds in one day

		$tabel_e4_field1 = $this->v_post['tabel_f2_field7'];
		$tabel_e4 = $this->tl_e4->ambil_tabel_e4_field1($tabel_e4_field1)->result();

		// Calculate total price
		$harga_total = ($numberdays * $tabel_e4[0]->harga);

		$data = [
			$this->aliases['tabel_f2_field1'] => '',
			$this->aliases['tabel_f2_field2'] => $this->v_post['tabel_f2_field2'],
			$this->aliases['tabel_f2_field3'] => $this->v_post['tabel_f2_field3'],
			$this->aliases['tabel_f2_field4'] => $this->v_post['tabel_f2_field4'],
			$this->aliases['tabel_f2_field5'] => $this->v_post['tabel_f2_field5'],
			$this->aliases['tabel_f2_field6'] => $this->v_post['tabel_f2_field6'],
			$this->aliases['tabel_f2_field7'] => $this->v_post['tabel_f2_field7'],
			$this->aliases['tabel_f2_field8'] => $this->v_post['tabel_f2_field8'],
			$this->aliases['tabel_f2_field9'] => $harga_total,
			$this->aliases['tabel_f2_field10'] => $this->v_post['tabel_f2_field10'],
			$this->aliases['tabel_f2_field11'] => $this->v_post['tabel_f2_field11'],
			$this->aliases['tabel_f2_field12'] => $this->aliases['tabel_f2_field12_value1']
		];

		// Create temporary session for a specific duration
		$this->session->set_tempdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f2'], $this->v_post['tabel_f2_field4'], 300);

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Save data to the database
			$simpan = $this->tl_f2->simpan($data);

			if ($simpan) {
				// Functional requirement: Set success flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_1['tabel_f2_alias']);
			} else {
				// Functional requirement: Set failure flash message
				$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_2['tabel_f2_alias']);
			}
			// Functional requirement: Set flash message for further action
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash2'], "Error occurred while adding data: " . $e->getMessage());
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_f2' confirmation page
		redirect(site_url('c_tabel_f2/konfirmasi'));
	}


	public function update()
	{
		// this function is not really reccessary since only status that can be changed
	}

	// bagian update status untuk sementara kubiarkan tidak menggunakan variabel untuk sementara waktu
	// hal ini ditujukan untuk keperluan penelitian penggunaan array
	public function update_status()
	{
		$this->declarew();

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];

		$data = array(
			$this->aliases['tabel_f2_field12'] => $this->v_post['tabel_f2_field12'],
		);

		// jika status pesanan cek in
		if ($this->v_post['tabel_f2_field12'] == $this->aliases['tabel_f2_field12_value4']) {

			// hanya merubah status pesanan
			$aksi = $this->tl_f2->update($data, $tabel_f2_field1);

			// jika status pesanan cek out
		} elseif ($this->v_post['tabel_f2_field12'] == $this->aliases['tabel_f2_field12_value5']) {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$aksi = $this->tl_f2->hapus($tabel_f2_field1);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				$this->aliases['tabel_f1_field15'] => $this->session->userdata($this->aliases['tabel_c2_field1'])
			);

			// mengupdate pesanan dengan nama user yang aktif
			$aksi = $this->tl_f1->update_tabel_f1($data, $tabel_f2_field1);
		}

		if ($aksi) {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_f2_field12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_f2_field12_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_f2/admin'));
	}


	public function hapus($tabel_f2_field1 = null)
	{
		$this->declarew();

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];
		$status = $this->v_post['tabel_f2_field12'];

		$aksi = $this->tl_f2->hapus($tabel_f2_field1);

		// memasukkan nama resepsionis yang melakukan operasi
		$data = array(
			$this->aliases['tabel_f1_field14'] => $this->session->userdata($this->aliases['tabel_c2_field2'])
		);

		// mengupdate history dengan nama user yang aktif
		$update_tabel_f1 = $this->tl_f1->update_tabel_f1($data, $tabel_f2_field1);

		if ($hapus && $update_tabel_f1) {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_5['tabel_f2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_6['tabel_f2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_f2/admin'));
	}

	public function filter()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel_f2_field10'];
		$param2 = $this->v_filter2_get['tabel_f2_field10'];
		$param3 = $this->v_filter1_get['tabel_f2_field11'];
		$param4 = $this->v_filter2_get['tabel_f2_field11'];

		$data1 = array(
			'title' => $this->v3_title['tabel_f2_alias'],
			'konten' => $this->v3['tabel_f2'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),
			'tbl_f2' => $this->tl_f2->filter($param1, $param2, $param3, $param4)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f2_field10_filter1_value' => $param1,
			'tabel_f2_field10_filter2_value' => $param2,
			'tabel_f2_field11_filter1_value' => $param3,
			'tabel_f2_field11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_f2_alias'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),
			'tbl_f2' => $this->tl_f2->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_f2'], $data);
	}

	// Cetak satu data
	public function print($tabel_f2_field1 = null)
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v5_title['tabel_f2'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),
			'tbl_f2' => $this->tl_f2->ambil_tabel_f2_field1($tabel_f2_field1)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result()
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v5['tabel_f2'], $data);
	}



	// Fungsi khusus

	// Di bawah ini adalah fitur yang ingin kutambahkan ketika ingin memasukkan fitur filter di halaman daftar
	// Jika user menggunakan tombol cari untuk mencari pesanan, namun pada views masih menggunakan v_pesanan, 
	// maka fitur ini dibutuhkan untuk membedakan user mana yang sedang mencari daftar pesanan/history/transaksi 
	// atau hanya membuka halaman saja
	// Namun fitur di bawah tidak akan berguna jika halaman yang digunakan untuk menampilkan hasil cari berbeda dan
	// bukan v_pesanan
	// if (!$this->session->userdata('id_pesanan')) {}
	// 	} else {  -->
	// 	 }  -->

	public function cari()
	{
		$this->declarew();

		$param1 = $this->v_get['tabel_f2_field1'];
		$param2 = $this->v_get['tabel_f2_field4'];

		$data1 = array(
			'title' => $this->v1['tabel_f2_alias'],
			'konten' => $this->v1['tabel_f2'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'tbl_f2' => $this->tl_f2->cari($param1, $param2)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			'tbl_e3' => $this->tl_e3->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}


	public function konfirmasi()
	{
		$this->declarew();

		$tabel_c2_field3 = $this->session->tempdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f2']);
		$data1 = array(
			'title' => $this->v6_title['tabel_f2_alias'],
			'dekor' => $this->tl_b1->dekor('tabel_f2')->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl_f2' => $this->tl_f2->ambil_tabel_c2_field3($tabel_c2_field3)->last_row(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v6['tabel_f2'], $data);
	}

	// Ini adalah fitur untuk membooking kamar berdasarkan pesanan oleh resepsionis
	// Pada fitur ini, saya akan mencoba menggunakan gabungan dari jumlah kamar dan tipe kamar, 
	// Oleh karena itu bakal ada 2 fungsi yang menggunakan parameter ini yakni, book dan ubah status. 
	// Semoga besok bisa kelar karena ini merupakan fitur yang paling rumit di antara yang lain
	public function book()
	{
		$this->declarew();

		// hanya merubah status pesanan berdasarkan id pesanan
		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];
		$data = array(
			$this->aliases['tabel_f2_field12'] => $this->aliases['tabel_f2_field12_value2'],
			$this->aliases['tabel_f2_field13'] => $this->v_post['tabel_f2_field13'],

		);

		$aksi = $this->tl_f2->update($data, $tabel_f2_field1);

		// hanya merubah id pesanan di tabel kamar berdasarkan no kamar
		$param = $this->v_post['tabel_f2_field13'];
		$tabel_e3 = array(
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_f2_field1'],
			$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value3'],
		);
		$update_tabel_e3 = $this->tl_e3->update($tabel_e3, $param);


		if ($update_tabel_e3) {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_3['tabel_f2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash1_msg_4['tabel_f2_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_f2/admin'));
	}
}
