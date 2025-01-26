<?php
class Penjualan_model extends CI_Model
{
  private $table = "penjualan";

  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
  }
}
