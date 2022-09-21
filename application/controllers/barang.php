<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['tahun'] = $this->barang_model->gettahun();

        $this->load->view('admin/laporan_barang', $data);
    }

    public function filter(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = "Laporan By Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . 'sampai tanggal : ' . $tanggalakhir;
            $data['datafilter'] = $this->Barang_model->filterbytanggal($tanggalawal, $tanggalakhir);

            $this->load->view('admin/print_laporan', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = "Laporan By Bulan";
            $data['subtitle'] = "Dari Bulan : " . $bulanawal . 'sampai Bulan : ' . $bulanakhir . 'Tahun : ' .$tahun1;
            $data['datafilter'] = $this->Barang_model->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/print_laporan', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = "Laporan By Tahun";
            $data['subtitle'] ='Tahun : ' .$tahun1;
            $data['datafilter'] = $this->Barang_model->filterbytahun($tahun2, $bulanawal, $bulanakhir);

            $this->load->view('admin/print_laporan', $data);
         }
    }