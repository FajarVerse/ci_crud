<?php
class Menu extends CI_Controller
{
    // Ini merupakan function bawaan CI
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
    }

    public function index()
    {
        $this->load->view("templates/menu");
    }

    public function barang()
    {
        $data['TbBarang'] = $this->Barang_model->get_all_barang();

        $this->load->view("templates/menu");
        $this->load->view("barang/index", $data);
    }


    public function tambah_barang()
    {
        // $data["title"] = "Tambah Barang";
        $this->load->view("templates/menu");
        $this->load->view("barang/tambah");

        if ($this->input->post()) {
            $data = [
                // field database ->$this ->input ->post(name input) 
                "kode_brg" => $this->input->post('kode_barang'),
                "nama_brg" => $this->input->post('nama_barang'),
                "harga_beli" => $this->input->post('harga_beli'),
                "harga_jual" => $this->input->post('harga_jual'),
                "satuan_brg" => $this->input->post('satuan_barang'),
                "stock_brg" => $this->input->post('stock_barang')
            ];
            $this->Barang_model->insert_barang($data);
            redirect("menu/barang");
        }
    }

    public function update_barang($kodebrg)
    {
        // Mengambil Data Barang Dari Database
        $data["barang"] = $this->Barang_model->get_barang_by_kodebrg($kodebrg);

        // Load View Update Barang
        $this->load->view("templates/menu");
        $this->load->view('barang/update', $data);

        if ($this->input->post()) {
            $data = [
                "nama_brg" => $this->input->post('nama_barang'),
                "harga_beli" => $this->input->post('harga_beli'),
                "harga_jual" => $this->input->post('harga_jual'),
                "satuan_brg" => $this->input->post('satuan_barang'),
                "stock_brg" => $this->input->post('stock_barang')
            ];
            $this->Barang_model->update_barang($kodebrg, $data);

            redirect("menu/barang");
        }
    }

    public function delete_barang($kodebrg)
    {
        $this->Barang_model->delete_barang($kodebrg);
        redirect("menu/barang");
    }

    public function getByCode()
    {
        $kode = $this->input->get('kode');
        echo json_encode($this->Barang_model->get_barang_by_kodebrg($kode));
    }
}
