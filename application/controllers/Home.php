<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelBuku', 'ModelUser', 'ModelBooking']);
    }

    public function index()
    {
        $data = [
            'judul' => "Katalog Buku",
            'buku' => $this->ModelBuku->getBuku()->result(),
        ];
        //jika sudah login dan jika belum login
        if ($this->session->userdata('email')) {
            // Cek email dari session
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['name'];
            $this->load->view('templates/user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer', $data);
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('templates/user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer', $data);
        }
    }
    public function detailBuku()
    {
        $id = $this->uri->segment(3);
        $buku = $this->ModelBuku->joinKategoriBuku(['buku.id' => $id])->result();
        $data['user'] = "Pengunjung";
        $data['title'] = "Detail Buku";
        foreach ($buku as $fields) {
            $data['judul'] = $fields->judul_buku;
            $data['pengarang'] = $fields->pengarang;
            $data['penerbit'] = $fields->penerbit;
            $data['kategori'] = $fields->nama_kategori;
            $data['tahun'] = $fields->tahun_terbit;
            $data['isbn'] = $fields->isbn;
            $data['gambar'] = $fields->image;
            $data['dipinjam'] = $fields->dipinjam;
            $data['dibooking'] = $fields->dibooking;
            $data['stok'] = $fields->stok;
            $data['id'] = $id;
        }
        $this->load->view('templates/user/header', $data);
        $this->load->view('buku/detailbuku', $data);
        $this->load->view('templates/user/modal');
        $this->load->view('templates/user/footer');
    }
}
