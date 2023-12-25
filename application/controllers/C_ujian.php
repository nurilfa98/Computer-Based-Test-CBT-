<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->model('M_siswa');
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
        $data['getKelas'] = $this->M_guru->getKelas($nip);
        $data['tittle'] = 'Ujian';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/tmbujian', $data);
        $this->load->view('templates/footer');
    }

    public function acakHuruf()
    {
        $karakter = "abcdefghijklmnopqrstuvwxyz123456789";
        $string = "";
        for ($i = 0; $i < 5; $i++) {
            $pos = $karakter[rand(0, strlen($karakter) - 1)];
            $string .= $pos;
        }
        return $string;
    }

    public function ubahtoken($id)
    {
        $token  = $this->acakHuruf();
        $this->M_guru->ubahToken($id, $token);
        redirect('c_guru/ujian');
    }

    public function tmbujian()
    {
        $token  = $this->acakHuruf();
        $id     = $this->input->post('kelas');
        $arr    = explode('|', $id);
        $data = [
            "guru_id"       => $this->input->post('id_guru', true),
            "mapel_id"      => $this->input->post('id_mapel', true),
            "kelas_id"      => $arr[0],
            "jurusan_id"    => $arr[1],
            "nama_ujian"    => $this->input->post('nama_ujian', true),
            "waktu"         => $this->input->post('waktu', true),
            "token"         => $token,
            "status"        => 0
        ];
        $this->M_guru->tmbUjian($data);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('c_guru/ujian');
    }

    public function ubahujian($id)
    {
        // session
        $data['user'] = $this->M_guru->getUser();
        foreach ($data as $u) {
            $nip = dekrip($u['password']);
        }
        $data['getAkun'] = $this->M_guru->getAkun($nip);
        $data['dataUjian'] = $this->M_guru->getDataUjian($id);
        $data['getKelas'] = $this->M_guru->getKelas($nip);
        $data['tittle'] = 'Ubah Ujian';
        $this->load->view('templates/header', $data);
        $this->load->view('guru/ubahujian', $data);
        $this->load->view('templates/footer');
    }

    public function ubhujian()
    {
        $id_ujian = $this->input->post('id_ujian');
        $id     = $this->input->post('kelas');
        $arr    = explode('|', $id);
        $data = [
            "guru_id"       => $this->input->post('id_guru', true),
            "mapel_id"      => $this->input->post('id_mapel', true),
            "kelas_id"      => $arr[0],
            "jurusan_id"    => $arr[1],
            "nama_ujian"    => $this->input->post('nama_ujian', true),
            "waktu"         => $this->input->post('waktu', true),
        ];
        $this->M_guru->ubhUjian($data, $id_ujian);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('c_guru/ujian');
    }

    public function hapus($id)
    {
        $this->M_guru->hapusUjian($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('c_guru/ujian');
    }

    // Jawaban Ujian
    public function jawab()
    {
        $nipd      = $this->input->post('nipd');
        $pilihan   = $this->input->post('opsi');
        $id_soal   = $this->input->post('id');
        $jumlah    = $this->input->post('jumlah');
        $id_siswa  = $this->input->post('id_siswa');
        $id_ujian  = $this->input->post('id_ujian');

        $score   = 0;
        $benar   = 0;
        $salah   = 0;
        $kosong  = 0;

        for ($i = 0; $i < $jumlah; $i++) {
            $nomor = $id_soal[$i];

            // jika peserta tidak memilih jawaban
            if (empty($pilihan[$nomor])) {
                $kosong++;
            } else {
                // jika memilih
                $jawaban = $pilihan[$nomor];

                // cocokan kunci jawaban dengan database
                $nomor_soal = $this->M_siswa->cekJawaban($nomor);
                foreach ($nomor_soal as $soal) {
                    $kunci = vigenere_d(affine_d($soal['jawaban']));
                }
                if ($kunci == $jawaban) {
                    $benar++;
                } else {
                    $salah++;
                }
            }
        }
        /*
        ----------
        Nilai 100
        ----------
        Hasil = 100 / jumlah soal * Jawaban Benar
        */
        // hitung skor
        // $hitung = mysqli_query($conn, "SELECT * FROM tbl_soal WHERE aktif='Y'");
        $score = (100 / $jumlah) * $benar;
        $nilai_hasil  = number_format($score, 2);
        $data = [
            'ujian_id' => $id_ujian,
            'siswa_id' => $id_siswa,
            'nilai'    => $nilai_hasil
        ];
        $this->M_siswa->hasilUjian($data);
        $this->M_siswa->delTemp($nipd);
        redirect("c_siswa/hasil?u=$id_ujian&s=$id_siswa");
    }

    public function hentikan($id_ujian)
    {
        $this->M_guru->hentikan($id_ujian);
        redirect("c_guru/ujian");
    }

    public function bagikan($id_ujian)
    {
        $this->M_guru->bagikan($id_ujian);
        redirect("c_guru/ujian");
    }
}
