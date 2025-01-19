<?php
class Laporan_model extends CI_Model
{
  public function get_barang_by_name($nama)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->like('nama_brg', $nama);
    return $this->db->get()->result();
  }

  public function get_barang_by_price_range($min_harga, $max_harga)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->like('harga_jual >=', $min_harga);
    $this->db->like('harga_jual <=', $max_harga);
    return $this->db->get()->result();
  }

  public function get_all_barang()
  {
    $this->db->select('*');
    $this->db->from('barang');
    return $this->db->get()->result();
  }

  public function get_barang_by_kodebrg($kodebrg)
  {
    return $this->db->get_where('barang', ['kode_brg' => $kodebrg])->row();
  }
}
