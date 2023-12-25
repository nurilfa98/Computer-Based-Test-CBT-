<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_siswa');
        $this->load->helper('kriptografi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // session
        $data['user'] = $this->M_siswa->getUser();
        foreach ($data as $u) {
            $nipd = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_siswa->getAkun($nipd);
        $tgl = $this->tgl();
        $data['arr'] = explode('-', $tgl);
        $data['tittle'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }

    private function tgl()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari = date("D");

        switch ($hari) {
            case 'Sun':
                $hari = "Minggu";
                break;
            case 'Mon':
                $hari = "Senin";
                break;
            case 'Tue':
                $hari = "Selasa";
                break;
            case 'Wed':
                $hari = "Rabu";
                break;
            case 'Thu':
                $hari = "Kamis";
                break;
            case 'Fri':
                $hari = "Jumat";
                break;
            case 'Sat':
                $hari = "Sabtu";
                break;
            default:
                $hari = "Tidak di ketahui";
                break;
        }

        $bulan = date("m");

        switch ($bulan) {
            case '01':
                $bulan = "Januari";
                break;
            case '02':
                $bulan = "Febuari";
                break;
            case '03':
                $bulan = "Maret";
                break;
            case '04':
                $bulan = "April";
                break;
            case '05':
                $bulan = "Mei";
                break;
            case '06':
                $bulan = "Juni";
                break;
            case '07':
                $bulan = "Juli";
                break;
            case '08':
                $bulan = "Agustus";
                break;
            case '09':
                $bulan = "September";
                break;
            case '10':
                $bulan = "Oktober";
                break;
            case '11':
                $bulan = "November";
                break;
            case '12':
                $bulan = "Desember";
                break;
            default:
                $bulan = "Tidak di ketahui";
                break;
        }
        $tgl = $hari . '-' . $bulan;
        return $tgl;
    }

    public function list()
    {
        // session
        $data['user'] = $this->M_siswa->getUser();
        foreach ($data as $u) {
            $nipd = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_siswa->getAkun($nipd);
        $getAkun = $this->M_siswa->getAkun($nipd);
        foreach ($getAkun as $siswa) {
            $kelas      = $siswa['kelas_id'];
            $jurusan    = $siswa['jurusan_id'];
            // $id_siswa   = $siswa['id_siswa'];
        }
        $data['listUjian']  = $this->M_siswa->getListUjian($kelas, $jurusan);

        $data['tittle']     = 'Daftar Ujian Siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/listujian', $data);
        $this->load->view('templates/footer');
    }

    public function mulai()
    {
        $tokenInput  = $this->input->get('t', true);
        $id_ujian    = $this->input->get('id', true);
        $ujian_row   = $this->M_siswa->dataList($id_ujian);
        foreach ($ujian_row as $row) {
            $nama_ujian = $row['nama_ujian'];
            $token      = $row['token'];
            $guru_id    = $row['guru_id'];
            $mapel      = $row['nama_mapel'];
            $menit      = $row['waktu'];
        }

        if ($token == $tokenInput) {
            // session
            $data['user'] = $this->M_siswa->getUser();
            foreach ($data as $u) {
                $nipd = dekrip($u['password']);
            }
            $data['getAkun']     = $this->M_siswa->getAkun($nipd);
            $data['getSoal']     = $this->M_siswa->getSoal($guru_id);
            $data['tittle']      = 'Ujian Siswa';
            $data['nama_ujian']  = "$nama_ujian";
            $data['mapel']       = "$mapel";
            $data['t']           = "$tokenInput";
            $data['id_ujian']    = "$id_ujian";

            $cek = $this->M_siswa->getTimer($nipd);
            if ($cek) {
                $data['getTimer'] = $this->M_siswa->getTimer($nipd);
            } else {
                date_default_timezone_set('Asia/Jakarta');
                $timer = date('M d, Y H:i:s', +time() + 60 * $menit);
                $this->M_siswa->setTimer($nipd, $timer);
                $data['getTimer'] = $this->M_siswa->getTimer($nipd);
            }
            $this->load->view('siswa/mulaiujian', $data);
        } else {
            $this->session->set_flashdata('flashtoken', 'Salah!');
            redirect('c_siswa/list');
        }
    }

    public function hasil()
    {
        $id_ujian = $this->input->get('u');
        $id_siswa = $this->input->get('s');
        $data['hasilUjian'] = $this->M_siswa->hasilUjianSiswa($id_ujian, $id_siswa);
        $data['tittle'] = "Hasil Ujian Siswa";
        $this->load->view('siswa/hasilujian', $data);
    }

    public function m()
    {
        $nomor = 1;
        $tokenInput  = $this->input->get('t', true);
        $id_ujian    = $this->input->get('id', true);
        $soal_id     = $this->input->get('s', true);
        $nomor       = $this->input->get('n', true);
        $ujian_row   = $this->M_siswa->dataList($id_ujian);
        foreach ($ujian_row as $row) {
            $nama_ujian = $row['nama_ujian'];
            $token      = $row['token'];
            $guru_id    = $row['guru_id'];
            $mapel      = $row['nama_mapel'];
        }

        if ($token == $tokenInput) {
            // session
            $data['user'] = $this->M_siswa->getUser();
            foreach ($data as $u) {
                $nipd = dekrip($u['password']);
            }
            if ($soal_id) {
                $data['soalByID'] = $this->M_siswa->soalByID($soal_id);
            }
            $data['getAkun'] = $this->M_siswa->getAkun($nipd);
            $data['getSoal'] = $this->M_siswa->getSoal($guru_id);

            $data['tittle'] = 'Ujian Siswa';
            $data['nama_ujian'] = "$nama_ujian";
            $data['mapel'] = "$mapel";
            $data['t']  = "$tokenInput";
            $data['id'] = "$id_ujian";
            $data['no'] = "$nomor";
            $this->load->view('siswa/mulaiujian', $data);
        } else {
            $this->session->set_flashdata('flashtoken', 'Salah!');
            redirect('c_siswa/list');
        }
    }

    // Akses ADMIN
    public function add()
    {
        $e = explode('|', $this->input->post('kelas'));
        $data = [
            "nipd"          => $this->input->post('nipd', true),
            "nama_siswa"    => $this->input->post('siswa', true),
            "jenis_kelamin" => $this->input->post('jk', true),
            "jurusan_id"    => $e[1],
            "kelas_id"      => $e[0],
            "tmb_user"      => 0
        ];
        $this->M_admin->tambahDataSiswa($data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('c_admin/siswa');
    }

    public function hapus($id)
    {
        $this->M_admin->hapusDataSiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('c_admin/siswa');
    }

    public function ubah()
    {
        $id = $this->input->post('id', true);
        $e = explode('|', $this->input->post('kelas'));
        $data = [
            "nipd"          => $this->input->post('nipd', true),
            "nama_siswa"    => $this->input->post('siswa', true),
            "jenis_kelamin" => $this->input->post('jk', true),
            "jurusan_id"    => $e[1],
            "kelas_id"      => $e[0],
            "tmb_user"      => 0
        ];

        $this->M_admin->ubahDataSiswa($id, $data);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_admin/siswa');
    }

    public function tmbuser($id)
    {
        $siswa_row = $this->M_siswa->getSiswaByID($id);
        foreach ($siswa_row as $row) {
            $nipd = $row['nipd'];
            $nama_siswa = $row['nama_siswa'];
        }
        $nama_depan = explode(' ', $nama_siswa);
        $nipd       = enkrip($nipd);
        $namaDepan  = enkrip(strtolower($nama_depan[0]));

        $this->M_siswa->setUser($nipd, $namaDepan);
        $this->M_siswa->ubahTmbUser($id);
        $this->session->set_flashdata('flash', 'Ditambahkan (Lihat di User Management)');
        redirect('c_admin/siswa');
    }
}
