<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function getUser()
    {
        return $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function getAllJurusan()
    {
        $this->db->order_by('id_jurusan', 'DESC');
        return $this->db->get('jurusan')->result_array();
    }

    public function tambahDataJurusan($data)
    {
        $this->db->insert('jurusan', $data);
    }

    public function hapusDataJurusan($id)
    {
        // $this->db->delete('jurusan', ['id_jurusan', $id]);

        $this->db->where('id_jurusan', $id);
        $this->db->delete('jurusan');
        return true;
    }

    public function ubahDataJurusan($id, $data)
    {
        $this->db->where('id_jurusan', $id);
        $this->db->update('jurusan', $data);
        return true;
    }

    public function cekJurusan($id)
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->join('kelas', $id . ' = jurusan_id');
        return $this->db->get()->result();
    }
    // Akses Jurusan END
    // =================================================================================

    public function getAllKelas()
    {
        $this->db->order_by('id_kelas', 'DESC');
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('jurusan', 'jurusan_id = id_jurusan');
        return $this->db->get()->result_array();
    }

    public function tambahDataKelas($data)
    {
        $this->db->insert('kelas', $data);
    }

    public function hapusDataKelas($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }

    public function ubahDataKelas($id, $data)
    {
        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);
        return true;
    }

    public function cekKelas($id)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('siswa', $id . ' = kelas_id');
        return $this->db->get()->result();
    }
    // Akses kelas END
    // ===================================================================

    public function getAllMapel()
    {
        $this->db->order_by('id_mapel', 'DESC');
        $this->db->select('*');
        $this->db->from('mapel');
        return $this->db->get()->result_array();
        // return $this->db->get('mapel')->result_array();
    }

    public function tambahDataMapel($data)
    {
        $this->db->insert('mapel', $data);
    }

    public function hapusDataMapel($id)
    {
        $this->db->where('id_mapel', $id);
        $this->db->delete('mapel');
    }

    public function ubahDataMapel($id, $data)
    {
        $this->db->where('id_mapel', $id);
        $this->db->update('mapel', $data);
    }

    public function cekMapel($id)
    {
        $this->db->select('*');
        $this->db->from('mapel');
        $this->db->join('guru', $id . ' = mapel_id');
        return $this->db->get()->result();
    }
    // Akses Mapel END
    // ===================================================================

    public function getAllGuru()
    {
        $this->db->order_by('id_guru', 'DESC');
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'mapel_id = id_mapel');
        return $this->db->get()->result_array();
    }

    public function tambahDataGuru($data)
    {
        $this->db->insert('guru', $data);
    }

    public function hapusDataGuru($id)
    {
        $this->db->where('id_guru', $id);
        $this->db->delete('guru');
    }

    public function ubahDataGuru($id, $data)
    {
        $this->db->where('id_guru', $id);
        $this->db->update('guru', $data);
    }

    public function cekGuru($id)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('relasi_kelas_guru', $id . ' = guru_id');
        return $this->db->get()->result();
    }
    // Akses GURU END
    // ===================================================================

    public function getAllSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('jurusan', 'jurusan_id = id_jurusan');
        $this->db->join('kelas', 'kelas_id = id_kelas');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get()->result_array();
    }

    public function tambahDataSiswa($data)
    {
        $this->db->insert('siswa', $data);
    }

    public function hapusDataSiswa($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('siswa');
    }

    public function ubahDataSiswa($id, $data)
    {
        $this->db->where('id_siswa', $id);
        $this->db->update('siswa', $data);
    }

    public function delAllSiswa($id)
    {
        $this->db->delete('siswa', ['id_siswa'], $id);
    }
    // Akses SISWA END
    // ===================================================================

    public function getAllKelasGuru()
    {
        $this->db->order_by('guru_id', 'DESC');
        $this->db->select('*');
        $this->db->from('relasi_kelas_guru');
        $this->db->join('kelas', 'kelas_id = id_kelas');
        $this->db->join('guru', 'guru_id = id_guru');
        $this->db->group_by('guru_id');
        return $this->db->get()->result_array();
    }

    public function getAllFullRK()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('relasi_kelas_guru')->result_array();
    }

    public function getAllRelasiKelas()
    {
        $this->db->order_by('id', 'ASC');
        $this->db->select('*');
        $this->db->from('relasi_kelas_guru');
        $this->db->join('kelas', 'kelas_id = id_kelas');
        $this->db->join('jurusan', 'jurusan_id = id_jurusan');
        return $this->db->get()->result_array();
    }

    public function tambahDataKelasGuru()
    {
        $guru_id = $this->input->post('guru', true);
        $kelas_id = $this->input->post('kelas', true);
        foreach ($kelas_id as $k_id) {
            $this->db->set('guru_id', $guru_id);
            $this->db->set('kelas_id', $k_id);
            $this->db->insert('relasi_kelas_guru');
        }
    }

    public function hapusDataKelasGuru($id)
    {
        $this->db->where('guru_id', $id);
        $this->db->delete('relasi_kelas_guru');
    }

    public function ubahDataKelasGuru()
    {
        $id = $this->input->post('id', true);
        $this->db->where('guru_id', $id);
        $this->db->delete('relasi_kelas_guru');
        $guru_id = $this->input->post('guru', true);
        $kelas_id = $this->input->post('kelas', true);
        foreach ($kelas_id as $k_id) {
            $this->db->set('guru_id', $guru_id);
            $this->db->set('kelas_id', $k_id);
            $this->db->insert('relasi_kelas_guru');
        }
    }

    public function delAllKelasGuru($id)
    {
        $this->db->delete('siswa', ['id_siswa'], $id);
    }

    public function getAllKelasJurusan()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('jurusan', 'jurusan_id = id_jurusan');
        $this->db->order_by('id_kelas');
        return $this->db->get()->result_array();
    }

    public function getGRkg()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('relasi_kelas_guru', 'id_guru = guru_id', 'left');
        return $this->db->get()->result_array();
    }

    public function getAllSoal()
    {
        $this->db->select('*');
        $this->db->from('tb_soal tbs');
        $this->db->join('guru g', 'g.id_guru = tbs.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = tbs.mapel_id');
        $this->db->order_by('id_soal', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getGuruMapel()
    {
        $this->db->select('*');
        $this->db->from('guru g');
        $this->db->join('mapel m', 'm.id_mapel = g.mapel_id');
        return $this->db->get()->result_array();
    }

    public function tambahDataSoal($data)
    {
        $this->db->insert('tb_soal', $data);
    }

    public function hapusDataSoal($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('tb_soal');
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
    // END SOAL

    public function getHasilUjian()
    {
        $this->db->select('*');
        $this->db->from('mapel_ujian u');
        $this->db->join('guru g', 'g.id_guru = u.guru_id');
        $this->db->join('mapel m', 'm.id_mapel = u.mapel_id');
        return $this->db->get()->result_array();
    }

    public function getHasilUjianByID($id)
    {
        $this->db->select('*');
        $this->db->from('h_ujian hu');
        $this->db->join('mapel_ujian mu', 'hu.ujian_id = mu.id_ujian');
        $this->db->join('siswa s', 'hu.siswa_id = s.id_siswa');
        $this->db->join('guru g', 'mu.guru_id = g.id_guru');
        $this->db->join('mapel m', 'g.mapel_id = m.id_mapel');
        $this->db->join('kelas k', 's.kelas_id = k.id_kelas');
        $this->db->join('jurusan j', 'k.jurusan_id = j.id_jurusan');
        $this->db->where('hu.ujian_id', $id);
        return $this->db->get()->result_array();
    }

    public function getKelas()
    {
        return $this->db->count_all_results('kelas');
    }

    public function getMapel()
    {
        return $this->db->count_all_results('mapel');
    }

    public function getGuru()
    {
        return $this->db->count_all_results('guru');
    }

    public function getSiswa()
    {
        return $this->db->count_all_results('siswa');
    }

    public function getDemo()
    {
        return $this->db->get('demo')->result_array();
    }

    public function dataUsers()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where_not_in('role_id', 1);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getLevel()
    {
        // return $this->db->get('role')->result_array();
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where_not_in('id', 1);
        return $this->db->get()->result_array();
    }

    public function hapusUser($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function aktifUser($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', ['is_active' => 1]);
    }

    public function nonAktifUser($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', ['is_active' => 0]);
    }

    public function ubahTmbuserSiswa($nipd)
    {
        $this->db->where('nipd', $nipd);
        $this->db->update('siswa', ['tmb_user' => 0]);
    }

    public function ubahTmbuserGuru($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->update('guru', ['tmb_user' => 0]);
    }

    public function roleUserByID($id)
    {
        return $this->db->get_where('users', ['id' => $id])->result_array();
    }

    public function delSemuaDataTabel()
    {
        $this->db->where_not_in('id', 1);
        $this->db->delete('users');
        $this->db->empty_table('relasi_kelas_guru');
        $this->db->empty_table('mapel_ujian');
        $this->db->empty_table('tb_soal');
        $this->db->empty_table('h_ujian');
        $this->db->empty_table('siswa');
        $this->db->empty_table('guru');
        $this->db->empty_table('kelas');
        $this->db->empty_table('mapel');
        $this->db->empty_table('jurusan');
    }
}
