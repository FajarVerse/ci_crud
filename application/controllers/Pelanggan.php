<?php
defined('BASEPATH') or exit('No direct srcipt access allowed');

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
    $this->load->view('pelanggan/view_pelanggan', $data);
    // $this->load->view('pelanggan/pelanggan_view', $data);
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

  public function search_pelanggan()
  {
    $id = $this->input->get('idPelanggan');
    if (!$id) {
      log_message('debug', 'ID Pelanggan tidak diterima.');
      echo json_encode(['status' => 'error', 'message' => 'ID Pelanggan tidak diterima']);
      return;
    }

    $pelanggan = $this->Pelanggan_model->getById($id);

    if ($pelanggan) {
      echo json_encode(['status' => 'success', 'data' => $pelanggan]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
    }
  }


  public function update_pelanggan()
  {
    $id = $this->input->get('idPelanggan');
    $data = [
      'nama_pelanggan' => $this->input->get('namaPelanggan'),
      'alamat' => $this->input->get('alamatPelanggan'),
      'phone' => $this->input->get('noPhone')
    ];

    $update = $this->Pelanggan_model->update($id, $data);
    if ($update) {
      echo json_encode(['status' => 'success', 'message' => 'Update Data Success']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Update Data Failed']);
    }
  }

  public function delete_pelanggan()
  {
    $id = $this->input->get('idPelanggan');
    $delete = $this->Pelanggan_model->delete($id);

    if ($delete) {
      echo json_encode(['status' => 'success', 'message' => 'Update Data Success']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Update Data Failed']);
    }
  }
}
