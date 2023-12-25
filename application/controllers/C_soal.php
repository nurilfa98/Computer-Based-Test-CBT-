<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_soal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_guru');
        $this->load->helper('kriptografi');
    }

    // User Guru
    public function buat()
    {
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_guru->getAkun($nip);
        $data['tittle']         = 'Buat Soal';

        $this->load->view('templates/header', $data);
        $this->load->view('guru/buatsoal', $data);
        $this->load->view('templates/footer');
    }

    public function tmbsoal()
    {
        $soal       = affine_e(viginere_e($this->input->post('soal')));
        $opsi_a     = affine_e(viginere_e($this->input->post('opsi_a', true)));
        $opsi_b     = affine_e(viginere_e($this->input->post('opsi_b', true)));
        $opsi_c     = affine_e(viginere_e($this->input->post('opsi_c', true)));
        $opsi_d     = affine_e(viginere_e($this->input->post('opsi_d', true)));
        $opsi_e     = affine_e(viginere_e($this->input->post('opsi_e', true)));
        $jawaban    = affine_e(viginere_e($this->input->post('k_jawaban', true)));

        $id = $this->input->post('guru');
        $arr = explode(':', $id);
        date_default_timezone_set('Asia/Jakarta');
        $tgl = affine_e(viginere_e(date("d-m-Y H:i:s")));
        $data = [
            "guru_id"       => $arr[0],
            "mapel_id"      => $arr[1],
            "soal"          => $soal,
            "opsi_a"        => $opsi_a,
            "opsi_b"        => $opsi_b,
            "opsi_c"        => $opsi_c,
            "opsi_d"        => $opsi_d,
            "opsi_e"        => $opsi_e,
            "jawaban"       => $jawaban,
            "created_on"    => $tgl
        ];
        $this->M_guru->tambahDataSoal($data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_guru/banksoal');
    }

    public function ubahsoal($id)
    {
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_guru->getAkun($nip);
        $data['soal'] = $this->M_guru->getSoalByID($id);

        $data['tittle'] = 'Ubah Soal';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/ubahsoal', $data);
        $this->load->view('templates/footer');
    }

    public function ubhsoal()
    {
        $soal       = affine_e(viginere_e($this->input->post('soal')));
        $opsi_a     = affine_e(viginere_e($this->input->post('opsi_a', true)));
        $opsi_b     = affine_e(viginere_e($this->input->post('opsi_b', true)));
        $opsi_c     = affine_e(viginere_e($this->input->post('opsi_c', true)));
        $opsi_d     = affine_e(viginere_e($this->input->post('opsi_d', true)));
        $opsi_e     = affine_e(viginere_e($this->input->post('opsi_e', true)));
        $jawaban    = affine_e(viginere_e($this->input->post('k_jawaban', true)));

        $data['user'] = $this->M_guru->getUser();
        date_default_timezone_set('Asia/Jakarta');
        $id_soal    = $this->input->post('id_soal');
        $id         = $this->input->post('guru');
        $arr        = explode(':', $id);
        $tgl        = affine_e(viginere_e(date("d-m-Y H:i:s")));
        $data = [
            "guru_id"       => $arr[0],
            "mapel_id"      => $arr[1],
            "soal"          => $soal,
            "opsi_a"        => $opsi_a,
            "opsi_b"        => $opsi_b,
            "opsi_c"        => $opsi_c,
            "opsi_d"        => $opsi_d,
            "opsi_e"        => $opsi_e,
            "jawaban"       => $jawaban,
            "update_on"     => $tgl
        ];
        $this->M_guru->ubahSoal($id_soal, $data);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_guru/banksoal');
    }
}
