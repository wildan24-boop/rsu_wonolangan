<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public $konten = array('main_view' => '', );

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user', TRUE);
		$this->load->model('Admin_model', 'admin', TRUE);
		$this->load->model('Contact_model', 'contact', TRUE);
	}
//adm
	public function index()
	{
		$data['title'] = 'profile';
		$data = array (
			'user' => $this->db->get_where('dd_user', ['username' => $this->session->userdata('username')])->row_array(),
			'userQuery' =>  $this->user->userAdmin(),
			'contact' =>  $this->contact->contact_sesi(),
		);
		$this->konten['main_view'] = $this->load->view('profile/index',$data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

	public function changePassword()
	{
		$data = array (
			'user' => $this->db->get_where('dd_user', ['username' => $this->session->userdata('username')])->row_array(),
			'title' => 'Change Password',
		);
		$this->load->view('reset_password');$this->konten['main_view'] = $this->load->view('profile/changepassword',$data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

	function check_account(){

		$old_password=(password_verify($this->input->post('opassword')));
		$username='admin';
		$cek=$this->Model->Getuser(array('password' => $old_password,'username'=>$username));
		if($cek->num_rows()>=1){
			echo json_encode(false);
			// jika cek user bernilai lebih dari sama dengan 1 (ada data) maka kirimkan nilai false
		} else{
			echo json_encode(true);
		}
	}

	}