<?php
class Penjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penjualan_model');
  }

  public function index()
  {
    $this->load->view('penjualan/penjualan_view');
  }

  public function insert()
  {
    $data = [
      'no_faktur' => $this->input->post('txtNoFaktur'),
      'tgl_faktur' => $this->input->post('txtTglFaktur'),
      'kode_brg' => $this->input->post('txtKodeBarang'),
      'jml_penjualan' => $this->input->post('txtJumlah')
    ];

    $this->Penjualan_model->insert($data);
    echo json_encode(['status' => 'success']);
  }
}
