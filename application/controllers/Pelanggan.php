<?php
class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pelanggan_model');
  }

  public function index()
  {
    $data['pelanggan'] = $this->Pelanggan_model->getAll();
    $this->load->view('pelanggan/pelanggan_view', $data);
  }

  public function getById()
  {
    $id = $this->input->post('id');
    echo json_encode($this->Pelanggan_model->getById($id));
  }

  public function insert()
  {
    $data = [
      'id_pelanggan' => $this->input->post('id'),
      'nama_pelanggan' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'phone' => $this->input->post('no_phone')
    ];

    $this->Pelanggan_model->insert($data);
    echo json_encode(['status' => 'success']);
  }
}
