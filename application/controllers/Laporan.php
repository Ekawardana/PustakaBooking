<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelUser', 'ModelBuku', 'ModelPinjam']);
        cek_login();
        cek_user();
    }

    // Laporan Buku
    public function laporan_buku()
    {
        $data['title'] = 'Laporan Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/buku/laporan-buku', $data);
        $this->load->view('templates/admin/footer');
    }

    // Print Laporan
    public function LaporanPrint()
    {
        $data['buku']       = $this->ModelBuku->getBuku()->result_array();
        $data['kategori']   = $this->ModelBuku->getKategori()->result_array();

        $this->load->view('admin/buku/laporan_cetak_buku', $data);
    }

    // Download PDF
    public function LaporanPDF()
    {
        $data['buku']   = $this->ModelBuku->getBuku()->result_array();

        $this->load->library('dompdf_gen');
        $this->load->view('admin/buku/laporan_cetak_buku', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));
    }

    // Download Excel
    public function LaporanExcel()
    {
        $data = array(
            'title' => 'Laporan Buku',
            'buku'  => $this->ModelBuku->getBuku()->result_array()
        );

        $this->load->view('buku/laporan-excel', $data);
    }

    // Laporan Peminjaman
    public function laporan_pinjam()
    {
        $data['title']      = 'Laporan Data Peminjaman';
        $data['user']       = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan']    = $this->db->query("SELECT * FROM pinjam p, pinjam_detail d, buku b, user u
                                                        WHERE d.id_buku = d.id_buku = b.id
                                                          AND p.id_user=u.id
                                                          AND p.no_pinjam = d.no_pinjam")->result_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/pinjam/laporan-peminjaman', $data);
        $this->load->view('templates/admin/footer');
    }

    // Print Laporan Pinjam
    public function cetak_laporan_pinjam()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM pinjam p, pinjam_detail d, buku b,user u 
                                                     WHERE d.id_buku=b.id 
                                                       AND p.id_user=u.id 
                                                       AND p.no_pinjam=d.no_pinjam")->result_array();

        $this->load->view('admin/pinjam/cetak_laporan_pinjam', $data);
    }

    // Download PDF Laporan Pinjam
    public function laporan_pinjam_pdf()
    {
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->db->query("SELECT * FROM pinjam p,pinjam_detail d, buku b,user u 
                                                     WHERE d.id_buku=b.id 
                                                       AND p.id_user=u.id 
                                                       AND p.no_pinjam=d.no_pinjam")->result_array();

        $this->load->view('admin/pinjam/cetak_laporan_pinjam', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan data peminjaman.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan

    }

    // Export Excel Laporan Pinjam
    public function export_excel_pinjam()
    {
        $data = array(
            'title'     => 'Laporan Data Peminjaman Buku',
            'laporan'   => $this->db->query("SELECT * FROM pinjam p,pinjam_detail d, buku b,user u 
                                                     WHERE d.id_buku=b.id 
                                                       AND p.id_user=u.id 
                                                       AND p.no_pinjam=d.no_pinjam")->result_array()
        );
        $this->load->view('admin/pinjam/export-excel-pinjam', $data);
    }

    // Laporan Anggota
    public function laporan_anggota()
    {
        $data['title'] = 'Laporan Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->ModelUser->getUser()->result_array();
        $data['role'] = $this->db->get('role')->result_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/user/laporan-anggota', $data);
        $this->load->view('templates/admin/footer');
    }

    // Print Laporan Anggota
    public function cetak_laporan_anggota()
    {
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->ModelUser->getUser()->result_array();
        $data['title'] = 'Laporan Anggota';
        $this->load->view('admin/user/cetak_laporan_anggota', $data);
    }

    // Download PDF Laporan Anggota
    public function laporan_anggota_pdf()
    {
        $this->load->library('dompdf_gen');
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->ModelUser->getUser()->result_array();

        $this->load->view('admin/user/cetak_laporan_anggota', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan data anggota.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }

    // Export Excel Laporan Anggota
    public function export_excel_anggota()
    {
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->ModelUser->getUser()->result_array();
        $data['title'] = 'Laporan Anggota';
        $this->load->view('admin/user/export_excel_anggota', $data);
    }
}
