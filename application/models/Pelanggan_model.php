<?php
class Pelanggan_model extends CI_Model
{
  private $table = 'pelanggan';

  // Mengambil dan menampilkan semua data yang ada di table pelanggan
  public function getAll()
  {
    return $this->db->get($this->table)->result_array();
  }

  // Mengambil dan menampilkan data pelanggan berdasarkan id_pelanggan
  public function getById($id)
  {
    return $this->db->get_where($this->table, ['id_pelanggan' => $id])->row_array();
  }

  // Memasukan atau menyimpan data ke dalam tabel pelanggan
  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
  }
}
