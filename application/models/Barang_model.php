<?php
class Barang_model extends CI_Model
{
  private $table = 'barang';

  public function get_all_barang()
  {
    return $this->db->get($this->table)->result();
  }

  public function insert_barang($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function get_barang_by_kodebrg($kodebrg)
  {
    return $this->db->get_where($this->table, ['kode_brg' => $kodebrg])->row();
  }

  public function update_barang($kodebrg, $data)
  {
    $this->db->where('kode_brg', $kodebrg);
    return $this->db->update($this->table, $data);
  }

  public function delete_barang($kodebrg)
  {
    $this->db->where('kode_brg', $kodebrg);
    return $this->db->delete($this->table);
  }

}
