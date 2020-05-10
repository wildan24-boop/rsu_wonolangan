<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
// Contruct -----------------------------------------------------------------------------------------
    public function __construct()
    {
        Parent::__construct();
       is_logged_in();
       $this->load->model('Keluar_model', 'keluar', TRUE);
       $this->load->model('Masuk_model', 'masuk', TRUE);
    }
// End construct -----------------------------------------------------------------------------------------

// Data Tabel Surat Masuk --------------------------------------------------------------------------------
    public function masuk()
	{
	$data = array(
		'title' => 'Surat Masuk',	
		'unik' =>  $this->masuk->get_id_masuk(),		
		'client' =>  $this->masuk->client(),		
		'disposisi' =>  $this->masuk->disposisi(),		
		'user' =>  $this->masuk->user(),	
		'karyawan' =>  $this->masuk->karyawan(),	
		'nama' =>  $this->masuk->nama()		
	);
		$this->konten['main_view'] = $this->load->view('surat/masuk', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);	
	}
	public function ajax_list_masuk()
	{
		$list = $this->masuk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $us) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] ='
			<a class="" href="javascript:void(0)" title="view" onclick="detail('."'".$us->id_sur_masuk."'".')"> <i class="fas fa-binoculars"></i> </a>';
			if($this->session->userdata('role_id') == '1' AND '3'){
			$row[] ='
			<class="btn-group">
			<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="far fa-caret-square-down"></i>
			</button>
			<div class="dropdown-menu">
			<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_masuk('."'".$us->id_sur_masuk."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
			<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_masuk('."'".$us->id_sur_masuk."'".')"><i class="fa fa-trash-alt ml-4 tombol-hapus"></i> Delete</a>
			<a class="dropdown-item btn btn-sm btn-success" href="javascript:void(0)" title="Diteruskan" onclick="edit_diteruskan('."'".$us->id_sur_masuk."'".')"><i class="fa fa-share-square ml-4"></i> Diteruskan</a>';
			}
			if($this->session->userdata('role_id') == '2'){
			$row[] ='
			<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Disposisi" onclick="edit_disposisi('."'".$us->id_sur_masuk."'".')"> <i class="far fa-comment-dots"></i>  </a>  ' ;
			}
			if($this->session->userdata('role_id') == '5'){
			$row[] ='
			<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Paraf Kabag AKU" onclick="edit_kabag_aku('."'".$us->id_sur_masuk."'".')"> <i class="far fa-caret-square-right"></i>  </a>  ' ;
			}
			if($this->session->userdata('role_id') == '6'){
			$row[] ='
			<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Paraf Kabag Pelayanan" onclick="edit_kabag_Yan('."'".$us->id_sur_masuk."'".')"> <i class="far fa-caret-square-right"></i>  </a>  ' ;
			}
			if($this->session->userdata('role_id') == '4'){
			$row[] ='
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Paraf Diterima" onclick="edit_diterima('."'".$us->id_sur_masuk."'".')"> <i class="far fa-caret-square-right"></i>  </a>  ' ;
			}
			$row[] = ($us->no_surat);
			$row[] = ($us->tgl_terima);
			$row[] = ($us->sur_dari);
			$row[] = ($us->kepada);
			$row[] = ($us->perihal_surat);
			$row[] = ($us->pro_disposisi);
			$data[] = $row;
		}
	
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->masuk->count_all(),
			"recordsFiltered" => $this->masuk->count_filtered(),
			"data" => $data,
	);
	//output to json format
	echo json_encode($output);
	}

	// Tambah Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_add_masuk()
	{
		$validasi = array(
			array(
			'field' => 'no_surat',
			'label' => 'Nomor Surat',
			'rules' => 'required|trim|is_unique[tc_sur_masuk.no_surat]'
			),
			array(
			'field' => 'tgl_surat',
			'label' => 'Tanggal Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'sur_dari',
			'label' => 'Surat dari',
			'rules' => 'required'
			),
			array(
			'field' => 'penerima',
			'label' => 'Penerima',
			'rules' => 'required'
			),
			array(
			'field' => 'jenis_surat',
			'label' => 'Jenis Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'perihal_surat',
			'label' => 'Perihal Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'agenda_surat',
			'label' => 'Agenda Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'kepada',
			'label' => 'Kepada',
			'rules' => 'required'
			),
			array(
			'field' => 'control',
			'label' => 'Paraf',
			'rules' => 'required'
			),
			array(
			'field' => 'status',
			'label' => 'Status',
			'rules' => 'required'
			)
		);

	$this->form_validation->set_rules($validasi);
	$this->form_validation->set_error_delimiters('', '');
	if ($this->form_validation->run() == FALSE){
		$data['kliru'] = validation_errors();
		$data['status'] = false;
		echo json_encode($data);
	}else{

		$unik = $this->masuk->get_id_masuk();
		$hal = $this->input->post('perihal_surat');
		$filePath = './surmasuk/';
		$config['upload_path'] = $filePath;
		$filektp = 'surat_'.$unik; 
		$config['file_name'] =  $hal;
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['remove_space'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['max_size'] = 30000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
        $this->upload->do_upload('upload_surat');
		$dok = $this->upload->data();
		
		
		if ($this->upload->do_upload('upload_surat')){
			$data = array(
				'no_surat' => $this->input->post('no_surat'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_terima' => date("Y-m-d"),
				'penerima' => $this->input->post('penerima'),
				'sur_dari' => $this->input->post('sur_dari'),
				'jenis_surat' => $this->input->post('jenis_surat'),
				'perihal_surat' => $hal,
				'agenda_surat' => $this->input->post('agenda_surat'),
				'kepada' => $this->input->post('kepada'),
				'status' => $this->input->post('status'),
				'control' => $this->input->post('control'),
				'upload_surat' => $dok['file_name'],
				'kd_unik' => $unik,
			);
			$insert = $this->masuk->save_masuk($data);
		}else{
			$data = array(
				'no_surat' => $this->input->post('no_surat'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_terima' => date("Y-m-d"),
				'penerima' => $this->input->post('penerima'),
				'sur_dari' => $this->input->post('sur_dari'),
				'jenis_surat' => $this->input->post('jenis_surat'),
				'perihal_surat' => $hal,
				'agenda_surat' => $this->input->post('agenda_surat'),
				'kepada' => $this->input->post('kepada'),
				'status' => $this->input->post('status'),
				'control' => $this->input->post('control'),
				'upload_surat' => $dok['file_name'],
				'kd_unik' => $unik

		);
		$insert = $this->masuk->save_masuk($data);
		}
		
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
		}
		}

// end Tambah Data Surat Masuk ------------------------------------------------------------------------------

// Edit Data Surat Masuk --------------------------------------------------------------------------------
public function ajax_edit_masuk($id)
{
	$data = $this->masuk->get_by_id($id);
	echo json_encode($data);
}

public function ajax_update_masuk()
{
	$validasi = array(
			array(
			'field' => 'tgl_surat',
			'label' => 'Tanggal Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'penerima',
			'label' => 'Penerima',
			'rules' => 'required'
			),
			array(
			'field' => 'sur_dari',
			'label' => 'Surat dari',
			'rules' => 'required'
			),
			array(
			'field' => 'jenis_surat',
			'label' => 'Jenis Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'perihal_surat',
			'label' => 'Perihal Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'agenda_surat',
			'label' => 'Agenda Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'kepada',
			'label' => 'Kepada',
			'rules' => 'required'
			),
			array(
			'field' => 'control',
			'label' => 'Paraf',
			'rules' => 'required'
			),
			array(
			'field' => 'status',
			'label' => 'Status',
			'rules' => 'required'
			)
	);

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
	$data['kliru'] = validation_errors();
	$data['status'] = false;
	echo json_encode($data);
}else{

	$unik = $this->input->post('kd_unik');
	$hal = $this->input->post('perihal_surat');
	$filePath = './surmasuk/';
	$config['upload_path'] = $filePath;
	$filektp = 'surat_'.$unik; 
	$config['file_name'] =$hal;
	$config['allowed_types'] = 'pdf|jpg|png';
	$config['remove_space'] = TRUE;
	$config['overwrite'] = TRUE;
	$config['max_size'] = 30000;
	$this->load->library('upload', $config);
	$this->upload->initialize($config);
	$this->upload->do_upload('upload_surat');
	$dok = $this->upload->data();
	
	
	
	if ($this->upload->do_upload('perihal_surat')){
		$data = array(
			'tgl_surat' => $this->input->post('tgl_surat'),
			'tgl_terima' => date("Y-m-d"),
			'sur_dari' => $this->input->post('sur_dari'),
			'penerima' => $this->input->post('penerima'),
			'jenis_surat' => $this->input->post('jenis_surat'),
			'perihal_surat' => $hal,
			'agenda_surat' => $this->input->post('agenda_surat'),
			'kepada' => $this->input->post('kepada'),
			'status' => $this->input->post('status'),
			'control' => $this->input->post('control'),
			'upload_surat' => $dok['file_name'],
			'kd_unik' => $unik,
	
		);
	}else{
		$data = array(
			'tgl_surat' => $this->input->post('tgl_surat'),
			'tgl_terima' => date("Y-m-d"),
			'sur_dari' => $this->input->post('sur_dari'),
			'penerima' => $this->input->post('penerima'),
			'jenis_surat' => $this->input->post('jenis_surat'),
			'perihal_surat' => $hal,
			'agenda_surat' => $this->input->post('agenda_surat'),
			'kepada' => $this->input->post('kepada'),
			'status' => $this->input->post('status'),
			'control' => $this->input->post('control'),
			'upload_surat' => $dok['file_name'],
			'kd_unik' => $unik,
	);
	$this->masuk->update(array('id_sur_masuk' => $this->input->post('id_sur_masuk')), $data);
	}
	$data['kliru'] = 'Sudah Tersimpan';
	$data['status'] = true;
	echo json_encode($data);
	}
	}

// End Edit Data Surat Masuk --------------------------------------------------------------------------------

// Delete Data Surat Masuk --------------------------------------------------------------------------------
public function delete_masuk($id){
	$_id = $this->db->get_where('tc_sur_masuk',['id_sur_masuk' => $id])->row();
	$query = $this->db->delete('tc_sur_masuk',['id_sur_masuk'=>$id]);
	if($query){
		unlink("surmasuk/".$_id->upload_surat);
	}
	$this->session->set_flashdata('flash11','Dihapus');
	redirect(base_url().'surat/masuk');
}


public function detail($id)
	{
	$data = array(
		'title' =>  'Detail Surat Masuk',
		'surat'=>$this->masuk->getSuratmasukId($id),		
		'surat_masuk'=>$this->masuk->get_surmasuk($id),		
		'unik' =>  $this->masuk->get_id_masuk(),		
		'client' =>  $this->masuk->client(),		
		'disposisi' =>  $this->masuk->disposisi(),		
		'user' =>  $this->masuk->user(),	
		'karyawan' =>  $this->masuk->karyawan(),	
		'nama' =>  $this->masuk->nama()	,			
	);
		$this->konten['main_view'] = $this->load->view('surat/detail_surmasuk', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);	
	}

	public function print_surmasuk($id)
	{
		$data = array(
			'title' =>  'RSUW Sekretariatan | Print',
			'surat'=>$this->masuk->getSuratmasukId2($id),		
			'surat_masuk'=>$this->masuk->get_surmasuk($id),		
						
		);
		$this->load->view('surat/detail_surmasuk_print', $data);
	}

// End Delete Data Surat Masuk --------------------------------------------------------------------------------

// Paraf Kabag AKU Data Surat Masuk --------------------------------------------------------------------------------
public function ajax_edit_kabag_Yan($id)
{
	$data = $this->masuk->get_by_id($id);
	echo json_encode($data);
}

public function ajax_update_kabag_Yan()
{

$data = array(
	'control' => 2,
	'ka_bag_yan' => $this->input->post('ka_bag_yan'),
	'catatan_surat' => $this->input->post('catatan_surat')
);

$this->masuk->update(array('id_sur_masuk' => $this->input->post('id_sur_masuk')), $data);
$data['kliru'] = 'Sudah Tersimpan';
$data['status'] = true;
echo json_encode($data);
}	
// End Paraf Kabag AKU Data Surat Masuk --------------------------------------------------------------------------------

// Paraf Kabag AKU Data Surat Masuk --------------------------------------------------------------------------------
public function ajax_edit_diterima($id)
{
	$data = $this->masuk->get_by_id($id);
	echo json_encode($data);
}

public function ajax_update_diterima()
{

$data = array(
	'control' => 2,
	'pro_diterima' => $this->input->post('pro_diterima')
);

$this->masuk->update(array('id_sur_masuk' => $this->input->post('id_sur_masuk')), $data);
$data['kliru'] = 'Sudah Tersimpan';
$data['status'] = true;
echo json_encode($data);
}	
// End Paraf Kabag AKU Data Surat Masuk --------------------------------------------------------------------------------

// Paraf Kabag AKU Data Surat Masuk --------------------------------------------------------------------------------
public function ajax_edit_kabag_aku($id)
{
	$data = $this->masuk->get_by_id($id);
	echo json_encode($data);
}

	public function ajax_update_kabag_aku()
	{

	$data = array(
		'control' => 2,
		'ka_bag_aku' => $this->input->post('ka_bag_aku'),
		'catatan_surat' => $this->input->post('catatan_surat')
	);

	$this->masuk->update(array('id_sur_masuk' => $this->input->post('id_sur_masuk')), $data);
	$data['kliru'] = 'Sudah Tersimpan';
	$data['status'] = true;
	echo json_encode($data);
	}	
// End Paraf Kabag AKU Data Surat Masuk --------------------------------------------------------------------------------

// Detail Data Surat Masuk --------------------------------------------------------------------------------

// End Detail Data Surat Masuk --------------------------------------------------------------------------------

// Tambah Keperluan Data Surat Masuk --------------------------------------------------------------------------------

	public function ajax_edit_diteruskan($id)
		{
			$data = $this->masuk->get_by_id($id);
			echo json_encode($data);
		}
	
		public function ajax_update_diteruskan()
	{
	
		$data = array(
			'keperluan' => $this->input->post('keperluan')
		);

		$this->masuk->update(array('id_tc_surat_masuk' => $this->input->post('id_tc_surat_masuk')), $data);
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
	}
// End Tambah Keperluan Data Surat Masuk --------------------------------------------------------------------------------

// Tambah Disposisi / keterangan Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_edit_disposisi($id)
	{
		$data = $this->masuk->get_by_id($id);
		echo json_encode($data);
	}

	
public function ajax_update_disposisi()
{
	$sourceb='';
	$id_disposisi = $this->input->post('id_disposisi');
	if(!$id_disposisi) {
		$plab='';
		}else{
			foreach ($id_disposisi as $one_plib) {
				$sourceb.=$one_plib.",";
			}
		$plab=substr($sourceb,0,-1);
		}
	$data = array(
		'id_disposisi' => $plab,
		'control' => 10, // Arsip
		'pro_disposisi' =>$this->input->post('pro_disposisi'),
		'catatan_ka_rs' => $this->input->post('catatan_ka_rs')
	);

	$this->masuk->update(array('id_sur_masuk' => $this->input->post('id_sur_masuk')), $data);
	$data['kliru'] = 'Sudah Tersimpan';
	$data['status'] = true;
	echo json_encode($data);
}

// End Tambah Disposisi / keterangan Data Surat Masuk --------------------------------------------------------------------------------  

//-------------------------------------------------------------------------------------------------------------------------------------------

// Data Tabel Surat Keluar --------------------------------------------------------------------------------
    public function keluar()
	{
		$data['title'] = 'Surat Keluar';
		$data = array(
			'client' =>  $this->keluar->client(),
			'title' => 'SURAT KELUAR',	
			'karyawan' =>  $this->keluar->karyawan(),
		);
		$this->konten['main_view'] = $this->load->view('surat/keluar', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

	public function detail_keluar($id)
	{
	$data = array(
		'title' =>  'Detail Surat Keluar',
		'surat_keluar' =>  $this->keluar->get_surkeluar($id),		
		// 'unik' =>  $this->masuk->get_id_masuk(),		
		// 'client' =>  $this->masuk->client(),		
		// 'disposisi' =>  $this->masuk->disposisi(),		
		// 'user' =>  $this->masuk->user(),	
		// 'karyawan' =>  $this->masuk->karyawan(),	
		// 'nama' =>  $this->masuk->nama()	,			
	);
		$this->konten['main_view'] = $this->load->view('surat/detail_surkeluar', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);	
	}

	public function ajax_list_keluar()
	{
		$list = $this->keluar->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $us) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] ='
			<a class="" href="javascript:void(0)" title="view" onclick="detail('."'".$us->id_sur_keluar."'".')"> <i class="fas fa-binoculars"></i> </a>';
			$row[] ='
			<class="btn-group">
			<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="far fa-caret-square-down"></i>
			</button>
			<div class="dropdown-menu">
			<a  class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_keluar('."'".$us->id_sur_keluar."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
			<a  class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_keluar('."'".$us->id_sur_keluar."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
	 	
			$row[] = ($us->no_surat);
			$row[] = ($us->tgl_surat);
			$row[] = ($us->kepada);
			$row[] = ($us->perihal_surat);
			$row[] = ($us->disetujui_ka_rs);
			$row[] = ($us->tgl_kirim);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->keluar->count_all(),
			"recordsFiltered" => $this->keluar->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		}
// End Data Tabel Surat Keluar --------------------------------------------------------------------------------
		
// Tambah Data Tabel Surat Keluar --------------------------------------------------------------------------------
public function ajax_add_keluar()
	{
		$validasi = array(
			array(
			'field' => 'no_surat',
			'label' => 'Nomor Surat',
			'rules' => 'required|trim|is_unique[tc_sur_keluar.no_surat]'
			),
			array(
			'field' => 'tgl_surat',
			'label' => 'Tanggal Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'kepada',
			'label' => 'Kepada',
			'rules' => 'required'
			),
			array(
			'field' => 'jenis_surat',
			'label' => 'Jenis Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'perihal_surat',
			'label' => 'Perihal',
			'rules' => 'required'
			),
			array(
			'field' => 'pembuat',
			'label' => 'Pembuat',
			'rules' => 'required'
			),
			array(
			'field' => 'status_surat',
			'label' => 'Status',
			'rules' => 'required'
			),
			array(
			'field' => 'control',
			'label' => 'Paraf',
			'rules' => 'required'
			)		
		);

	$this->form_validation->set_rules($validasi);
	$this->form_validation->set_error_delimiters('', '');
	if ($this->form_validation->run() == FALSE){
		$data['kliru'] = validation_errors();
		$data['status'] = false;
		echo json_encode($data);
	}else{

		$unik = $this->keluar->get_id_keluar();
		$hal = $this->input->post('perihal_surat');
		$filePath = './surkeluar/';
		$config['upload_path'] = $filePath;
		$filektp = 'surat_'.$unik; 
		$config['file_name'] =  $hal;
		$config['allowed_types'] = 'pdf|doc|jpg|png';
		$config['remove_space'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['max_size'] = 30000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
        $this->upload->do_upload('upload_doc');
		$dok = $this->upload->data();
		
		
		if ($this->upload->do_upload('upload_doc')){
			$data = array(
				'no_surat' => $this->input->post('no_surat'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'jenis_surat' => $this->input->post('jenis_surat'),
				'perihal_surat' => $hal,
				'status_surat' => $this->input->post('status_surat'),
				'kepada' => $this->input->post('kepada'),
				'pembuat' => $this->input->post('pembuat'),
				'control' => $this->input->post('control'),
				'upload_doc' => $dok['file_name'],
				'kd_unik' => $unik,
			);
			$insert = $this->keluar->save_keluar($data);
		}else{
			$data = array(
				'no_surat' => $this->input->post('no_surat'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'jenis_surat' => $this->input->post('jenis_surat'),
				'perihal_surat' => $hal,
				'status_surat' => $this->input->post('status_surat'),
				'kepada' => $this->input->post('kepada'),
				'pembuat' => $this->input->post('pembuat'),
				'control' => $this->input->post('control'),
				'upload_doc' => $dok['file_name'],
				'kd_unik' => $unik,

		);
		$insert = $this->keluar->save_keluar($data);
		}
		
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
		}
		}

// End Tambah Data Tabel Surat Keluar --------------------------------------------------------------------------------

// Edit Data Tabel Surat Keluar --------------------------------------------------------------------------------
public function ajax_edit_keluar($id)
{
	$data = $this->keluar->get_by_id($id);
	echo json_encode($data);
}

public function ajax_update_keluar()
{
	$validasi = array(
			array(
			'field' => 'tgl_surat',
			'label' => 'Tanggal Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'kepada',
			'label' => 'Kepada',
			'rules' => 'required'
			),
			array(
			'field' => 'jenis_surat',
			'label' => 'Jenis Surat',
			'rules' => 'required'
			),
			array(
			'field' => 'perihal_surat',
			'label' => 'Perihal',
			'rules' => 'required'
			),
			array(
			'field' => 'pembuat',
			'label' => 'Pembuat',
			'rules' => 'required'
			),
			array(
			'field' => 'status_surat',
			'label' => 'Status',
			'rules' => 'required'
			),
			array(
			'field' => 'control',
			'label' => 'Paraf',
			'rules' => 'required'
			)
	);

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
	$data['kliru'] = validation_errors();
	$data['status'] = false;
	echo json_encode($data);
}else{

	$unik = $this->input->post('kd_unik');
	$hal = $this->input->post('perihal_surat');
	$filePath = './surkeluar/';
	$config['upload_path'] = $filePath;
	$filektp = 'surat_'.$unik; 
	$config['file_name'] =$hal;
	$config['allowed_types'] = 'pdf|jpg|png';
	$config['remove_space'] = TRUE;
	$config['overwrite'] = TRUE;
	$config['max_size'] = 30000;
	$this->load->library('upload', $config);
	$this->upload->initialize($config);
	$this->upload->do_upload('upload_doc');
	$dok = $this->upload->data();
	
	
	if ($this->upload->do_upload('perihal_surat')){
		$data = array(
			'tgl_surat' => $this->input->post('tgl_surat'),
			'jenis_surat' => $this->input->post('jenis_surat'),
			'perihal_surat' => $hal,
			'status_surat' => $this->input->post('status_surat'),
			'kepada' => $this->input->post('kepada'),
			'pembuat' => $this->input->post('pembuat'),
			'control' => $this->input->post('control'),
			'upload_doc' => $dok['file_name'],
			'kd_unik' => $unik,
		);
	}else{
		$data = array(
			'tgl_surat' => $this->input->post('tgl_surat'),
			'jenis_surat' => $this->input->post('jenis_surat'),
			'perihal_surat' => $hal,
			'status_surat' => $this->input->post('status_surat'),
			'kepada' => $this->input->post('kepada'),
			'pembuat' => $this->input->post('pembuat'),
			'control' => $this->input->post('control'),
			'upload_doc' => $dok['file_name'],
			'kd_unik' => $unik,
	);
	$this->keluar->update(array('id_sur_keluar' => $this->input->post('id_sur_keluar')), $data);
	}
	$data['kliru'] = 'Sudah Tersimpan';
	$data['status'] = true;
	echo json_encode($data);
	}
	}
// End Edit Data Tabel Surat Keluar --------------------------------------------------------------------------------

// Delete Data Tabel Surat Keluar --------------------------------------------------------------------------------
	public function delete_keluar($id){
		$_id = $this->db->get_where('tc_sur_keluar',['id_sur_keluar' => $id])->row();
		$query = $this->db->delete('tc_sur_keluar',['id_sur_keluar'=>$id]);
		if($query){
			unlink("surkeluar/".$_id->upload_doc);
		}
		$this->session->set_flashdata('flash112','Dihapus');
		redirect(base_url().'surat/keluar');
	}
// End Delete Data Tabel Surat Keluar --------------------------------------------------------------------------------

// Validate Data Tabel Surat Keluar --------------------------------------------------------------------------------
	
// End Validate Data Tabel Surat Keluar --------------------------------------------------------------------------------
}
