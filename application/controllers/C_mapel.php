<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function add()
    {
        $data = [
            "nama_mapel" => $this->input->post('mapel', true)
        ];

        $this->M_admin->tambahDataMapel($data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/mapel');
    }

    public function hapus($id)
    {
        $cek = $this->M_admin->cekMapel($id);

        if ($cek) {
            $this->session->set_flashdata('flashgagal', 'Master Guru');
        } else {
            $this->M_admin->hapusDataMapel($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
        redirect('c_admin/mapel');
    }

    public function ubah()
    {
        $id = $this->input->post('id');
        $data = [
            "nama_mapel" => $this->input->post('mapel', true)
        ];

        $this->M_admin->ubahDataMapel($id, $data);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/mapel');
    }
}
