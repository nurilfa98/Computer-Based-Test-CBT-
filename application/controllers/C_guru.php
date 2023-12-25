<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->model('M_admin');
        $this->load->helper('kriptografi');
    }

    public function index()
    {
        // session
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_guru->getAkun($nip);

        $data['tittle'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }

    public function banksoal()
    {
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['soal'] = $this->M_guru->getSoalGuru($nip);
        $data['tittle'] = 'BANK Soal';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/banksoal', $data);
        $this->load->view('templates/footer');
    }

    public function ujian()
    {
        // session
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_guru->getAkun($nip);
        $data['getMapelUjian'] = $this->M_guru->getMapelUjian($nip);
        $data['tittle'] = 'Ujian';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/ujian', $data);
        $this->load->view('templates/footer');
    }

    // akses admin
    public function add()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_guru" => $this->input->post('guru', true),
            "mapel_id" => $this->input->post('mapel', true),
            "tmb_user" => '0'
        ];
        $this->M_admin->tambahDataGuru($data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/guru');
    }

    public function hapus($id)
    {
        $cek = $this->M_admin->cekGuru($id);

        if ($cek) {
            $this->session->set_flashdata('flashgagal', 'Relasi Kelas-Guru');
        } else {
            $this->M_admin->hapusDataGuru($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
        redirect('c_admin/guru');
    }

    public function ubah()
    {
        $id = $this->input->post('id', true);
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_guru" => $this->input->post('guru', true),
            "mapel_id" => $this->input->post('mapel', true)
        ];

        $this->M_admin->ubahDataGuru($id, $data);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/guru');
    }

    public function tmbuser($id)
    {
        $guru_row = $this->M_guru->getGuruByID($id);
        foreach ($guru_row as $row) {
            $nip = $row['nip'];
            $nama_guru = $row['nama_guru'];
        }
        $nama_depan = explode(' ', $nama_guru);
        $nip       = enkrip($nip);
        $namaDepan = enkrip(strtolower($nama_depan[0]));

        $this->M_guru->setUser($nip, $namaDepan);
        $this->M_guru->ubahTmbUser($id);
        $this->session->set_flashdata('flash', 'Ditambahkan (Lihat di User Management)');
        redirect('c_admin/guru');
    }

    public function h_ujian()
    {
        // session
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_guru->getAkun($nip);
        $data['getMapelUjian'] = $this->M_guru->getMapelUjian($nip);


        $data['tittle'] = 'Hasil Ujian';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/h_ujian', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['user']       = $this->M_admin->getUser();
        $data['hasilUjian'] = $this->M_admin->getHasilUjianByID($id);
        $data['tittle']     = 'Hasil Ujian';

        $this->load->view('templates/header', $data);
        $this->load->view('guru/detail_ujian', $data);
        $this->load->view('templates/footer');
    }
}
