<?php
class Login_model extends CI_Model
{
  public function check_login($username, $password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('login');

    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }
}
