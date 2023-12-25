<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('kriptografi');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'Login Guru';
			$this->load->view('templates/auth/header', $data);
			$this->load->view('auth/index');
			$this->load->view('templates/auth/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		// $username = enkrip($this->input->post('username'));
		// $password = enkrip($this->input->post('password'));

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		// $user_session = dekrip($user['username']);
		// jika usernya ada
		if ($user) {
			if ($user['is_active'] == 1) {
				if ($user['role_id'] == 1) {
					// cek password admin
					if ($password == $user['password']) {
						$data = [
							'username' => $user['username'],
							'rode_id'  => $user['role_id']
						];
						$this->session->set_userdata($data);
						redirect('c_admin');
					} else {
						$this->session->set_flashdata('message', '<div class="box-body">
							<div class="callout callout-danger text-center">
								<p>Wrong Password!</p>
							</div>');
						redirect('auth/index');
					}
				} elseif ($user['role_id'] == 2) {
					// cek password guru
					if ($password == $user['password']) {
						$data = [
							'username' => $user['username'],
							'rode_id'  => $user['role_id']
						];
						$this->session->set_userdata($data);
						redirect('c_guru');
					} else {
						$this->session->set_flashdata('message', '<div class="box-body">
							<div class="callout callout-danger text-center">
								<p>Wrong Password!</p>
							</div>');
						redirect('auth/index');
					}
				} elseif ($user['role_id'] == 3) {
					// cek password siswa
					if ($password == $user['password']) {
						$data = [
							'username' => $user['username'],
							'rode_id'  => $user['role_id']
						];
						$this->session->set_userdata($data);
						redirect('c_siswa');
					} else {
						$this->session->set_flashdata('message', '<div class="box-body">
							<div class="callout callout-danger text-center">
								<p>Wrong Password!</p>
							</div>');
						redirect('auth/index');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="box-body">
				<div class="callout callout-danger text-center">
					<p>Incorrect Login!</p>
				</div>');
					redirect('auth/index');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="box-body">
						<div class="callout callout-warning text-center">
							<p>User Tidak Aktif!</p>
						</div>');
				redirect('auth/index');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="box-body">
			<div class="callout callout-danger text-center">
				<p>User Tidak Terdaftar!</p>
			</div>');
			redirect('auth/index');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="box-body">
			<div class="callout callout-warning text-center">
				<p>Your have been logged out!</p>
			</div>');
		redirect('auth');
	}
}
