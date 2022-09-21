<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM penjualan GROUP BT YEAR (tanggal) ORDER BY YEAR (tanggal) ASC");

        return $query->result();
    }

    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from penjualan where tanggal BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * from penjualan where YEAR(tanggal) = '$tahun1' and MOUTH(tanggal) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * from penjualan where YEAR(tanggal) = '$tahun2'  ORDER BY tanggal ASC");

        return $query->result();
    }
}
