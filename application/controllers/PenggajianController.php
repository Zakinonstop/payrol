<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggajianController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->web = $this->db->get('web')->row();
		$this->load->library('Pdf');
		if ($this->session->userdata('level') != 'admin') {
			// $this->session->set_flashdata('message', 'swal("Ops!", "Anda harus login sebagai admin", "error");');
			redirect('auth');
		}
	}

	public function index()
	{
		$tahun 			= date('Y');
		$bulan 			= date('m');
		$hari 			= date('d');
		$data['web']	= $this->web;
		$data['pegawai'] = $this->M_data->pegawai()->num_rows();
		$data['hadir']	= $this->M_data->hadirtoday($tahun, $bulan, $hari)->num_rows();
		$data['cuti']	= $this->M_data->cutitoday($tahun, $bulan, $hari)->num_rows();
		$data['izin']	= $this->M_data->izintoday($tahun, $bulan, $hari)->num_rows() + $this->M_data->sakittoday($tahun, $bulan, $hari)->num_rows();
		$data['absensi'] = $this->M_data->absen()->num_rows();
		$data['departemen'] = $this->db->get('departemen')->num_rows();
		$data['title']	= 'Dashboard';
		$data['body']	= 'admin/home';
		$this->load->view('template', $data);
	}
	
}
