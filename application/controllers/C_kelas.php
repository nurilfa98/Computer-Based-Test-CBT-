<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function add()
    {
        $data = [
            "nama_kelas" => $this->input->post('kelas', true),
            "jurusan_id" => $this->input->post('jurusan', true)
        ];

        $this->M_admin->tambahDataKelas($data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/kelas');
    }

    public function hapus($id)
    {
        $cek = $this->M_admin->cekKelas($id);

        if ($cek) {
            $this->session->set_flashdata('flashgagal', 'Master Siswa');
        } else {
            $this->M_admin->hapusDataKelas($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
        redirect('c_admin/kelas');
    }

    public function delAll($id)
    {
        $this->M_admin->delAllKelas($id);
        $this->session->set_flashdata('flash', 'Dibersihkan!');
        redirect('c_admin/kelas');
    }

    public function ubah()
    {
        $id = $this->input->post('id', true);
        $data = [
            'nama_kelas' => $this->input->post('kelas', true),
            'jurusan_id' => $this->input->post('jurusan', true)
        ];

        $this->M_admin->ubahDataKelas($id, $data);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/kelas');
    }
}
