<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function add()
    {
        $data = [
            "nama_jurusan" => $this->input->post('jurusan', true)
        ];

        $this->M_admin->tambahDataJurusan($data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/jurusan');
    }

    public function hapus($id)
    {
        $cek = $this->M_admin->cekJurusan($id);

        if ($cek) {
            $this->session->set_flashdata('flashgagal', 'Master Kelas');
        } else {
            $this->M_admin->hapusDataJurusan($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
        redirect('c_admin/jurusan');
    }

    public function ubah()
    {
        $id = $this->input->post('id');
        $data = [
            "nama_jurusan" => $this->input->post('jurusan', true)
        ];

        $this->M_admin->ubahDataJurusan($id, $data);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/jurusan');
    }
}
