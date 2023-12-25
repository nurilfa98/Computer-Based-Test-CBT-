<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jurusan_mapel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function add()
    {
        $this->M_admin->tambahDataJurusanMapel();
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/jurusan_mapel');
    }

    public function hapus($id)
    {
        $this->M_admin->hapusDataJurusanMapel($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('c_admin/jurusan_mapel');
    }

    public function delAll($id)
    {
        $this->M_admin->delAllJurusanMapel($id);
        $this->session->set_flashdata('flash', 'Dibersihkan!');
        redirect('c_admin/jurusan_mapel');
    }

    public function ubah()
    {
        $this->M_admin->ubahDataJurusanMapel();
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/jurusan_mapel');
    }
}
