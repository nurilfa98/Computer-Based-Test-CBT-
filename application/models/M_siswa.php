<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    public function getUser()
    {
        return $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function getAkun($nipd)
    {
        $this->db->select('*');
        $this->db->from('siswa s');
        $this->db->join('jurusan j', 'j.id_jurusan = s.jurusan_id');
        $this->db->join('kelas k', 'k.id_kelas = s.kelas_id');
        $this->db->where('nipd', $nipd);
        return $this->db->get()->result_array();
    }

    public function getListUjian($kelas, $jurusan)
    {
        $this->db->select('*');
        $this->db->from('mapel_ujian mu');
        $this->db->join('guru g', 'g.id_guru = mu.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = mu.mapel_id');
        $this->db->join('kelas k', 'k.id_kelas = mu.kelas_id');
        $this->db->join('jurusan j', 'j.id_jurusan = mu.jurusan_id');
        $this->db->where(['mu.kelas_id' => $kelas, 'mu.jurusan_id' => $jurusan]);
        $this->db->order_by('id_ujian', 'DESC');
        return $this->db->get()->result_array();
    }

    public function hasilUjianSiswa($id_ujian, $id_siswa)
    {
        $this->db->select('*');
        $this->db->from('h_ujian hu');
        $this->db->join('mapel_ujian mu', 'hu.ujian_id = mu.id_ujian');
        $this->db->join('siswa s', 'hu.siswa_id = s.id_siswa');
        $this->db->where(['hu.ujian_id' => $id_ujian, 'hu.siswa_id' => $id_siswa]);
        return $this->db->get()->result_array();
    }

    public function setTimer($nipd, $timer)
    {
        $this->db->insert('temp_timer', [
            'nipd'   => $nipd,
            'timer'  => $timer
        ]);
    }

    public function getTimer($nipd)
    {
        return $this->db->get_where('temp_timer', ['nipd' => $nipd])->result_array();
    }

    public function delTemp($nipd)
    {
        $this->db->delete('temp_timer', ['nipd' => $nipd]);
    }

    public function getSoal($guru_id)
    {
        return $this->db->get_where('tb_soal', ['guru_id' => $guru_id])->result_array();
    }

    public function hasilUjian($data)
    {
        $this->db->insert('h_ujian', $data);
    }

    public function soalByID($soal_id)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $soal_id])->result_array();
    }

    public function cekJawaban($nomor)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $nomor])->result_array();
    }

    public function dataList($id_ujian)
    {
        // return $this->db->get_where('mapel_ujian', ['id_ujian' => $id_ujian])->result_array();

        $this->db->select('*');
        $this->db->from('mapel_ujian mu');
        $this->db->join('mapel m', 'm.id_mapel = mu.mapel_id');
        $this->db->where('id_ujian', $id_ujian);
        return $this->db->get()->result_array();
    }

    public function getSiswaByID($id)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id])->result_array();
    }

    public function ubahTmbUser($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->update('siswa', ['tmb_user' => 1]);
    }

    public function setUser($nipd, $nama_depan)
    {
        $this->db->insert('users', [
            'username'  => $nama_depan,
            'password'  => $nipd,
            'role_id'   => 3,
            'is_active' => 0
        ]);
    }
}
