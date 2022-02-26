<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelBuku', 'ModelUser', 'ModelBooking']);
        cek_login();
        cek_user();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();

        //mengupdate stok dan dibooking pada tabel buku
        $detail = $this->db->query("SELECT*FROM booking,booking_detail WHERE DAY(curdate()) < DAY(batas_ambil) AND booking.id_booking=booking_detail.id_booking")->result_array();

        foreach ($detail as $key) {
            $id_buku = $key['id_buku'];
            $batas = $key['tgl_booking'];
            $tglawal = date_create($batas);
            $tglskrg = date_create();
            $beda = date_diff($tglawal, $tglskrg);
            if ($beda->days > 2) {
                $this->db->query("UPDATE buku SET stok=stok+1, dibooking=dibooking-1 WHERE id='$id_buku'");
            }
        }

        //menghapus otomatis data booking yang sudah lewat dari 2 hari
        $booking = $this->ModelBooking->getData('booking');
        if (!empty($booking)) {
            foreach ($booking as $bo) {
                $id_booking = $booking->id_booking;
                $tglbooking = $booking->tgl_booking;
                $tglawal = date_create($tglbooking);
                $tglskrg = date_create();
                $beda = date_diff($tglawal, $tglskrg);
                if ($beda->days > 2) {
                    $this->db->query("DELETE FROM booking WHERE id_booking='$id_booking'");
                    $this->db->query("DELETE FROM booking_detail WHERE id_booking='$id_booking'");
                }
            }
        }

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer');
    }

    // Fungsi Ubah Password
    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        //Ambil data user dari session
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        //Rules validasinya jika input tidak sesuai
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim|min_length[3]', [
            'required' => 'Password Lama harus diisi',
            'min_length' => 'Password Terlalu Pendek!'
        ]);

        //Rules validasinya jika input tidak sesuai
        $this->form_validation->set_rules('password_baru1', 'Password Baru1', 'required|trim|min_length[3]|matches[password_baru2]', [
            'required' => 'Password Baru harus diisi',
            'min_length' => 'Password Terlalu Pendek!',
            'matches' => 'Password Harus Sama'
        ]);

        //Rules validasinya jika input tidak sesuai
        $this->form_validation->set_rules('password_baru2', 'Password Baru2', 'required|trim|min_length[3]|matches[password_baru1]', [
            'required' => 'Confirm Password harus diisi',
            'min_length' => 'Password Terlalu Pendek!',
            'matches' => 'Password Harus Sama'
        ]);

        // Cek Jika Rules Tidak Sesuai
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/ubahPassword', $data);
            $this->load->view('templates/admin/footer');
        } else {
            // Fungsi Ubah Password
            $this->ModelUser->ubahPassword();
        }
    }
}
