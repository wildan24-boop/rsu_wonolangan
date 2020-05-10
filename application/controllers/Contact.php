<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
// Contruct -----------------------------------------------------------------------------------------
    public function __construct()
    {
        Parent::__construct();
       is_logged_in();
      
       $this->load->model('Contact_model', 'contact', TRUE);
    //    $this->load->model('Masuk_model', 'masuk', TRUE);
    }
// End construct -----------------------------------------------------------------------------------------

// Data Tabel Surat Masuk --------------------------------------------------------------------------------
    public function index()
	{
	$data = array(
        'title' => 'Contact',	
        'contact' =>  $this->contact->contact(),	
    );
        
		$this->konten['main_view'] = $this->load->view('contact/index', $data, TRUE);
        $this->load->view('templates/dashboard', $this->konten);	
    }
    
    public function detail($id)
	{
	$data = array(
        'title' => 'Contact Detail',	
        'contact' =>  $this->contact->contact(),	
        'detail'=> $this->contact->getContactById($id),
    );
        
		$this->konten['main_view'] = $this->load->view('contact/detail', $data, TRUE);
        $this->load->view('templates/dashboard', $this->konten);	
    }
    
    public function chat()
	{
	$data = array(
        'title' => 'Chat',	
        'chat' =>  $this->contact->inbok(),
        // 'contact' =>  $this->contact->contact(),	
        // 'detail'=> $this->contact->getContactById($id),
    );
		$this->konten['main_view'] = $this->load->view('contact/chat', $data, TRUE);
        $this->load->view('templates/dashboard', $this->konten);
        
        	
    }
    public function tulis()
	{
	$data = array(
        'title' => 'Tulis',	
        'tulis' =>  $this->contact->getAllTulis(),	
        'karyawan' =>  $this->contact->getAllKaryawan(),	
        'user' => $this->db->get_where('dd_user', ['username' => $this->session->userdata('username')])->row_array(),
        // 'detail'=> $this->contact->getContactById($id),
        // $data['atp9_students'] = $this->Mahasiswa_model->getAllMahasiswa();
    );
    
    $this->form_validation->set_rules('to', 'To', 'required|trim');
    $this->form_validation->set_rules('subject', 'subject', 'required|trim');
    $this->form_validation->set_rules('message', 'message', 'required|trim');

    if ($this->form_validation->run() == false) {
		$this->konten['main_view'] = $this->load->view('contact/tulis', $data, TRUE);
        $this->load->view('templates/dashboard', $this->konten);	
    } else {
        $unik = $this->contact->get_id_unik();
        $this->load->library('upload');
        $filePath = './email/';
        $config['upload_path'] = $filePath;; //path folder
        $nama = 'surat_'.$unik; 
        $config['file_name'] =  $nama;
        $config['allowed_types'] = 'pdf|jpg|jpeg|png'; //type yang dapat diakses bisa anda sesuaikan
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['max_size'] = 30000;
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $this->upload->initialize($config);
		
        if(!empty($_FILES['file']['name'])){
            if(!$this->upload->do_upload('file'))
                print_r($this->upload->display_errors());
            else
				$file = $this->upload->data();
                $file_email = $file['file_name'];
        }

        $this->contact->tambahDataTulis($file_email);
        $this->session->set_flashdata('flash2', 'Dikirim');
        redirect('contact/chat');
    }
}
	}