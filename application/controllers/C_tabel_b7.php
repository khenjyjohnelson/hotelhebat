<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b7 extends Omnitags
{
	// Halaman publik

	
	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		 $data1 = array(
			'title' => lang('tabel_b7_alias_v3_title'),
			'konten' => $this->v3['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7'])->result(),
			'tbl_b7' => $this->tl_b7->get_all_b7()->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data('_layouts/template', $data);
	}

	public function tambah()
	{
		$this->declarew();

		$this->session_3();

		$data = array(
			$this->aliases['tabel_b7_field1'] => '',
			$this->aliases['tabel_b7_field2'] => $this->v_post['tabel_b7_field2'],
			$this->aliases['tabel_b7_field6'] => htmlspecialchars($this->v_post['tabel_b7_field6']),
		);

		$aksi = $this->tl_b7->insert_b7($data);

		$notif = $this->handle_1b($aksi, 'tabel_b7');

		redirect($_SERVER['HTTP_REFERER']); 
	}


	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$this->session_3();

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field2'] => $this->v_post['tabel_b7_field2'],
			$this->aliases['tabel_b7_field6'] => $this->v_post['tabel_b7_field6'],
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_2b($aksi, 'tabel_b7', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}


	public function update_favicon()
	{
		$this->declarew();

		$this->session_3();

		$param = $this->v_post['tabel_b7_field2'] . "_";	

		$table = $this->tl_b7->get_b7_by_b7_field1($this->v_post['tabel_b7_field1'])->result();
		$tabel_b7_field3 = $table[0]->favicon;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field3);

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b7_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b7_field3_input'])) {
			$gambar = $this->v_post_old['tabel_b7_field3'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field3'] => $param . $this->aliases['tabel_b7_field3'] . "." . $file_extension,
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_2f($aksi, 'tabel_b7_field3', 'tabel_b7_field1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_logo()
	{
		$this->declarew();

		$this->session_3();

		$param = $this->v_post['tabel_b7_field2'] . "_";	

		$table = $this->tl_b7->get_b7_by_b7_field1($this->v_post['tabel_b7_field1'])->result();
		$tabel_b7_field4 = $table[0]->logo;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field4);

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b7_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b7_field4_input'])) {
			$gambar = $this->v_post_old['tabel_b7_field4'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field4'] => $param . $this->aliases['tabel_b7_field4'] . "." . $file_extension,
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_2f($aksi, 'tabel_b7_field4', 'tabel_b7_field1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_foto()
	{
		$this->declarew();

		$this->session_3();

		$param = $this->v_post['tabel_b7_field2'] . "_";		

		$table = $this->tl_b7->get_b7_by_b7_field1($this->v_post['tabel_b7_field1'])->result();
		$tabel_b7_field5 = $table[0]->foto;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field5);

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b7_field5_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b7_field5_input'])) {
			$gambar = $this->v_post_old['tabel_b7_field5'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field5'] => $param . $this->aliases['tabel_b7_field5'] . "." . $file_extension,
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_2f($aksi, 'tabel_b7_field5', 'tabel_b7_field1');

		redirect($_SERVER['HTTP_REFERER']); 
	}


	public function delete($tabel_b7_field1 = null)
	{
		$this->declarew();

		$this->session_3();

		$aksi = $this->tl_b7->delete_b7($tabel_b7_field1);
		$tabel_b1 = $this->tl_b1->delete_b1_by_b1_field7($tabel_b7_field1);
		$tabel_b2 = $this->tl_b2->delete_b2_by_b2_field7($tabel_b7_field1);
		$tabel_b5 = $this->tl_b5->delete_b5_by_b5_field7($tabel_b7_field1);
		$tabel_b6 = $this->tl_b6->delete_b6_by_b6_field7($tabel_b7_field1);

		$notif = $this->handle_3b($aksi, 'tabel_b7_field1', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']); 
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_b7_alias_v4_title'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7'])->result(),
			'tbl_b7' => $this->tl_b7->get_all_b7()->result(),
		);

		$data = array_merge($data1, $this->package);

		load_view_data($this->v4['tabel_b7'], $data);
	}

	// Cetak satu data
}
