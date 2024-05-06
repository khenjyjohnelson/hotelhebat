<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Welcome extends Omnitags
{
	// fungsi pertama yang akan diload oleh website
	public function index()
	{
		$this->declarew();

		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		// mengarahkan pengguna ke halaman masing-masing sesuai level
		switch ($this->session->userdata($this->aliases['tabel9_field6'])) {
			case $this->aliases['tabel9_field6_value2']:
			case $this->aliases['tabel9_field6_value3']:
			case $this->aliases['tabel9_field6_value4']:

				$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				$this->session->set_flashdata('toast', $this->views['flash1_func1']);

				redirect(site_url('dashboard'));
				break;

			default:
				$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				$this->session->set_flashdata('toast', $this->views['flash1_func1']);

				// When you're the one who's developing this app, it's quite annoying to see this message over and over again.\
				// The feature below isn't working as expected
				// if ($this->session->userdata($this->aliases['tabel9_field7']) < 2) {
				// 	$this->session->set_flashdata($this->views['flash5'], "Anda hanya akan mendapatkan quick tour ini sebanyak 2 kali");
				// 	$this->session->set_flashdata($this->views['flash5'], $this->views['flash5_func1']);
				// } else {
				// }

				$data1 = array(
					$this->declarew(),

					'title' => $this->views['v6_title'],
					'konten' => $this->views['v6'],
					'dekor' => $this->tl12->dekor('v6')->result(),
					'tbl23' => $this->tl23->ambildata()->result(),
					'tbl25' => $this->tl25->ambildata()->result(),
					'tbl13' => $this->tl13->ambildata()->result(),
				);

				$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

				$this->load->view($this->views['v1'], $data);
		}
	}

	public function dashboard()
	{
		$this->declarew();

		$chart_tabel2 = $this->tl6->getChartTabel2();
		$chart_tabel8 = $this->tl6->getChartTabel8();

		$data1 = array(
			'title' => $this->views['v5_title'],
			'konten' => $this->views['v5'],
			'dekor' => $this->tl12->dekor('v5')->result(),
			'tbl1' => $this->tl1->ambildata()->num_rows(),
			'tbl3' => $this->tl3->ambildata()->num_rows(),
			'tbl4' => $this->tl4->ambildata()->num_rows(),
			'tbl5' => $this->tl5->ambildata()->num_rows(),
			'tbl6' => $this->tl6->ambildata()->num_rows(),
			'tbl8' => $this->tl8->ambildata()->num_rows(),
			'tbl9' => $this->tl9->ambildata()->num_rows(),
			'tbl10' => $this->tl10->ambildata()->num_rows(),
			'tbl20' => $this->tl20->ambildata()->num_rows(),

			'chart_tabel2' => json_encode($chart_tabel2),
			'chart_tabel8' => json_encode($chart_tabel8),
		);
		
		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);
		
		$this->load->view($this->views['v1'], $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan level
	public function no_level()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v4_title'],
			'dekor' => $this->tl12->dekor('v4')->result(),
'tbl7' => $this->tl7->ambil_tabel7_field1($this->tabel7_field1)->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v4'], $data);
	}

	public function no_page()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v7_title'],
			'dekor' => $this->tl12->dekor('v7')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_old);

		$this->load->view($this->views['v7'], $data);
	}
}
