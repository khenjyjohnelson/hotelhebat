<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b1 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$param1 = $this->v_get['tabel_b1_field7'];

		$data1 = array(
			'title' => lang('tabel_b1_alias_v3_title'),
			'konten' => $this->v3['tabel_b1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b1'])->result(),
			'tbl_b1' => $this->tl_b1->get_all_b1()->result(),
			'tbl_b7' => $this->tl_b7->get_all_b7()->result(),
			'tabel_b1_field7_value' => $param1,
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	public function filter()
	{
		$this->declarew();


		validate_input(
			array(
				$this->v_post['tabel_b1_field7'],
			),
			$this->views['flash1'], 
			''
		);

		$param1 = $this->v_get['tabel_b1_field7'];

		$data1 = array(
			'title' => lang('tabel_b1_alias_v3_title'),
			'konten' => $this->v3['tabel_b1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b1'])->result(),
			'tbl_b1' => $this->tl_b1->filter($param1)->result(),
			'tbl_b7' => $this->tl_b7->get_all_b7()->result(),
			'tabel_b1_field7_value' => $param1
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}


	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_input(
			array(
				$this->v_post['tabel_b1_field2'],
				$this->v_post['tabel_b1_field3'],
				$this->v_post['tabel_b1_field4'],
				$this->v_post['tabel_b1_field5'],
				$this->v_post['tabel_b1_field6'],
				$this->v_post['tabel_b1_field7'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$config['upload_path'] = $this->v_upload_path['tabel_b1'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel_b1_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_b1_field4_input']);

		if (!$upload) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu

			set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_b1_field4_alias']);
			set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel_b1_field1'] => '',
			$this->aliases['tabel_b1_field2'] => $this->v_post['tabel_b1_field2'],
			$this->aliases['tabel_b1_field3'] => $this->v_post['tabel_b1_field3'],
			$this->aliases['tabel_b1_field4'] => $gambar,
			$this->aliases['tabel_b1_field5'] => $this->v_post['tabel_b1_field5'],
			$this->aliases['tabel_b1_field6'] => $this->v_post['tabel_b1_field6'],
			$this->aliases['tabel_b1_field7'] => $this->v_post['tabel_b1_field7'],
		);

		$aksi = $this->tl_b1->insert_b1($data);

		$notif = $this->handle_4b($aksi, 'tabel_b1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		$this->declarew();
		$this->session_3();

		$tabel_b1_field1 = $this->v_post['tabel_b1_field1'];

		validate_input(
			array(
				$this->v_post['tabel_b1_field1'],
				$this->v_post['tabel_b1_field2'],
				$this->v_post['tabel_b1_field3'],
				$this->v_post['tabel_b1_field4'],
				$this->v_post['tabel_b1_field4_old'],
				$this->v_post['tabel_b1_field5'],
				$this->v_post['tabel_b1_field6'],
				$this->v_post['tabel_b1_field7'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_b1_field1
		);

		$tabel_b1 = $this->tl_b1->get_b1_by_b1_field1($tabel_b1_field1)->result();
		$new_name = $this->v_post['tabel_b1_field2'];
		$path = $this->v_upload_path['tabel_b1'];
		$img = $this->v_post['tabel_b1_field4_old'];
		$extension = '.' . getExtension($path . $img);

		$config['upload_path'] = $path;
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['file_name'] = $new_name;
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_b1_field4_input']);

		if (!$upload) {
			if ($new_name != $tabel_b1[0]->kode) {
				rename($path . $img, $path . $new_name . $extension);
				$gambar = $new_name . $extension;
			} else {
				$gambar = $img;
			}
		} else {
			if ($new_name != $tabel_b1[0]->kode) {
				// File upload is successful, delete the old file
				if (file_exists($path . $img)) {
					unlink($path . $img);
				}
				$upload = $this->upload->data();
				$gambar = $upload['file_name'];
			} else {
				$gambar = $img;
			}
		}

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b1_field2'] => $this->v_post['tabel_b1_field2'],
			$this->aliases['tabel_b1_field3'] => $this->v_post['tabel_b1_field3'],
			$this->aliases['tabel_b1_field4'] => $gambar,
			$this->aliases['tabel_b1_field5'] => $this->v_post['tabel_b1_field5'],
			$this->aliases['tabel_b1_field6'] => $this->v_post['tabel_b1_field6'],
			$this->aliases['tabel_b1_field7'] => $this->v_post['tabel_b1_field7'],
		);

		$aksi = $this->tl_b1->update_b1($data, $tabel_b1_field1);

		$notif = $this->handle_4c($aksi, 'tabel_b1', $tabel_b1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function sync_theme($tabel_b1_field7 = null)
	{
		$this->declarew();
		$this->session_3();

		$data = array(
			$this->aliases['tabel_b1_field7'] => $tabel_b1_field7,
		);

		$aksi = $this->tl_b1->update_all_b1($data);

		$notif = $this->handle_4c($aksi, 'tabel_b1', $tabel_b1_field7);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_b1_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b1 = $this->tl_b1->get_b1_by_b1_field1($tabel_b1_field1)->result();
		$img = $tabel_b1[0]->img;

		unlink($this->v_upload_path['tabel_b1'] . $img);

		$aksi = $this->tl_b1->delete_b1($tabel_b1_field1);

		$notif = $this->handle_4e($aksi, 'tabel_b1', $tabel_b1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('tabel_b1_alias_v4_title'),
			'konten' => $this->v4['tabel_b1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b1'])->result(),
			'tbl_b1' => $this->tl_b1->get_all_b1()->result(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}
}
