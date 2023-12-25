<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->helper('kriptografi');
    }

    public function setting()
    {
        $data['user'] = $this->M_admin->getUser();

        $data['tittle'] = 'Setting';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/setting', $data);
        $this->load->view('templates/footer');
    }

    public function deltable($param)
    {
        if ($param == 1) {
            $this->M_admin->delSemuaDataTabel();
            $this->session->set_flashdata('flash', 'Dibersihkan!');
        }
        redirect('c_admin/setting');
    }

    public function index()
    {
        // // session
        // $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->M_admin->getUser();
        $data['homeKelas'] = $this->M_admin->getKelas();
        $data['homeMapel'] = $this->M_admin->getMapel();
        $data['homeGuru'] = $this->M_admin->getGuru();
        $data['homeSiswa'] = $this->M_admin->getSiswa();
        $data['tittle'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function jurusan()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['jurusan'] = $this->M_admin->getAllJurusan();
        $data['tittle'] = 'Jurusan';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/jurusan', $data);
        $this->load->view('templates/footer');
    }

    public function kelas()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['kelas'] = $this->M_admin->getAllKelas();
        $data['jurusan'] = $this->M_admin->getAllJurusan();
        $data['tittle'] = 'Kelas';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function mapel()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['mapel'] = $this->M_admin->getAllMapel();
        $data['tittle'] = 'Mata Pelajaran';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }

    public function guru()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['mapel'] = $this->M_admin->getAllMapel();
        $data['guru'] = $this->M_admin->getAllGuru();
        $data['tittle'] = 'Guru';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['siswa'] = $this->M_admin->getAllSiswa();
        $data['jurusan'] = $this->M_admin->getAllJurusan();
        $data['kelas'] = $this->M_admin->getAllKelas();
        $data['tittle'] = 'Siswa';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function kelas_guru()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['kelas_jurusan'] = $this->M_admin->getAllKelasJurusan();
        $data['guru'] = $this->M_admin->getAllGuru();
        $data['grkg'] = $this->M_admin->getGRkg();
        $data['full_rk'] = $this->M_admin->getAllFullRK();
        $data['kelas'] = $this->M_admin->getAllKelas();
        $data['kelas_guru'] = $this->M_admin->getAllKelasGuru();
        $data['relasi_kelas'] = $this->M_admin->getAllRelasiKelas();
        $data['tittle'] = 'Relasi Kelas-Guru';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kelas_guru', $data);
        $this->load->view('templates/footer');
    }

    public function h_ujian()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['m_ujian'] = $this->M_admin->getHasilUjian();
        $data['tittle'] = 'Hasil Ujian';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/h_ujian', $data);
        $this->load->view('templates/footer');
    }

    public function demo()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['demo'] = $this->M_admin->getDemo();
        $data['tittle'] = 'Demo Kriptografi';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/demo', $data);
        $this->load->view('templates/footer');
    }

    public function demo_proses()
    {
        $data['user'] = $this->M_admin->getUser();
        $teks = $this->input->post('textinput');
        // $opsi = $this->input->post('optionsRadios');
        $id = $this->input->post('id_demo');
        $kosong = "";
        if ($teks) {
            $teks = affine_e(viginere_e($teks));
            $this->db->where('id_demo', $id);
            $this->db->delete('demo');
            $this->db->insert('demo', ['teks' => $teks]);
        } elseif ($teks == $kosong) {
            $this->db->where('id_demo', $id);
            $this->db->delete('demo');
            $this->db->insert('demo', ['teks' => $kosong]);
        }

        $data['demo'] = $this->M_admin->getDemo();
        $data['tittle'] = 'Demo Kriptografi';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/demo', $data);
        $this->load->view('templates/footer');
    }

    public function user_management()
    {
        $data['user'] = $this->M_admin->getUser();
        $data['level'] = $this->M_admin->getLevel();
        $data['users'] = $this->M_admin->dataUsers();
        $data['tittle'] = 'User Management';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/user_management', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_user($id)
    {
        $users_row = $this->M_admin->roleUserByID($id);
        foreach ($users_row as $row) {
            $pwd  = dekrip($row['password']);
            $role = $row['role_id'];
        }
        if ($role == 2) {
            $this->M_admin->ubahTmbuserGuru($pwd);
            $this->M_admin->hapusUser($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        } elseif ($role == 3) {
            $this->M_admin->ubahTmbuserSiswa($pwd);
            $this->M_admin->hapusUser($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
        redirect('c_admin/user_management');
    }

    public function aktif($id)
    {
        $this->M_admin->aktifUser($id);
        redirect('c_admin/user_management');
    }

    public function nonaktif($id)
    {
        $this->M_admin->nonAktifUser($id);
        redirect('c_admin/user_management');
    }
}
