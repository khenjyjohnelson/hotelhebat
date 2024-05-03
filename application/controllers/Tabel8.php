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
class Tabel8 extends Omnitags
{
	// Halaman publik/khusus akun
	public function index($tabel7_field1 = 1)
	{
		$this->declarew();

		switch ($this->session->userdata($this->aliases['tabel9_field6'])) {
			case $this->aliases['tabel9_field6_value5']:
				$data1 = array(
					$this->v_part1 => $this->views_v1_title['tabel8'],
					$this->v_part2 => $this->head,
					$this->v_part3 => $this->views_v1['tabel8'],
					$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
					'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
					'tbl6' => $this->tl6->ambildata()->result(),

					'tabel8_field10_value' => $this->v_get['tabel8_field10'],
					'tabel8_field11_value' => $this->v_get['tabel8_field11'],
					'tabel8_field8_value' => $this->v_get['tabel8_field8'],
				);

				$halaman = $this->views['v1'];
				break;

			default:
				$data1 = array(
					$this->v_part1 => $this->views['v2'],
					$this->v_part2 => $this->head,
					$this->v_part4 => $this->v_part4_msg1,
					$this->v_part5 => $this->tl12->dekor('v2')->result(),
					'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result()

				);
				$halaman = $this->views['v2'];
		}

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->session->set_flashdata($this->flashdatas['flash1'], $this->flashdatas['flash1_note2']);
		$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);

		$this->load->view($halaman, $data);
	}

	// Halaman khusus akun
	public function daftar($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		$data1 = array(
			$this->v_part1 => $this->views_v2_title['tabel8_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v2['tabel8'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambil_tabel9_field1($tabel9_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),

		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function filter_tabel4($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field1 = $this->session->userdata($this->aliases['tabel9_field1']);
		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel8_field10'];
		$param2 = $this->v_filter2_get['tabel8_field10'];
		$param3 = $this->v_filter1_get['tabel8_field11'];
		$param4 = $this->v_filter2_get['tabel8_field11'];

		$data1 = array(
			$this->v_part1 => $this->views_v2_title['tabel2_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v2['tabel2'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel2')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->filter_tabel4($param1, $param2, $param3, $param4, $tabel9_field1)->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel8_field10_filter1_value' => $param1,
			'tabel8_field10_filter2_value' => $param2,
			'tabel8_field11_filter1_value' => $param3,
			'tabel8_field11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel8_field10'];
		$param2 = $this->v_filter2_get['tabel8_field10'];
		$param3 = $this->v_filter1_get['tabel8_field11'];
		$param4 = $this->v_filter2_get['tabel8_field11'];

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel8_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel8'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel8_field10_filter1_value' => $param1,
			'tabel8_field10_filter2_value' => $param2,
			'tabel8_field11_filter1_value' => $param3,
			'tabel8_field11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
{
    // Functional requirement: Declare necessary configurations
    $this->declarew();

    // Security: Input Sanitization and Validation
    $inputs = [
        'tabel8_field4',
        'tabel8_field8',
        'tabel8_field10',
        'tabel8_field11',
        'tabel8_field2',
        'tabel8_field3',
        'tabel8_field5',
        'tabel8_field6',
        'tabel8_field7'
    ];

    foreach ($inputs as $input) {
        $input_value = htmlspecialchars(trim($this->v_post[$input]));
        if (empty($input_value)) {
            // Error Handling: Set error flash message for invalid input
            $this->session->set_flashdata($this->flashdatas['flash1'], "Invalid input. Please provide valid data.");
            $this->session->set_flashdata($this->flashdatas['flash1'], $this->flashdatas['flash1_func1']);
            // Functional requirement: Redirect user to 'tabel8' confirmation page
            redirect(site_url('tabel8/konfirmasi'));
        }
    }

    // Calculate total price based on date difference
    $startTimeStamp = strtotime($this->v_post['tabel8_field10']);
    $endTimeStamp = strtotime($this->v_post['tabel8_field11']);
    $timedif = $endTimeStamp - $startTimeStamp;
    $numberdays = $timedif / 60 / 60 / 24; // 86400 seconds in one day

    $tabel6_field1 = $this->v_post['tabel8_field7'];
    $tabel6 = $this->tl6->ambil_tabel6_field1($tabel6_field1)->result();

    // Calculate total price
    $harga_total = ($numberdays * $tabel6[0]->harga);

    $data = [
        $this->aliases['tabel8_field1'] => '',
        $this->aliases['tabel8_field2'] => $this->v_post['tabel8_field2'],
        $this->aliases['tabel8_field3'] => $this->v_post['tabel8_field3'],
        $this->aliases['tabel8_field4'] => $this->v_post['tabel8_field4'],
        $this->aliases['tabel8_field5'] => $this->v_post['tabel8_field5'],
        $this->aliases['tabel8_field6'] => $this->v_post['tabel8_field6'],
        $this->aliases['tabel8_field7'] => $this->v_post['tabel8_field7'],
        $this->aliases['tabel8_field8'] => $this->v_post['tabel8_field8'],
        $this->aliases['tabel8_field9'] => $harga_total,
        $this->aliases['tabel8_field10'] => $this->v_post['tabel8_field10'],
        $this->aliases['tabel8_field11'] => $this->v_post['tabel8_field11'],
        $this->aliases['tabel8_field12'] => $this->aliases['tabel8_field12_value1']
    ];

    // Create temporary session for a specific duration
    $this->session->set_tempdata($this->aliases['tabel9_field3'] . '_' . $this->aliases['tabel8'], $this->v_post['tabel8_field4'], 300);

    try {
        // Security: Prepared Statements to prevent SQL injection
        // Functional requirement: Save data to the database
        $simpan = $this->tl8->simpan($data);

        if ($simpan) {
            // Functional requirement: Set success flash message
            $this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_1['tabel8_alias']);
        } else {
            // Functional requirement: Set failure flash message
            $this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_2['tabel8_alias']);
        }
        // Functional requirement: Set flash message for further action
        $this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
    } catch (Exception $e) {
        // Error Handling: Handle database operation errors
        $this->session->set_flashdata($this->flashdatas['flash2'], "Error occurred while adding data: " . $e->getMessage());
        $this->session->set_flashdata('modal', $this->flashdatas['flash2_func1']);
    }

    // Functional requirement: Redirect user to 'tabel8' confirmation page
    redirect(site_url('tabel8/konfirmasi'));
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

		$tabel8_field1 = $this->v_post['tabel8_field1'];
		
		$data = array(
			$this->aliases['tabel8_field12'] => $this->v_post['tabel8_field12'],
		);

		// jika status pesanan cek in
		if ($this->v_post['tabel8_field12'] == $this->aliases['tabel8_field12_value4']) {

			// hanya merubah status pesanan
			$update = $this->tl8->update($data, $tabel8_field1);

			// jika status pesanan cek out
		} elseif ($this->v_post['tabel8_field12'] == $this->aliases['tabel8_field12_value5']) {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->tl8->hapus($tabel8_field1);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				$this->aliases['tabel2_field15'] => $this->session->userdata($this->aliases['tabel9_field1'])
			);

			// mengupdate pesanan dengan nama user yang aktif
			$update = $this->tl2->update_tabel2($data, $tabel8_field1);
		}

		if ($update) {

			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_3['tabel8_field12']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_4['tabel8_field12']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('tabel8/admin'));
	}
	

	public function hapus($tabel8_field1 = null)
	{
		$this->declarew();

		$tabel8_field1 = $this->v_post['tabel8_field1'];
		$status = $this->v_post['tabel8_field12'];

		$hapus = $this->tl8->hapus($tabel8_field1);

		// memasukkan nama resepsionis yang melakukan operasi
		$data = array(
			$this->aliases['tabel2_field14'] => $this->session->userdata($this->aliases['tabel9_field2'])
		);

		// mengupdate history dengan nama user yang aktif
		$update_tabel2 = $this->tl2->update_tabel2($data, $tabel8_field1);

		if ($hapus && $update_tabel2) {

			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_5['tabel8_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_6['tabel8_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('tabel8/admin'));
	}

	public function filter($tabel7_field1 = 1)
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel8_field10'];
		$param2 = $this->v_filter2_get['tabel8_field10'];
		$param3 = $this->v_filter1_get['tabel8_field11'];
		$param4 = $this->v_filter2_get['tabel8_field11'];

		$data1 = array(
			$this->v_part1 => $this->views_v3_title['tabel8_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v3['tabel8'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->filter($param1, $param2, $param3, $param4)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),
			'tbl5' => $this->tl5->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel8_field10_filter1_value' => $param1,
			'tabel8_field10_filter2_value' => $param2,
			'tabel8_field11_filter1_value' => $param3,
			'tabel8_field11_filter2_value' => $param4
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}

	// Cetak semua data
	public function laporan($tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v4_title['tabel8_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambildata()->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views_v4['tabel8'], $data);
	}

	// Cetak satu data
	public function print($tabel8_field1 = null, $tabel7_field1 = 1)
	{
		$this->declarew();

		$data1 = array(
			$this->v_part1 => $this->views_v5_title['tabel8'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),
			'tbl8' => $this->tl8->ambil_tabel8_field1($tabel8_field1)->result(),
			'tbl6' => $this->tl6->ambildata()->result()
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views_v5['tabel8'], $data);
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

	public function cari($tabel7_field1 = 1)
	{
		$this->declarew();

		$param1 = $this->v_get['tabel8_field1'];
		$param2 = $this->v_get['tabel8_field4'];

		$data1 = array(
			$this->v_part1 => $this->views_v1['tabel8_alias'],
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->views_v1['tabel8'],
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'tbl8' => $this->tl8->cari($param1, $param2)->result(),
			'tbl6' => $this->tl6->ambildata()->result(),

			'tbl5' => $this->tl5->ambildata()->result(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views['v1'], $data);
	}


	public function konfirmasi($tabel7_field1 = 1)
	{
		$this->declarew();

		$tabel9_field3 = $this->session->tempdata($this->aliases['tabel9_field3'] . '_' . $this->aliases['tabel8']);
		$data1 = array(
			$this->v_part1 => $this->views_v6_title['tabel8_alias'],
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			$this->v_part5 => $this->tl12->dekor('tabel8')->result(),
			'tbl7' => $this->tl7->ambil_tabel7_field1($tabel7_field1)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl8' => $this->tl8->ambil_tabel9_field3($tabel9_field3)->last_row(),
		);

		$data = array_merge($data1, $this->aliases, $this->v_input, $this->v_old, $this->views, $this->flashdatas);

		$this->load->view($this->views_v6['tabel8'], $data);
	}

	// Ini adalah fitur untuk membooking kamar berdasarkan pesanan oleh resepsionis
	// Pada fitur ini, saya akan mencoba menggunakan gabungan dari jumlah kamar dan tipe kamar, 
	// Oleh karena itu bakal ada 2 fungsi yang menggunakan parameter ini yakni, book dan ubah status. 
	// Semoga besok bisa kelar karena ini merupakan fitur yang paling rumit di antara yang lain
	public function book($tabel7_field1 = 1)
	{
		$this->declarew();

		// hanya merubah status pesanan berdasarkan id pesanan
		$tabel8_field1 = $this->v_post['tabel8_field1'];
		$data = array(
			$this->aliases['tabel8_field12'] => $this->aliases['tabel8_field12_value2'],
			$this->aliases['tabel8_field13'] => $this->v_post['tabel8_field13'],

		);

		$update = $this->tl8->update($data, $tabel8_field1);

		// hanya merubah id pesanan di tabel kamar berdasarkan no kamar
		$param = $this->v_post['tabel8_field13'];
		$tabel5 = array(
			$this->aliases['tabel5_field3'] => $this->v_post['tabel8_field1'],
			$this->aliases['tabel5_field4'] => $this->aliases['tabel5_field4_value3'],
		);
		$update_tabel5 = $this->tl5->update($tabel5, $param);


		if ($update_tabel5) {

			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_3['tabel8_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->flashdatas['flash1'], $this->flash1_msg_4['tabel8_alias']);
			$this->session->set_flashdata('toast', $this->flashdatas['flash1_func1']);
		}

		redirect(site_url('tabel8/admin'));
	}
}
