<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
        // Panggil Model
        $this->load->model('ModelBuku', 'buku');
    }

    // Kategori
    public function index()
    {
        $data['title'] = 'Kategori Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', [
            'required' => 'Nama kategori harus diisi!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/kategori/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori')
            ];
            $this->ModelBuku->simpanKategori($data);
            $this->session->set_flashdata('message', 'ditambah');
            redirect('kategori');
        }
    }

    public function updateKategori($id = null)
    {
        $data['title'] = 'Ubah Kategori';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->buku->kategoriWhere(['id' => $id])->row_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', [
            'required' => 'Nama kategori harus diisi!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/kategori/ubah', $data);
            $this->load->view('templates/admin/footer');
        } else {

            $this->buku->updateKategori(['id' => $id]);
            $this->session->set_flashdata('message', 'diubah');
            redirect('kategori');
        }
    }

    public function hapusKategori()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusKategori($where);
        $this->session->set_flashdata('message', 'dihapus');
        redirect('kategori');
    }
}
