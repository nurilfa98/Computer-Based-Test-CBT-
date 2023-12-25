<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    public function getUser()
    {
        return $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function getSoalGuru($nip)
    {
        $this->db->select('*');
        $this->db->from('tb_soal tbs');
        $this->db->join('guru g', 'g.id_guru = tbs.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = tbs.mapel_id');
        $this->db->where('nip', $nip);
        $this->db->order_by('id_soal', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAkun($nip)
    {
        $this->db->select('*');
        $this->db->from('relasi_kelas_guru r');
        $this->db->join('guru g', 'g.id_guru = r.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = g.mapel_id');
        $this->db->join('kelas k', 'k.id_kelas = r.kelas_id');
        $this->db->join('jurusan j', 'j.id_jurusan = k.jurusan_id');
        $this->db->where('nip', $nip);
        return $this->db->get()->result_array();
    }

    public function tambahDataSoal($data)
    {
        $this->db->insert('tb_soal', $data);
    }

    public function getSoalByID($id)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id])->result_array();
    }

    public function ubahSoal($id, $data)
    {
        $this->db->where('id_soal', $id);
        $this->db->update('tb_soal', $data);
    }

    public function getMapelUjian($nip)
    {
        $this->db->select('*');
        $this->db->from('mapel_ujian mu');
        $this->db->join('guru g', 'g.id_guru = mu.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = mu.mapel_id');
        $this->db->join('kelas k', 'k.id_kelas = mu.kelas_id');
        $this->db->join('jurusan j', 'j.id_jurusan = mu.jurusan_id');
        $this->db->where('nip', $nip);
        $this->db->order_by('id_ujian', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getKelas($nip)
    {
        $this->db->select('*');
        $this->db->from('relasi_kelas_guru r');
        $this->db->join('guru g', 'g.id_guru = r.guru_id');
        $this->db->join('kelas k', 'k.id_kelas = r.kelas_id');
        $this->db->join('jurusan j', 'j.id_jurusan = k.jurusan_id');
        $this->db->where('nip', $nip);
        $this->db->order_by('kelas_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function tmbUjian($data)
    {
        $this->db->insert('mapel_ujian', $data);
    }

    public function ubahToken($id, $token)
    {
        $this->db->set('token', $token);
        $this->db->where('id_ujian', $id);
        $this->db->update('mapel_ujian');
    }

    public function getDataUjian($id)
    {
        $this->db->select('*');
        $this->db->from('mapel_ujian mu');
        $this->db->join('guru g', 'g.id_guru = mu.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = mu.mapel_id');
        $this->db->join('kelas k', 'k.id_kelas = mu.kelas_id');
        $this->db->join('jurusan j', 'j.id_jurusan = mu.jurusan_id');
        $this->db->where('id_ujian', $id);
        return $this->db->get()->result_array();
    }

    public function ubhUjian($data, $id_ujian)
    {
        $this->db->where('id_ujian', $id_ujian);
        $this->db->update('mapel_ujian', $data);
    }

    public function hapusUjian($id_ujian)
    {
        $this->db->where('id_ujian', $id_ujian);
        $this->db->delete('mapel_ujian');
    }

    public function getGuruByID($id)
    {
        return $this->db->get_where('guru', ['id_guru' => $id])->result_array();
    }

    public function ubahTmbUser($id)
    {
        $this->db->where('id_guru', $id);
        $this->db->update('guru', ['tmb_user' => 1]);
    }

    public function setUser($nip, $nama_depan)
    {
        $this->db->insert('users', [
            'username'  => $nama_depan,
            'password'  => $nip,
            'role_id'   => 2,
            'is_active' => 0
        ]);
    }

    public function hentikan($id_ujian)
    {
        $this->db->set('status', 0);
        $this->db->where('id_ujian', $id_ujian);
        $this->db->update('mapel_ujian');
    }

    public function bagikan($id_ujian)
    {
        $this->db->set('status', 1);
        $this->db->where('id_ujian', $id_ujian);
        $this->db->update('mapel_ujian');
    }
}
