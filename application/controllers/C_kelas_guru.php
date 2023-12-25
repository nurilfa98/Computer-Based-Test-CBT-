<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kelas_guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function add()
    {
        $this->M_admin->tambahDataKelasGuru();
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/kelas_guru');
    }

    public function hapus($id)
    {
        $this->M_admin->hapusDataKelasGuru($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('c_admin/kelas_guru');
    }

    public function delAll($id)
    {
        $this->M_admin->delAllKelasGuru($id);
        $this->session->set_flashdata('flash', 'Dibersihkan!');
        redirect('c_admin/kelas_guru');
    }

    public function ubah()
    {
        $this->M_admin->ubahDataKelasGuru();
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/kelas_guru');
    }
}
