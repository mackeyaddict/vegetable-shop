<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSayur');
	}
	public function index()
	{
		$this->load->view('login');
	}
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() != false) {
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);
		}

		$data = $this->MSayur->edit_data($where, 'user');
		$d = $this->MSayur->edit_data($where, 'user')->row();

		$cek = $data->num_rows();
		if ($cek > 0) {
			$session = array(
				'id' => $d->id_user,
				'nama' => $d->nama_user,
				'status' => 'login'
			);
			$this->session->set_userdata($session);
			redirect(base_url() . 'admin');
		} else {
			redirect(base_url() . 'welcome?pesan=gagal');
			$this->load->view('login');
		}
	}
}