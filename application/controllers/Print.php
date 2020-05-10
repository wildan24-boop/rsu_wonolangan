<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Print extends CI_Controller
{
// Contruct -----------------------------------------------------------------------------------------
    // public function __construct()
    // {
    //     Parent::__construct();
    //    is_logged_in();
    //    $this->load->model('Keluar_model', 'keluar', TRUE);
    //    $this->load->model('Masuk_model', 'masuk', TRUE);
    // }
// End construct -----------------------------------------------------------------------------------------
public function index($id)
	{
	$data = array(
		'title' =>'Surmasuk Print',
		'surat_masuk' =>  $this->masuk->get_surmasuk($id),		
		'unik' => $this->masuk->get_id_masuk(),		
		'client' =>  $this->masuk->client(),		
		'disposisi' =>  $this->masuk->disposisi(),		
		'user' =>  $this->masuk->user(),	
		'karyawan' =>  $this->masuk->karyawan(),	
		'nama' =>  $this->masuk->nama(),			
	);
		$this->load->view('print/surmasuk_print', $data);
	}

}