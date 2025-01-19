<?php
defined('BASEPATH') or exit('No direct sripct access allowed');

class Login extends CI_Controller
{
  public function index()
  {
    $this->load->view("auth/login_view");
  }

  public function  otentikasi()
  {
    $username = $this->input->get('inputUsername');
    $password = $this->input->get('inputPassword');

    // Load Model Login
    $this->load->model("Login_model");
    $user = $this->Login_model->check_login($username, $password);

    if ($user) {
      redirect('menu');
    } else {
      $this->session->set_flashdata('error', "Username or passowrd is wrong");
      redirect('Login'); 
    }
  }
}
