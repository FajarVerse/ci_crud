<?php
defined('BASEPATH') or exit('No direct sripct access allowed');

class Laporan extends CI_Controller
{
  public function  __construct()
  {
    parent::__construct();
    $this->load->model('Laporan_model');
  }

  public function index()
  {
    // Ambil input pencarian
    $nama = $this->input->get('nama');
    $min_harga = $this->input->get('minHarga');
    $max_harga = $this->input->get('maxHarga');

    // Pengecekan 
    if (!empty($nama)) {
      $data['barang'] = $this->Laporan_model->get_barang_by_name($nama);
    } else if (!empty($min_harga) && !empty($max_harga)) {
      $data['barang'] = $this->Laporan_model->get_barang_by_price_range($min_harga, $max_harga);
    } else {
      $data['barang'] = $this->Laporan_model->get_all_barang();
    }

    $this->load->view('laporan/laporan_view', $data);
  }
}
