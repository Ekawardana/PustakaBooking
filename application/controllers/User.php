<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
        // Panggil ModelUser
        $this->load->model('ModelUser', 'user');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->user->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('role')->result_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->user->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            //Cek requirement gambarnya
            if ($upload_image) {
                //Tipe gambar harus gif, jpg, png
                $config['allowed_types'] = 'gif|jpg|png';
                //Tize file gambar yang diupload
                $config['max_size']     = '2048';
                //Tempat menyimpan file gambar yang telah diupload
                $config['upload_path'] = './assets/img/profile';
                //Panggil library upload filenya
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // Cari gambar lama yang akan dihapus setelah gambar diupdate
                    $old_image = $data['user']['image'];
                    //Cek jika gambar lama bukan default.jpg, hapus gambarnya setelah ada gambar baru
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    // Tampung data file upload beserta semua informasinya di variabel $gambar_baru
                    $new_image = $this->upload->data('file_name');
                    //Panggil fungsi set untuk menyimpan gambar baru ke tabel user
                    $this->db->set('image', $new_image);
                } else {
                    // Jika Gagal
                    echo $this->upload->dispay_errors();
                }
            }

            //Jika berhasil, Panggil fungsi ubah user dari ModelUser
            $this->user->ubahUser();
            //Tampilkan Pesan
            $this->session->set_flashdata('message', 'diubah');
            redirect('user');
        }
    }

    public function anggota()
    {
        $data['title'] = 'Data Anggota';
        $data['user'] = $this->user->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->db->where('role_id', 2);
        $data['anggota'] = $this->user->getUser()->result_array();
        $data['role'] = $this->db->get('role')->result_array();


        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/user/anggota', $data);
        $this->load->view('templates/admin/footer');
    }
}
